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

          <!-- <div class="card">
            <div class="card-body" >
              <h5 class="card-title">Invoice</h5>
                <div id="printReceipt">
                    <div style="display: flex;justify-content: space-evenly;" class="row"> 
                        <fieldset style="all: revert; font-weight: 600;width: fit-content;" class="col-6">
                            <legend style="all: revert;">Cash Receipt:</legend>
                            Receipt No: 54854525515615<br>
                            Date & Time: 20-Nov-2021 13:45:47<br><br>
                            <u>Med #Qty @Price</u><br>
                            Paracetamol 650 #2 @120/-<br>
                            Paracetamol 650 #2 @120/-<br>
                            Paracetamol 650 #2 @120/-<br><br>
                            Total Price: 360/-<br>	                                    
                        </fieldset>                      
                    </div>
                </div>
                <div class="text-center" style="margin-top: 20px;">
                    <button type="button" class="btn btn-danger col-2" onclick="printReceipt()">Print</button>
                </div> 
            
              </div>

          </div> -->

          <div class="card">
            <div class="card-body" >
              
              <form method="POST" action="#">
                <h5 class="card-title">Invoice</h5>
                <div style="overflow: auto;">
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
                      </tbody>
                    </table>                  
                </div>
                <div class="align-middle" style="font-weight: 700;display: flex;justify-content: center;align-items: center;">      
                  <div id="total">Total (Rs): 60/-</div>
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 25px;" name="generate">Generate</button>    
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
                      <tbody id="tbody">
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

  <!-- Script for Auto Price Calculate -->
  <script>
    var itemPrice=[10,20,30];

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
    var batchNo = ["4324","65454","23465"];
    var medicineId = ["65445","432","987"];
    var medicineName = ["kooParacetamol 650","kgdParacetamol 650","hParacetamol 650"];
    var category = ["Painkiller","Painkiller","Painkiller"];
    var vendor = ["Alkem","Alkem","Alkem"];
    var mfd = ["Nov-2021","Nov-2021","Nov-2021"];
    var exp = ["Dec-2022","Dec-2022","Dec-2022"];
    var avlQty = [10,10,10];
    var price = [10,20,30];
    var rackNo = ["R5","R5","R5"];

    function tableContents(query,j){
      var body="";
      var i,k;
      if(query==""){
        i=0;
        while(batchNo[i]!=null){
          body=body+"<tr class='align-middle'><th scope='row'>"+(i+1)+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
          i++;
        }
      }else{
        if(j==1){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(batchNo[i]!=null){
            if(pattern.test(medicineId[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
              k++;
            }
            i++;
          }
        }
        else if(j==2){
          i=0;
          k=1;
          pattern = new RegExp("^"+query,"i");
          while(batchNo[i]!=null){
            if(pattern.test(medicineName[i])){
              body=body+"<tr class='align-middle'><th scope='row'>"+k+"</th><td>"+batchNo[i]+"</td><td>"+medicineId[i]+"</td><td>"+medicineName[i]+"</td><td>"+category[i]+"</td><td>"+vendor[i]+"</td><td>"+mfd[i]+"</td><td>"+exp[i]+"</td><td>"+avlQty[i]+"</td><td>"+price[i]+"/-</td><td>"+rackNo[i]+"</td><td><form method='POST' action='#'><button type='submit' class='btn btn-primary btn-sm' name='add' value="+batchNo[i]+">ADD</button></form></td></tr>";
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
