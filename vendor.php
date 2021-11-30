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
            
            <div class="">
                <div class="card">
                 <div class="card-body">
                   <h5 class="card-title">Vendors</h5>

                   <!-- Default Table -->
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
                       <tr class="align-middle">
                         <th scope="row">1</th>
                         <td>3213</td>
                         <td>Alkem</td>
                         <td>xyz, 784521</td>
                         <td>9876543210</td>
                         <td>something@dsa.com</td>  
                         <td>985642123345</td>
                         <td>SBIN7894IN</td>
                       </tr>
                       <tr class="align-middle">
                         <th scope="row">1</th>
                         <td>3213</td>
                         <td>Alkem</td>
                         <td>xyz, 784521</td>
                         <td>9876543210</td>
                         <td>something@dsa.com</td>  
                         <td>985642123345</td>
                         <td>SBIN7894IN</td>
                       </tr>
                       <tr class="align-middle">
                         <th scope="row">1</th>
                         <td>3213</td>
                         <td>Alkem</td>
                         <td>xyz, 784521</td>
                         <td>9876543210</td>
                         <td>something@dsa.com</td>  
                         <td>985642123345</td>
                         <td>SBIN7894IN</td>
                       </tr>
                       <tr class="align-middle">
                         <th scope="row">1</th>
                         <td>3213</td>
                         <td>Alkem</td>
                         <td>xyz, 784521</td>
                         <td>9876543210</td>
                         <td>something@dsa.com</td>  
                         <td>985642123345</td>
                         <td>SBIN7894IN</td>
                       </tr>
                     </tbody>
                   </table>
                   <!-- End Default Table Example -->
                 </div>
                </div>
            </div>
            <div class="">
                <div class="card">
                <div class="card-body">
                    
                    <!-- <div class="alert alert-success alert-dismissible fade show col-md-10 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Employee has been Added successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
                    
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


  <?php require "assets/php/footer.php"; ?>

</body>

</html>