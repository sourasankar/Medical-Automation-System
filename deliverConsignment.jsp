<%-- 
    Document   : deliverConsignment
    Created on : Nov 25, 2021, 5:57:31 PM
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
  
  <title>Deliver Consignment</title>

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
      <h1>Deliver Consignment</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-body" >
                <%
                    if(request.getParameter("deliver")!=null && request.getMethod().equals("POST")){
                %>
                
                  

                    <h5 class="card-title">Package Details</h5>

                    <div class="row" style="display: flex;justify-content: center;">
                        <fieldset style="all: revert; font-weight: 600;" class="col-6">
                            <legend style="all: revert;">Consignment Details:</legend>
                            Consignment ID: AEGD74595WB <br>
                            Dimension: 12x14x9cm<br>
                            Weight: 15gm<br>
                            Amount: 125/-<br>
                            Book at: Hooghly H.O<br><br>
                            <u>Deliver To:</u><br>
                            Soura Sankar Mondal<br>
                            Bali Kali Tala,<br>P.O & Dist- Hooghly,<br>
                            Hooghly, West Bengal, 712103                       
                        </fieldset>
                    </div>
                    <form method="POST" action="deliverConsignment.jsp">
                        <div style="margin-top: 20px;display: flex;justify-content: center;">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xxl-3">
                                <label for="employee" class="form-label">Assign Employee: <span style="color: red;">*</span></label>
                                <select id="employee" name="employee" class="form-select" required>
                                  <option value="">Choose...</option>
                                  <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-success col-6 col-md-4 col-lg-3 col-xxl-2" id="deliverConsignment" name="deliverConsignment" value="fdsfd">Deliver Consignment</button>
                        </div>
                    </form>

                  
                <%
                    }
                    else{
                        if(request.getParameter("deliverConsignment")!=null && request.getMethod().equals("POST")){
                %>
                <div class="alert alert-success alert-dismissible fade show col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 20px;" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Consignment ID: FDDS6565DS has been assigned to Soura Sankar for Delivery
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <%
                  }  
                %>
                
                <h5 class="card-title">Inventory</h5>
                <div class="col-md-10 offset-md-1 col-xxl-8 offset-xxl-2">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Consignment ID</th>
                          <th scope="col">Deliver To</th>
                          <th scope="col">Deliver</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <th scope="row">1</th>
                          <td>Brandon Jacob</td>
                          <td>Designer</td>
                          <td>
                              <form method="POST" action="deliverConsignment.jsp">
                                  <button type="submit" class="btn btn-success btn-sm" name="deliver" value="dsad465ad5">Deliver</button>
                              </form>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">2</th>
                          <td>Bridie Kessler</td>
                          <td>Developer</td>
                          <td>
                              <form method="POST" action="deliverConsignment.jsp">
                                  <button type="submit" class="btn btn-success btn-sm" name="deliver" value="dsad465ad5">Deliver</button>
                              </form>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">3</th>
                          <td>Ashleigh Langosh</td>
                          <td>Finance</td>
                          <td>
                              <form method="POST" action="deliverConsignment.jsp">
                                  <button type="submit" class="btn btn-success btn-sm" name="deliver" value="dsad465ad5">Deliver</button>
                              </form>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">4</th>
                          <td>Angus Grady</td>
                          <td>HR</td>
                          <td>
                              <form method="POST" action="deliverConsignment.jsp">
                                  <button type="submit" class="btn btn-success btn-sm" name="deliver" value="dsad465ad5">Deliver</button>
                              </form>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <th scope="row">5</th>
                          <td>Raheem Lehner</td>
                          <td>Dynamic Division Officer</td>
                          <td>
                              <form method="POST" action="deliverConsignment.jsp">
                                  <button type="submit" class="btn btn-success btn-sm" name="deliver" value="dsad465ad5">Deliver</button>
                              </form>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                
                <%
                    }        
                %>

            </div>
              
              
          </div>

        </div>        
    
  </main><!-- End #main -->

  <%@include file="assets/jsp/footer.jsp"%>

</body>

</html>
