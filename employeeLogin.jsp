<%-- 
    Document   : employeeLogin
    Created on : Nov 25, 2021, 7:39:56 PM
    Author     : soura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Employee Login</title>

  <%@include file="assets/jsp/head.jsp"%>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">CMS Admin</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body" style="padding-bottom: 30px;">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Employee Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                    <form method="POST" action="employeeLogin.jsp" class="row g-3">

                    <div class="col-12">
                      <label for="employeeUsername" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="employeeUsername" class="form-control" id="employeeUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="employeePassword" class="form-label">Password</label>
                      <input type="password" name="employeePassword" class="form-control" id="employeePassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                        <button class="btn btn-primary w-100" id="submit" name="submit" value="submit" type="submit">Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
    
  <%@include file="assets/jsp/footer.jsp"%>

</body>

</html>
