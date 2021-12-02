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

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
    if(isset($_SESSION["j"])){
      $_SESSION["j"]++;
    }
    else{
      $_SESSION["j"]=1;
    }
    $_SESSION["medicineBatchNo"][$_SESSION["j"]-1] = $_POST["add"];
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])){
    $i=0;
    while(isset($_SESSION["medicineBatchNo"][$i])){
      if($_SESSION["medicineBatchNo"][$i]==$_POST["delete"]){
        unset($_SESSION["medicineBatchNo"][$i]);
        $_SESSION["medicineBatchNo"] = array_values($_SESSION["medicineBatchNo"]);
        $_SESSION["j"]--;
      }
      $i++;
    }
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate"])){

    $i = $_SESSION["j"];

    //prepare and bind
    $stmt = $conn->prepare("INSERT INTO sales(invoice_id,date_time,total_amount) VALUES (?,?,?)");
    $stmt->bind_param("sss",$invoiceId,$invoiceDateTime,$totalAmount);

    $stmt2 = $conn->prepare("INSERT INTO sold_medicine(invoice_id,medicine_id,quantity,price) VALUES (?,?,?,?)");
    $stmt2->bind_param("siss",$soldInvoiceId,$soldMedicineId,$soldMedicineQuantity,$soldMedicinePrice);

    $j=0;
    $invoiceId = $soldInvoiceId = date("Ymdhis");
    $invoiceDateTime =date("Y-m-d h:i:s");
    $sum=0;
    while($j<$i){
      //data from FORM
      $receiptMedicineId[$j] = $soldMedicineId = $_POST["medicineId".$j];
      $receiptMedicineQty[$j] = $soldMedicineQuantity = $_POST["med".$j];
      $receiptMedicinePrice[$j] = $soldMedicinePrice = $_POST["soldMedicinePrice".$j];
      $stmt2->execute();     
      $sum = $sum + ($soldMedicinePrice*$soldMedicineQuantity);

      $sql = "SELECT quantity FROM medicine_stock WHERE batch_no='".$_SESSION["medicineBatchNo"][$j]."'";
      $result = $conn->query($sql);                            
      $row = $result->fetch_assoc();

      $newQuantity = (int)$row["quantity"]-$soldMedicineQuantity;
      //echo print_r($result);

      $sql = "UPDATE medicine_stock SET quantity='".$newQuantity."' WHERE batch_no='".$_SESSION["medicineBatchNo"][$j]."'";
      $conn->query($sql);

      $sql = "SELECT required FROM medicine WHERE medicine_id=".$soldMedicineId;
      $result = $conn->query($sql);                            
      $row = $result->fetch_assoc();

      $newRequired = (int)$row["required"]+$soldMedicineQuantity;

      $sql = "UPDATE medicine SET required='".$newRequired."' WHERE medicine_id=".$soldMedicineId;
      $conn->query($sql);

      $j++;
    }
    $counter = $j;

    
    unset($_SESSION["j"]);
    unset($_SESSION["medicineBatchNo"]);
    
      $totalAmount = $sum;
      $stmt->execute(); 

    $success = "success";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Generate Cash Receipt</title>

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
      <h1>Generate Cash Receipt</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">
          <?php
              if(isset($success)){
          ?>
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title">Invoice</h5>
                <div id="printReceipt">
                    <div style="display: flex;justify-content: space-evenly;" class="row"> 
                        <fieldset style="all: revert; font-weight: 600;width: fit-content;" class="col-6">
                            <legend style="all: revert;">Cash Receipt:</legend>
                            Receipt No: <?php echo $invoiceId; ?><br>
                            Date & Time: <?php echo date_format(date_create($invoiceDateTime),"d-M-Y h:i:s"); ?><br><br>
                            <u>Med #Qty @Price</u><br>
                            <?php 
                              $k=0;
                              while($k<$counter){
                                $sql = "SELECT name FROM medicine WHERE medicine_id=".$receiptMedicineId[$k];
                                $result = $conn->query($sql);                            
                                $row = $result->fetch_assoc();
                                echo $row["name"]." #".$receiptMedicineQty[$k]." @".$receiptMedicinePrice[$k]."/-<br>";
                                $k++;
                              }
                            ?>
                            <br>Total Price: <?php echo $totalAmount;?>/-<br>	                                    
                        </fieldset>                      
                    </div>
                </div>
                <div class="text-center" style="margin-top: 20px;">
                    <button type="button" class="btn btn-danger col-2" onclick="printReceipt()">Print</button>
                </div> 
            
              </div>

          </div>
          <?php 
              }
          ?>
          
          <?php
              if (isset($_SESSION["j"]) && $_SESSION["j"]!=0){
          ?>
          <div class="card">
            <div class="card-body" >
              
              <form method="POST" action="cashReceipt.php">
                <h5 class="card-title">Invoice</h5>
                <div style="overflow: auto;">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Batch No</th>
                          <th scope="col">Medicine Id</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Exp.</th>
                          <th scope="col">Qty.</th>
                          <th scope="col">Price</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $i=0;
                            $totalPrice=0;
                            while(isset($_SESSION["medicineBatchNo"][$i])){
                              $sql ="SELECT * FROM medicine_stock WHERE batch_no='".$_SESSION["medicineBatchNo"][$i]."'";                    
                              $result = $conn->query($sql);                            
                              $row = $result->fetch_assoc();
                              $sql2 = "SELECT name,vendor_id FROM medicine WHERE medicine_id=".$row["medicine_id"];                              
                              $result2 = $conn->query($sql2);
                              $row2 = $result2->fetch_assoc();
                              $sql3 = "SELECT name FROM vendor WHERE vendor_id=".$row2["vendor_id"];                              
                              $result3 = $conn->query($sql3);
                              $row3 = $result3->fetch_assoc();
                        ?>
                        <tr class="align-middle">
                          <th scope="row"><?php echo $i+1; ?></th>
                          <td><?php echo $row["batch_no"]; ?></td>
                          <td><?php echo $row["medicine_id"]; ?></td>
                          <input type="hidden" name="medicineId<?php echo $i; ?>" value="<?php echo $row["medicine_id"]; ?>">
                          <input type="hidden" name="soldMedicinePrice<?php echo $i; ?>" value="<?php echo $row["selling_price"]; ?>">
                          <td><?php echo $row2["name"]; ?></td>
                          <td><?php echo $row3["name"]; ?></td>
                          <td><?php echo date_format(date_create($row["exp"]),"M-Y"); ?></td>
                          <td><input onchange="calPrice(this.value,<?php echo $i; ?>)" type="number" class="form-control-sm" style="width: 70px;" name="med<?php echo $i; ?>" value="1" min=1></td>
                          <td id="med<?php echo $i; ?>">
                            <?php 
                            $itemPrice[$i] = $row["selling_price"];
                            $totalPrice = $totalPrice + $row["selling_price"];
                            echo $row["selling_price"]; 
                            ?>/-
                          </td>
                          <td>
                              <form method="POST" action="cashReceipt.php">
                                  <button type="submit" class="btn btn-danger btn-sm" name="delete" value="<?php echo $row["batch_no"]; ?>"><i class="bi bi-trash"></i></button>
                              </form>
                          </td>                         
                        </tr>
                        <?php
                          $i++;  }
                        ?>                                            
                      </tbody>
                    </table>                  
                </div>
                <div class="align-middle" style="font-weight: 700;display: flex;justify-content: center;align-items: center;">      
                  <div id="total">Total (Rs): <?php echo $totalPrice; ?>/-</div>
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 25px;" name="generate">Generate</button>    
                </div>
              </form>

            </div>

          </div>
          <?php 
              }
          ?>

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
                          <th scope="col">Batch No</th>
                          <th scope="col">Medicine Id</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Mfd.</th>
                          <th scope="col">Exp.</th>
                          <th scope="col">Avl Qty.</th>
                          <th scope="col">Price</th>
                          <th scope="col">Rack No</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php 
                          $sql="SELECT * FROM medicine_stock WHERE quantity!='0' AND exp>CURDATE()+INTERVAL 1 MONTH";
                          $result = $conn->query($sql);
                          $i=0;
                          while($row = $result->fetch_assoc()){
                            $sql2 = "SELECT * FROM medicine WHERE medicine_id=".$row["medicine_id"];
                            $result2 = $conn->query($sql2);
                            $row2 = $result2->fetch_assoc();
                            $sql3 = "SELECT name FROM vendor WHERE vendor_id=".$row2["vendor_id"];
                            $result3 = $conn->query($sql3);
                            $row3 = $result3->fetch_assoc();
                        ?>
                        <tr class="align-middle">
                          <th scope="row"><?php echo $i+1; ?></th>
                          <td><?php echo $medicineBatchNo[$i]=$row["batch_no"]; ?></td>
                          <td><?php echo $medicineId[$i]=$row["medicine_id"]; ?></td>
                          <td><?php echo $medicineName[$i]=$row2["name"]; ?></td>
                          <td><?php echo $medicineCategory[$i]=$row2["category"]; ?></td>
                          <td><?php echo $medicineVendor[$i]=$row3["name"]; ?></td>
                          <td><?php echo $medicineMfg[$i]=date_format(date_create($row["mfg"]),"M-Y"); ?></td>
                          <td><?php echo $medicineExp[$i]=date_format(date_create($row["exp"]),"M-Y"); ?></td>
                          <td><?php echo $medicineAvlQuantity[$i]=$row["quantity"]; ?></td>
                          <td><?php echo $medicineSPrice[$i]=$row["selling_price"]; ?>/-</td>
                          <td><?php echo $medicineRack[$i]=$row2["rack"]; ?></td> 
                          <td>
                              <form method="POST" action="cashReceipt.php">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="<?php echo $row["batch_no"]; ?>">ADD</button>
                              </form>
                          </td>                         
                        </tr>                             
                        <?php
                          $i++;
                          }
                        ?>
                      </tbody>
                    </table>
                </div>

            </div>

          </div>

        </div>        
    
  </main><!-- End #main -->

  <!-- Script for Auto Price Calculate -->
  <script>
    var itemActutalPrice=[
      <?php 
        $j=0;
        while($j< $_SESSION["j"]){
          echo $itemPrice[$j];
          if(isset($itemPrice[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];

    var itemPrice=[
      <?php 
        $j=0;
        while($j< $_SESSION["j"]){
          echo $itemPrice[$j];
          if(isset($itemPrice[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];    

    function calPrice(qty,n){
      var product = qty*itemActutalPrice[n];
      itemPrice[n] = product;
      var i=0,sum=0;
      while(itemPrice[i]!=null){
        sum+=itemPrice[i];
        i++;
      }
      document.getElementById("med"+n).innerHTML=product+"/-";
      document.getElementById("total").innerHTML="Total (Rs): "+sum+"/-";
    }

  </script>

  <!-- Script for filtering medicine -->
  <script>
    var batchNo = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineBatchNo[$j].'"';
          if(isset($medicineBatchNo[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
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
    var mfd = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineMfg[$j].'"';
          if(isset($medicineMfg[$j+1])){
            echo ",";
          } 
          $j++;
        } 
      ?>
    ];
    var exp = [
      <?php 
        $j=0;
        while($j<$i){
          echo '"'.$medicineExp[$j].'"';
          if(isset($medicineExp[$j+1])){
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
    var price = [
      <?php 
        $j=0;
        while($j<$i){
          echo $medicineSPrice[$j];
          if(isset($medicineSPrice[$j+1])){
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
        while(batchNo[i]!=null){
          body=body+"<tr class='align-middle'><th scope='row'>"+(i+1)+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
          i++;
        }
      }else{
        if(j==1){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(batchNo[i]!=null){
            if(pattern.test(medicineId[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
              k++;
            }
            i++;
          }
        }
        else if(j==2){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(batchNo[i]!=null){
            if(pattern.test(medicineName[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
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
