<?php

	//session start
	session_start();

  //if not logged in
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    die();
  }

  //connection to db
  require "assets/php/dbConnection.php";

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vendorId"])){
    $sql = "UPDATE purchases SET paid='YES' WHERE paid='NO' AND medicine_id IN (SELECT medicine_id FROM medicine WHERE vendor_id=".$_POST["vendorId"].")";
    $conn->query($sql);

    $sql = "SELECT name FROM vendor WHERE vendor_id=".$_POST["vendorId"];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $success = "Dues has been paid to ".$row["name"];
  }

  $sql = "SELECT medicine.name,medicine.vendor_id,purchases.quantity,purchases.purchase_price FROM medicine INNER JOIN purchases ON medicine.medicine_id=purchases.medicine_id WHERE purchases.paid='NO'";
  $result = $conn->query($sql);
  $count=0;
  while($row = $result->fetch_assoc()){
    $medicineName[$count] = $row["name"];
    $vendorId[$count] = $row["vendor_id"];
    $medicineQuantity[$count] = $row["quantity"]; 
    $purchasePrice[$count] = $row["purchase_price"];
    $count++;
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Issue Cheque</title>

  <?php require "assets/php/head.php"; ?>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require "assets/php/nav.php"; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php require "assets/php/sidebar.php"; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Issue Cheque</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">
          <?php
              if(isset($success)){
          ?>
            <div class="alert alert-success alert-dismissible fade show col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

          <?php } ?>
          <?php 
              $sql="SELECT vendor_id,name,account_no,ifsc_code FROM vendor";
              $result = $conn->query($sql);
              $flag=0;
              while($row = $result->fetch_assoc()){
                $i=0;
                while($i<$count){
                  if($vendorId[$i]==$row["vendor_id"]){
                    $flag=1;
                    break;
                  }
                  else{
                    $flag=0;
                  }
                  $i++; 
                }
                if($flag==0){
                  continue;
                } 
                
          ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendor: <?php echo $row["name"]; ?></h5>    

                    <div style="display: flex;justify-content: space-evenly;" class="row"> 
                        <fieldset style="all: revert; font-weight: 600;width: fit-content;" class="col-6">
                            <legend style="all: revert;"><?php echo $row["name"].":"; ?></legend>
                            <u>Med #Qty @Price</u><br><br>
                            <?php
                                $i=0;
                                $priceCount=0;
                                while($i<$count){
                                  if($vendorId[$i]==$row["vendor_id"]){
                                    echo $medicineName[$i]." #".$medicineQuantity[$i]." @".$purchasePrice[$i]."/-<br>";
                                    $priceCount = $priceCount+ ($medicineQuantity[$i]*$purchasePrice[$i]);
                                  }
                                  $i++; 
                                } 
                            ?>
                            <br>Total Price: <?php echo $priceCount; ?>/-<br><br> 
                            <u>Transfer Money to:</u><br>
                            Account No: <?php echo $row["account_no"]; ?><br>
                            IFSC Code: <?php echo $row["ifsc_code"]; ?>                                   
                        </fieldset>                      
                    </div>     
                <div class="text-center" style="margin-top: 20px;">
                    <button type="button" class="btn btn-danger col-3 col-md-2 col-lg-1" onclick='payVendor("<?php echo $row["vendor_id"] ?>")'>Paid</button>
                </div> 
            
            </div>

          </div>
          <?php } ?>

        </div>

      </div>        
    
  </main><!-- End #main -->
  <form method="POST" action="issueCheque.php" id="payVendor">
    <input type="hidden" name="vendorId" id="vendorId">
  </form>

  <!-- To Pay Vendor -->
  <script>
    function payVendor(id){
      document.getElementById("vendorId").value=id;
      document.getElementById("payVendor").submit();
    }
  </script>

  <?php 
    //connection to db close
    $conn->close();
  ?>

  <?php require "assets/php/footer.php"; ?>

</body>

</html>
