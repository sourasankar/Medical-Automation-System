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
  
  <title>Medicine to be Ordered</title>

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
      <h1>Medicine to be Ordered</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-body" >
                
                <h5 class="card-title">Required</h5>
                <div style="overflow: auto;">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Medicine ID</th>
                          <th scope="col">Medicine Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Vendor</th>
                          <th scope="col">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $sql = "SELECT * FROM medicine WHERE required!='0'";
                            $result = $conn->query($sql); 
                            $i=1;                           
                            while($row = $result->fetch_assoc()){
                              $sql2 ="SELECT name FROM vendor WHERE vendor_id='".$row["vendor_id"]."'";
                              $result2 = $conn->query($sql2);                            
                              $row2 = $result2->fetch_assoc();
                        ?>
                        <tr class="align-middle">
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $row["medicine_id"]; ?></td>
                          <td><?php echo $row["name"]; ?></td>
                          <td><?php echo $row["category"]; ?></td>
                          <td><?php echo $row2["name"]; ?></td>
                          <td><?php echo $row["required"]; ?></td>                      
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
