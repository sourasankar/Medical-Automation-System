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

  $sql ="SELECT * FROM purchases";
  $result = $conn->query($sql);
  $totalPurchased = 0;                            
  while($row = $result->fetch_assoc()){
    $totalPurchased = $totalPurchased + ((int)$row["purchase_price"]*(int)$row["quantity"]);
  }

  $sql ="SELECT * FROM sold_medicine";
  $result = $conn->query($sql);
  $totalSold = 0;                            
  while($row = $result->fetch_assoc()){
    $totalSold = $totalSold + ((int)$row["price"]*(int)$row["quantity"]);
  }

?>
<!DOCTYPE html>
<html>

<head>
    
  <title>Profit & Revenue</title>
  
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
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Total Purchased</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #4154f1;background: #f6f6fe;">
                          <i class="bi bi-cash"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php if($totalPurchased!=0) echo $totalPurchased; else echo "0";?>/-</h6>
                        </div>
                      </div>
                    </div>

                  </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Total Sold</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #ff771d;background: #ffecdf;">
                        <i class="bi bi-currency-exchange"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php if($totalSold!=0) echo $totalSold; else echo "0"; ?>/-</h6>
                        </div>
                      </div>
                    </div>

                  </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Profit</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: rgb(46, 202, 106);background: rgb(224, 248, 233);">
                          <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo (int)(($totalSold/$totalPurchased)*100); ?>%</h6>
                        </div>
                      </div>

                    </div>
                  </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Revenue</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: rgb(46, 202, 106);background: rgb(224, 248, 233);">
                          <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php echo $totalSold-$totalPurchased; ?>/-</h6>
                        </div>
                      </div>

                    </div>
                  </div>
            </div>

        </div>
    </section>

  </main><!-- End #main -->


  <?php require "assets/php/footer.php"; ?>

</body>

</html>
