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

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addVendor"])){

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO vendor(name,address,phone,email,account_no,ifsc_code) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$vendorName,$vendorAddress,$vendorPhone,$vendorEmail,$vendorAcNo,$vendorIfsc);

    //Data from Form
    $vendorName = $_POST["vendorName"];
    $vendorAddress = $_POST["vendorAddress"];
    $vendorPhone = $_POST["vendorPhone"];
    $vendorEmail = $_POST["vendorEmail"];
    $vendorAcNo = $_POST["vendorAcNo"];
    $vendorIfsc = $_POST["vendorIfsc"];
    $stmt->execute();

    $success = "Vendor details saved successfully";

  }

?>

<!DOCTYPE html>
<html>

<head>
    
  <title>Manage Vendor</title>
  
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
      <h1>Manage Vendors</h1>
    </div><!-- End Page Title -->
    
        <div class="row">
            
            <div style="overflow: auto;">
                <div class="card">
                 <div class="card-body">
                   <h5 class="card-title">Vendors</h5>

                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th scope="col">#</th>
                         <th scope="col">Vendor ID</th>
                         <th scope="col">Name</th>
                         <th scope="col">Address</th>
                         <th scope="col">Phone</th>
                         <th scope="col">Email</th>
                         <th scope="col">A/C No</th>
                         <th scope="col">IFSC</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php 
                          $sql="SELECT * FROM vendor";
                          $result = $conn->query($sql);
                          $i=1;
                          while($row = $result->fetch_assoc()){
                       ?>
                       <tr class="align-middle">
                         <th scope="row"><?php echo $i; ?></th>
                         <td><?php echo $row["vendor_id"]; ?></td>
                         <td><?php echo $row["name"]; ?></td>
                         <td><?php echo $row["address"]; ?></td>
                         <td><?php echo $row["phone"]; ?></td>
                         <td><?php echo $row["email"]; ?></td>  
                         <td><?php echo $row["account_no"]; ?></td>
                         <td><?php echo $row["ifsc_code"]; ?></td>
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
            <div class="">
              <div class="card">
                <div class="card-body">
                    <?php 
                        if(isset($success)){  
                    ?>
                    <div class="alert alert-success alert-dismissible fade show col-md-8 col-lg-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Vendor details saved successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    
                  <h5 class="card-title">Add Vendor</h5>

                  <form class="row g-3" method="POST" action="vendor.php">
                      
                    <div class="col-md-6">
                      <label for="vendorName" class="form-label">Vendor Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="vendorName" name="vendorName" required> 
                    </div>
                    <div class="col-md-6">
                      <label for="vendorAddress" class="form-label">Address <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="vendorAddress" name="vendorAddress" required> 
                    </div>
                    <div class="col-md-6">
                      <label for="vendorPhone" class="form-label">Phone No <span style="color: red;">*</span></label>
                      <input type="phone" class="form-control" id="vendorPhone" name="vendorPhone" required>
                    </div>
                    <div class="col-md-6">
                      <label for="vendorEmail" class="form-label">Email <span style="color: red;">*</span></label>
                      <input type="email" class="form-control" id="vendorEmail" name="vendorEmail" required>
                    </div>
                    <div class="col-md-6">
                      <label for="vendorAcNo" class="form-label">Account No <span style="color: red;">*</span></label>
                      <input type="number" class="form-control" id="vendorAcNo" name="vendorAcNo" required>
                    </div>
                    <div class="col-md-6">
                      <label for="vendorIfsc" class="form-label">IFSC Code <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="vendorIfsc" name="vendorIfsc" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="addVendor" name="addVendor" value="addVendor">Add Vendor</button>
                    </div>
                      
                </form>
                  
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