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

          <div class="card">
            <div class="card-body" >
              
              <form method="POST" action="#">
                <h5 class="card-title">Invoice</h5>
                <div class="">
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
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Alkem</td>
                          <td>Dec-2022</td>
                          <td><input onchange="calPrice(this.value,1)" type="number" class="form-control-sm" style="width: 70px;" name="med1" value="1" min=1></td>
                          <td id="med1">10/-</td>
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-danger btn-sm" name="delete" value="dsad465ad5"><i class="bi bi-trash"></i></button>
                              </form>
                          </td>                         
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Alkem</td>
                          <td>Dec-2022</td>
                          <td><input onchange="calPrice(this.value,2)" type="number" class="form-control-sm" style="width: 70px;" name="med2" value="1" min=1></td>
                          <td id="med2">20/-</td>
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-danger btn-sm" name="delete" value="dsad465ad5"><i class="bi bi-trash"></i></button>
                              </form>
                          </td>                         
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Alkem</td>
                          <td>Dec-2022</td>
                          <td><input onchange="calPrice(this.value,3)" type="number" class="form-control-sm" style="width: 70px;" name="med3" value="1" min=1></td>
                          <td id="med3">30/-</td>
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-danger btn-sm" name="delete" value="dsad465ad5"><i class="bi bi-trash"></i></button>
                              </form>
                          </td>                         
                        </tr>                       
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>9874662</td>
                          <td>8456</td>
                          <td>Paracetamol 650</td>
                          <td>Alkem</td>
                          <td>Dec-2022</td>
                          <td><input onchange="calPrice(this.value,4)" type="number" class="form-control-sm" style="width: 70px;" name="med4" value="1" min=1></td>
                          <td id="med4">40/-</td>
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-danger btn-sm" name="delete" value="dsad465ad5"><i class="bi bi-trash"></i></button>
                              </form>
                          </td>                         
                        </tr>
                      </tbody>
                    </table>
                    <div class="align-middle" style="font-weight: 700;display: flex;justify-content: center;align-items: center;">
                      
                      <div id="total">Total (Rs): 100/-</div>
                      <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 25px;" name="generate">Generate</button>
                      
                    </div>
                </div>
                </form>

            </div>

          </div>

          <div class="card">
            <div class="card-body" >

                <div class="row g-3" style="margin-top: 20px;">
                    <div class="col-md-4 col-lg-3 col-xxl-2">
                    Medicine ID: <input type="text" class="form-control" id="medicineId" required>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xxl-2">
                    Medicine Name: <input type="text" class="form-control" id="medicineName" required>
                    </div>
                </div>
                
                <h5 class="card-title">Inventory</h5>
                <div class="">
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
                              </form>
                          </td>                         
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
                          <td>
                              <form method="POST" action="#">
                                  <button type="submit" class="btn btn-primary btn-sm" name="add" value="dsad465ad5">ADD</button>
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
  
  <?php require "assets/php/footer.php"; ?>

</body>

</html>
