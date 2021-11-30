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

          <div class="card">
            <div class="card-body" >

               <!-- <div class="alert alert-success alert-dismissible fade show col-md-8 col-lg-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Employee has been Added successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
              
              <form method="POST" action="#">
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
                          <th scope="col">R.Price</th>
                          <th scope="col">S.Price</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>
                            <input type="text" class="form-control-sm" style="width: 100px;" name="batchNoMed1" required>
                          </td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Alkem</td>
                          <td>
                            <input type="date" class="form-control-sm" style="width: 150px;" name="mfgDateMed1" required>
                          </td>
                          <td>
                            <input type="date" class="form-control-sm" style="width: 150px;" name="expDateMed1" required>
                          </td>
                          <td><input onchange="calPrice(this.value,1)" type="number" class="form-control-sm" style="width: 70px;" name="qtyMed1" value="1" min=1 required></td>
                          <td>
                            <input type="number" class="form-control-sm" style="width: 80px;" name="rPriceMed1" required>
                          </td>
                          <td>
                            <input type="number" class="form-control-sm" style="width: 80px;" name="sPriceMed1" required>
                          </td>
                          <td>  
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteMed('8456')"><i class="bi bi-trash"></i></button>
                          </td>                         
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
                <div class="align-middle" style="font-weight: 700;display: flex;justify-content: center;align-items: center;"> 
                  <button type="submit" class="btn btn-primary btn-sm" name="generate">Add Supply</button> 
                </div>
              </form>

            </div>

          </div>

          
              <div class="card">
                <div class="card-body">
                    
                    <!-- <div class="alert alert-success alert-dismissible fade show col-md-8 col-lg-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Employee has been Added successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
                    
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
                        <option value="4324">Alkem</option>
                        <option value="43424">Cipla</option>
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
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Painkiller</td>
                          <td>Alkem</td>
                          <td>10</td>
                          <td>R5</td> 
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-warning btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
                        </tr>
                      </tbody>
                    </table>
                </div>

            </div>

          </div>

        </div>        
    
  </main><!-- End #main -->

  <form method="POST" action="#" id="deleteForm">
    <input type="hidden" name="delete" id="delete">
  </form>

  <!-- Delete individual item -->
  <script>
    function deleteMed(id){
      document.getElementById("delete").value=id;
      document.getElementById("deleteForm").submit();
    }
  </script>

  <!-- Script for Auto Price Calculate -->
  <script>
    var price=[10,20,30,40];
    var itemPrice=[10,20,30,40];

    function calPrice(qty,n){
      var product = qty*price[n-1];
      itemPrice[n-1] = product;
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
    //var batchNo = ["4324","65454","23465"];
    var medicineId = ["65445","432","987"];
    var medicineName = ["kooParacetamol 650","kgdParacetamol 650","hParacetamol 650"];
    var category = ["Painkiller","Painkiller","Painkiller"];
    var vendor = ["Alkem","Alkem","Alkem"];
    //var mfd = ["Nov-2021","Nov-2021","Nov-2021"];
    //var exp = ["Dec-2022","Dec-2022","Dec-2022"];
    var avlQty = [10,10,10];
    //var price = [120,120,120];
    var rackNo = ["R5","R5","R5"];

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
  
  <?php require "assets/php/footer.php"; ?>

</body>

</html>