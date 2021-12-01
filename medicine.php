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

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addMedicine"])){

    //prepare and bind
    $stmt = $conn->prepare("INSERT INTO medicine(name,category,vendor_id,rack) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$medicineName,$medicineCategory,$medicineVendor,$rackLocation);

    //Data from Form
    $medicineName = $_POST["medicineName"];
    $medicineCategory = $_POST["medicineCategory"];
    $medicineVendor = $_POST["medicineVendor"];
    $rackLocation = $_POST["rackLocation"];
    $stmt->execute();

    $success = "Medicine details saved successfully";

  }
  else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
    if(isset($_SESSION["i"])){
      $_SESSION["i"]++;
    }
    else{
      $_SESSION["i"]=1;
    }
    $_SESSION["medicineId"][$_SESSION["i"]-1] = $_POST["add"];
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])){
    $i=0;
    while(isset($_SESSION["medicineId"][$i])){
      if($_SESSION["medicineId"][$i]==$_POST["delete"]){
        unset($_SESSION["medicineId"][$i]);
        $_SESSION["medicineId"] = array_values($_SESSION["medicineId"]);
        $_SESSION["i"]--;
      }
      $i++;
    }
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate"])){
    $i = $_SESSION["i"];

    //prepare and bind
    $stmt = $conn->prepare("INSERT INTO medicine_stock(medicine_id,batch_no,mfg,exp,quantity,purchase_price,selling_price) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("issssss",$medicineId,$medicineBatchNo,$medicineMfg,$medicineExp,$medicineQuantity,$medicinePPrice,$medicinesPrice);

    $stmt2 = $conn->prepare("INSERT INTO purchases(medicine_id,date,purchase_price,quantity,paid) VALUES (?,?,?,?,?)");
    $stmt2->bind_param("issss",$PmedicineId,$todayDate,$PmedicinePPrice,$PmedicineQuantity,$paid);

    $j=0;
    while($j<$i){
      //data from FORM
      $medicineId = $_SESSION["medicineId"][$j];
      $medicineBatchNo = $_POST["batchNoMed".$j];
      $medicineMfg = $_POST["mfgDateMed".$j]."-01";
      $medicineExp = date("Y-m-t", strtotime($_POST["expDateMed".$j]."-01"));
      $medicineQuantity = $_POST["qtyMed".$j];
      $medicinePPrice = $_POST["rPriceMed".$j];
      $medicinesPrice = $_POST["sPriceMed".$j];
      $stmt->execute();

      $PmedicineId = $_SESSION["medicineId"][$j];
      $todayDate = date("Y-m-d");
      $PmedicinePPrice = $_POST["rPriceMed".$j];
      $PmedicineQuantity = $_POST["qtyMed".$j];
      $paid = "NO";
      $stmt2->execute();      

      $j++;
    }
    unset($_SESSION["i"]);
    unset($_SESSION["medicineId"]);

    $supplySuccess = "";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Manage Medicines</title>

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
      <h1>Manage Medicines</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">
          <?php 
              if(isset($supplySuccess)){
          ?>
          <div class="alert alert-success alert-dismissible fade show col-md-8 col-lg-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            Supply details has been Added successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
              }
          ?>
          <?php
              if (isset($_SESSION["i"]) && $_SESSION["i"]!=0){
          ?>
          <div class="card">
            <div class="card-body" >

              <form method="POST" action="medicine.php">
                <h5 class="card-title">Add Supply</h5>
                <div style="overflow: auto;">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Batch No</th>
                          <th scope="col">Medicine Id</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Mfg.</th>
                          <th scope="col">Exp.</th>
                          <th scope="col">Qty.</th>
                          <th scope="col">R.Price (Rs)</th>
                          <th scope="col">S.Price (Rs)</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $i=0;
                            while(isset($_SESSION["medicineId"][$i])){
                              $sql ="SELECT medicine.name,vendor.name as vendorName from medicine LEFT JOIN vendor on medicine.vendor_id=vendor.vendor_id WHERE medicine.medicine_id=".$_SESSION["medicineId"][$i];
                              $result = $conn->query($sql);                            
                              $row = $result->fetch_assoc();
                        ?>
                        <tr class="align-middle">
                          <th scope="row"><?php echo $i+1; ?></th>
                          <td>
                            <input type="text" class="form-control-sm" style="width: 100px;" name="batchNoMed<?php echo $i; ?>" required>
                          </td>
                          <td><?php echo $_SESSION["medicineId"][$i]; ?></td>
                          <td><?php echo $row["name"]; ?></td>
                          <td><?php echo $row["vendorName"]; ?></td>
                          <td>
                            <input type="month" class="form-control-sm" name="mfgDateMed<?php echo $i; ?>" required>
                          </td>
                          <td>
                            <input type="month" class="form-control-sm" name="expDateMed<?php echo $i; ?>" required>
                          </td>
                          <td><input type="number" class="form-control-sm" style="width: 70px;" name="qtyMed<?php echo $i; ?>" value="1" min=1 required></td>
                          <td>
                            <input type="number" class="form-control-sm" style="width: 80px;" name="rPriceMed<?php echo $i; ?>" required>
                          </td>
                          <td>
                            <input type="number" class="form-control-sm" style="width: 80px;" name="sPriceMed<?php echo $i; ?>" required>
                          </td>
                          <td>  
                            <button type="button" class="btn btn-danger btn-sm" onclick='deleteMed("<?php echo $_SESSION["medicineId"][$i]; ?>")'><i class="bi bi-trash"></i></button>
                          </td>                         
                        </tr>
                        <?php
                          $i++;  }
                        ?>
                      </tbody>
                    </table>
                </div>
                <div class="align-middle" style="font-weight: 700;display: flex;justify-content: center;align-items: center;"> 
                  <button type="submit" class="btn btn-primary btn-sm" name="generate">Add Supply</button> 
                </div>
              </form>

            </div>

          </div>

          <?php 
              }
          ?>

          
              <div class="card">
                <div class="card-body">
                    <?php 
                        if(isset($success)){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show col-md-8 col-lg-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Medicine details has been saved successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    
                  <h5 class="card-title">Add New Medicine</h5>

                  <form class="row g-3" method="POST" action="medicine.php">
                      
                    <div class="col-md-6">
                      <label for="medicineName" class="form-label">Medicine Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="medicineName" name="medicineName" required> 
                    </div>
                    <div class="col-md-6">
                      <label for="medicineCategory" class="form-label">Category <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="medicineCategory" name="medicineCategory" required> 
                    </div> 
                    <div class="col-md-6">
                      <label for="medicineVendor" class="form-label">Vendor</label>
                      <select id="medicineVendor" name="medicineVendor" class="form-select" required>
                      <option value="">Choose...</option>
                      <?php 
                          $sql="SELECT vendor_id,name FROM vendor";
                          $result = $conn->query($sql);
                          $i=1;
                          while($row = $result->fetch_assoc()){
                       ?>
                        <option value="<?php echo $row["vendor_id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="rackLocation" class="form-label">Rack Location <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="rackLocation" name="rackLocation" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="addMedicine" name="addMedicine" value="addMedicine">Add Medicine</button>
                    </div>
                      
                </form>
                  
                </div>
              </div>
            

          <div class="card">
            <div class="card-body" >

                <div class="row g-3" style="margin-top: 20px;">
                    <div class="col-md-4 col-lg-3 col-xxl-2">
                    Medicine ID: <input type="text" class="form-control" onkeyup="tableContents(this.value,1)" id="medicineId" required>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xxl-2">
                    Medicine Name: <input type="text" class="form-control" onkeyup="tableContents(this.value,2)" id="medicineName" required>
                    </div>
                </div>
                
                <h5 class="card-title">Inventory</h5>
                <div style="overflow: auto;">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Medicine Id</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Avl Qty.</th>
                          <th scope="col">Rack No</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                      <?php 
                          $sql="SELECT medicine.medicine_id,medicine.name,medicine.category,medicine.vendor_id,medicine.rack,sum(medicine_stock.quantity) as avlQuantity from medicine LEFT JOIN medicine_stock on medicine.medicine_id=medicine_stock.medicine_id GROUP BY medicine.medicine_id";
                          $result = $conn->query($sql);
                          $i=0;
                          while($row = $result->fetch_assoc()){
                            $sql2 ="SELECT name FROM vendor WHERE vendor_id='".$row["vendor_id"]."'";
                            $result2 = $conn->query($sql2);                            
                            $row2 = $result2->fetch_assoc();
                       ?>
                        <tr class="align-middle">
                          <th scope="row"><?php echo $i+1; ?></th>
                          <td><?php echo $medicineId[$i]=$row["medicine_id"]; ?></td>
                          <td><?php echo $medicineName[$i]=$row["name"]; ?></td>
                          <td><?php echo $medicineCategory[$i]=$row["category"]; ?></td>
                          <td><?php echo $medicineVendor[$i]=$row2["name"]; ?></td>
                          <td>
                            <?php if($row["avlQuantity"]==null || $row["avlQuantity"]=="0"){ 
                              $medicineAvlQuantity[$i]=0;
                              echo $medicineAvlQuantity[$i];
                            } 
                            else{ 
                              $medicineAvlQuantity[$i]=$row["avlQuantity"];
                              echo $medicineAvlQuantity[$i];
                            } 
                            ?>
                          </td>
                          <td><?php echo $medicineRack[$i]=$row["rack"]; ?></td> 
                          <td>
                              <form method="POST" action="medicine.php">
                                  <button type="submit" class="btn btn-warning btn-sm" name="add" value="<?php echo $row["medicine_id"]; ?>">ADD</button>
                              </form>
                          </td>                         
                        </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>
                </div>

            </div>

          </div>

        </div>        
    
  </main><!-- End #main -->

  <form method="POST" action="medicine.php" id="deleteForm">
    <input type="hidden" name="delete" id="delete">
  </form>

  <!-- Delete individual item -->
  <script>
    function deleteMed(id){
      document.getElementById("delete").value=id;
      document.getElementById("deleteForm").submit();
    }
  </script>

  <!-- Script for filtering medicine -->
  <script>

    var medicineId = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineId[$j].'"';
          if(isset($medicineId[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var medicineName = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineName[$j].'"';
          if(isset($medicineName[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var category = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineCategory[$j].'"';
          if(isset($medicineCategory[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var vendor = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineVendor[$j].'"';
          if(isset($medicineVendor[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var avlQty = [
      <?php 
        $j=0;
        while($j<$i){
          echo $medicineAvlQuantity[$j];
          if(isset($medicineAvlQuantity[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var rackNo = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineRack[$j].'"';
          if(isset($medicineRack[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];

    function tableContents(query,j){
      var body="";
      var i,k;
      if(query==""){
        i=0;
        while(medicineId[i]!=null){
          body=body+"<tr class='align-middle'><th scope='row'>"+(i+1)+"</th><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+avlQty[i]+"</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-warning btn-sm' name='add' value="+medicineId[i]+">ADD</button></form></td></tr>";
          i++;
        }
      }else{
        if(j==1){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(medicineId[i]!=null){
            if(pattern.test(medicineId[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+avlQty[i]+"</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-warning btn-sm' name='add' value="+medicineId[i]+">ADD</button></form></td></tr>";
              k++;
            }
            i++;
          }
        }
        else if(j==2){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(medicineId[i]!=null){
            if(pattern.test(medicineName[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+avlQty[i]+"</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-warning btn-sm' name='add' value="+medicineId[i]+">ADD</button></form></td></tr>";
              k++;
            }
            i++;
          }
        }
      }

      document.getElementById("tbody").innerHTML=body;
    }

    function printReceipt() {
            var divContents = document.getElementById("printReceipt").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
  </script>

  <?php 
    //connection to db close
    $conn->close();
  ?>
  
  <?php require "assets/php/footer.php"; ?>

</body>

</html>
