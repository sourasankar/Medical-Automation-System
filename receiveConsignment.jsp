<%-- 
    Document   : receiveConsignment
    Created on : Nov 24, 2021, 8:07:57 PM
    Author     : soura
--%>
<%
    if(session.getAttribute("branchUsername")==null){
        response.sendRedirect("branchLogin.jsp");
    }  
%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Receive Consignment</title>

  <%@include file="assets/jsp/head.jsp"%>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <%@include file="assets/jsp/nav.jsp"%>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <%@include file="assets/jsp/sidebar.jsp"%>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Receive Consignment</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-body" style="margin-top: 20px;">

              <!-- Multi Columns Form -->
              <form method="POST" action="receiveConsignment.jsp">
                  
<!--                  <h5 class="card-title">Package Details</h5>-->
                  
                <div class="row g-3">
                    <label for="consignmentId" class="col-md-3 col-lg-2 col-form-label">Consignment Id: <span style="color: red;">*</span></label>
                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <input type="text" class="form-control" id="consignmentId" name="consignmentId" required>
                    </div>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary col-6 offset-3 col-sm-4 offset-sm-4 col-md-2 offset-md-0 col-xl-1">Submit</button>
                </div>
                  
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
            
            <%
            if(request.getParameter("submit")!=null && request.getMethod().equals("POST")){
            %>
            
            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title">Package Details</h5>

                    <div style="display: flex;justify-content: center;">
                        <fieldset style="all: revert; font-weight: 600;" class="col-6">
                            <legend style="all: revert;">Consignment Details:</legend>
                            Consignment ID: AEGD74595WB <br>
                            Dimension: 12x14x9cm<br>
                            Weight: 15gm<br>
                            Amount: 125/-<br>
                            Book at: Hooghly H.O<br><br>
                            <u>Ship To:</u><br>
                            Soura Sankar Mondal<br>
                            Bali Kali Tala,<br>P.O & Dist- Hooghly,<br>
                            Hooghly, West Bengal, 712103                       
                        </fieldset>   
                    </div>
                    <div class="text-center" style="margin-top: 20px;">
                        <form method="POST" action="receiveConsignment.jsp">
                            <button type="submit" class="btn btn-primary col-6 col-md-4 col-lg-3 col-xxl-2" id="receiveConsignment" name="receiveConsignment" value="fdsfdsdfsf">Receive Consignment</button>
                        </form>
                    </div>
                 
                </div>
            </div>
            
            <%
            }
            if(request.getParameter("receiveConsignment")!=null && request.getMethod().equals("POST")){
            %>
            <div class="alert alert-success alert-dismissible fade show col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Consignment has been Received and Added to Inventory
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <%
            }
            %>
            
          

        </div>        
    
  </main><!-- End #main -->

  <%@include file="assets/jsp/footer.jsp"%>

</body>

</html>
