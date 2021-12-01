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

  $sql ="SELECT COUNT(*) as count FROM medicine";
  $result = $conn->query($sql);                            
  $row = $result->fetch_assoc();

  $medicineCount = $row["count"];

  $sql = "SELECT COUNT(*) as count FROM medicine_stock WHERE exp<CURDATE()";

  $result = $conn->query($sql);                            
  $row = $result->fetch_assoc();

  $expired = $row["count"];

  $sql = "SELECT COUNT(*) as count FROM medicine_stock WHERE MONTH(exp)=MONTH(CURDATE()) AND YEAR(exp)=YEAR(CURDATE())";

  $result = $conn->query($sql);                            
  $row = $result->fetch_assoc();

  $expiring = $row["count"];


?>
<!DOCTYPE html>
<html>

<head>
    
  <title>Dashboard</title>
  
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
                      <h5 class="card-title">Medicines</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #4154f1;background: #f6f6fe;">
                          <i class="bi bi-shield-plus"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php if($medicineCount!=0) echo $medicineCount; else echo "0";?></h6>
                        </div>
                      </div>
                    </div>

                  </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Expiring</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #ff771d;background: #ffecdf;">
                        <i class="bi bi-calendar-x"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php if($expiring!=0) echo $expiring; else echo "0"; ?></h6>
                        </div>
                      </div>
                    </div>

                  </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card info-card">

                    <div class="card-body">
                      <h5 class="card-title">Expired</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: rgb(46, 202, 106);background: rgb(224, 248, 233);">
                          <i class="bi bi-calendar-x"></i>
                        </div>
                        <div class="ps-3">
                          <h6><?php if($expired!=0) echo $expired; else echo "0"; ?></h6>
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
