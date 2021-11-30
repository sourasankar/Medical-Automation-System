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

            <div class="alert alert-success alert-dismissible fade show col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Consignment has been Received and Added to Inventory
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendor: Alkem</h5>    

                    <div style="display: flex;justify-content: space-evenly;" class="row"> 
                        <fieldset style="all: revert; font-weight: 600;width: fit-content;" class="col-6">
                            <legend style="all: revert;">Alkem:</legend>
                            <u>Med #Qty @Price</u><br>
                            Paracetamol 650 #2 @120/-<br>
                            Paracetamol 650 #2 @120/-<br>
                            Paracetamol 650 #2 @120/-<br><br>
                            Total Price: 360/-<br><br> 
                            <u>Transfer Money to:</u><br>
                            Account No: 9874565633221<br>
                            IFSC Code: SBIN4566IN                                   
                        </fieldset>                      
                    </div>     
                <div class="text-center" style="margin-top: 20px;">
                    <button type="button" class="btn btn-danger col-3 col-md-2 col-lg-1" onclick="payVendor('alkem')">Paid</button>
                </div> 
            
            </div>

          </div>
        </div>

      </div>        
    
  </main><!-- End #main -->
  <form method="GET" action="#" id="payVendor">
    <input type="hidden" name="vendorId" id="vendorId">
  </form>

  <!-- To Pay Vendor -->
  <script>
    function payVendor(id){
      document.getElementById("vendorId").value=id;
      document.getElementById("payVendor").submit();
    }
  </script>

  <?php require "assets/php/footer.php"; ?>

</body>

</html>
