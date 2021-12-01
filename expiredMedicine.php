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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Expired Medicines</title>

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
      <h1>Expired Medicines</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-body" >
                
                <h5 class="card-title">Inventory</h5>
                <div style="overflow: auto;">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Batch No</th>
                          <th scope="col">Medicine ID</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Mfd.</th>
                          <th scope="col">Exp.</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Retail Price</th>
                          <th scope="col">Selling Price</th>
                          <th scope="col">Rack No</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $sql = "SELECT * FROM medicine_stock WHERE exp<CURDATE()";
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
                          <td><?php echo $row["batch_no"]; ?></td>
                          <td><?php echo $row["medicine_id"]; ?></td>
                          <td><?php echo $row2["name"]; ?></td>
                          <td><?php echo $row2["category"]; ?></td>
                          <td><?php echo $row3["name"]; ?></td>
                          <td><?php echo date_format(date_create($row["mfg"]),"M-Y"); ?></td>
                          <td><?php echo date_format(date_create($row["exp"]),"M-Y"); ?></td>
                          <td><?php echo $row["quantity"]; ?></td>
                          <td><?php echo $row["purchase_price"]; ?>/-</td>
                          <td><?php echo $row["selling_price"]; ?>/-</td>
                          <td><?php echo $row2["rack"]; ?></td>                          
                        </tr>
                        <?php
                           $i++; }
                        ?>
                      </tbody>
                    </table>
                </div>

            </div>

          </div>

        </div>        
    
  </main><!-- End #main -->

  <?php 
    //connection to db close
    $conn->close();
  ?>
  
  <?php require "assets/php/footer.php"; ?>

</body>

</html>
