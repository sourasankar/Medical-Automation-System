<?php

	//session start
	session_start();

  //if not logged in
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    die();
  }

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
                          <th scope="col">Selling Price</th>
                          <th scope="col">Rack No</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>                          
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>Nov-2021</td>
                          <td>Dec-2022</td>
                          <td>10</td>
                          <td>120/-</td>
                          <td>R5</td>                          
                        </tr>
                      </tbody>
                    </table>
                </div>

            </div>

          </div>

        </div>        
    
  </main><!-- End #main -->
  
  <?php require "assets/php/footer.php"; ?>

</body>

</html>
