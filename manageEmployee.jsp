<%-- 
    Document   : manageEmployee
    Created on : Nov 25, 2021, 8:27:26 PM
    Author     : soura
--%>
<%
    if(session.getAttribute("branchUsername")==null){
        response.sendRedirect("branchLogin.jsp");
    }  
%>
<%!
    String employeeName,employeePhone,addEmployee,errorNameMsg,errorPhoneMsg;
%>
<%@page import="java.sql.*, java.util.regex.*"%>
<%@include file="assets/jsp/dbConnection.jsp"%>
<%
    if(request.getParameter("addEmployee")!=null && request.getMethod().equals("POST")){
    
    //Data from FORM
    employeeName = request.getParameter("employeeName");
    employeePhone = request.getParameter("employeePhone");
    int flag=1;
    
    if(Pattern.matches("^[A-Za-z]+(\\s[A-Za-z]+)*$", employeeName)==false){
            flag = 0;
            errorNameMsg = "is-invalid";
    }
    else{
        errorNameMsg = "";
    }
    
    if(Pattern.matches("^(\\d{10})$", employeePhone)==false){
            flag = 0;
            errorPhoneMsg = "is-invalid";
    }
    else{
        errorPhoneMsg = "";
    }
    
    if(flag==1){
        addEmployee = "success";
        
        String sql = "SELECT * FROM employee_details WHERE branch_id=?";
        PreparedStatement st=conn.prepareStatement(sql);
        st.setString(1,String.valueOf(session.getAttribute("branchUsername")));

        ResultSet rs=st.executeQuery();

        sql = "INSERT INTO employee_details (branch_id,name,phone) VALUES (?,?,?);";
        st=conn.prepareStatement(sql);
        st.setString(1,String.valueOf(session.getAttribute("branchUsername")));
        st.setString(2,employeeName);
        st.setString(3,employeePhone);
        
        st.executeUpdate();
        
        employeeName = employeePhone = "";
          
        
    }
    
%>
   
<%
    }
    else{
        employeeName=employeePhone=errorNameMsg=errorPhoneMsg=""; 
        addEmployee=null;
    }   
%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>

<head>
    
  <title>Manage Employee</title>
  
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
      <h1>Manage Employee</h1>
    </div><!-- End Page Title -->
    
        <div class="row">
            
            <div class="col-lg-6">
                <div class="card">
                 <div class="card-body">
                   <h5 class="card-title">Employees</h5>

                   <!-- Default Table -->
                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th scope="col">#</th>
                         <th scope="col">Employee ID</th>
                         <th scope="col">Name</th>
                         <th scope="col">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                         <%
                            String sql = "SELECT * FROM employee_details WHERE branch_id=?";
                            PreparedStatement st=conn.prepareStatement(sql);
                            st.setString(1,String.valueOf(session.getAttribute("branchUsername")));

                            ResultSet rs=st.executeQuery();
                            int i=1;
                            while(rs.next()){
                                
                            
                         %>
                       <tr class="align-middle">
                         <th scope="row"><%= i %></th>
                         <td><%= "EMP"+session.getAttribute("branchUsername").toString().toUpperCase()+rs.getString("employee_id") %></td>
                         <td><%= rs.getString("name").toUpperCase() %></td>
                         <td>
                             <div style="display: flex;justify-content: space-evenly;">
                                <form method="POST" action="manageEmployee.jsp">
                                    <button type="submit" class="btn btn-primary" name="edit" value="<%= rs.getString("employee_id") %>"><i class="bi bi-pencil-square"></i></button>
                                </form>
                                <form method="POST" action="manageEmployee.jsp">
                                    <button type="submit" class="btn btn-danger" name="delete" value="<%= rs.getString("employee_id") %>"><i class="bi bi-trash"></i></button>
                                </form> 
                            </div>
                         </td>
                       </tr>
                       <%
                           i++;
                           }
                       %>
                     </tbody>
                   </table>
                   <!-- End Default Table Example -->
                 </div>
               </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                <div class="card-body">
                    
                    <%
                    if(addEmployee!=null){
                    %>
                    
                    <div class="alert alert-success alert-dismissible fade show col-md-10 text-center mx-auto" style="margin-top: 20px;" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        Employee has been Added successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                    <%
                    }
                    %>
                    
                  <h5 class="card-title">Add Employee</h5>

                  <form class="row g-3" method="POST" action="manageEmployee.jsp">
                      
                    <div class="col-md-6">
                      <label for="employeeName" class="form-label">Name</label>
                      <input type="text" class="form-control <%= errorNameMsg%>" id="employeeName" name="employeeName" value="<%= employeeName%>" required>
                      <span class="invalid-feedback">
        		Enter valid Phone No
                        </span>
                    </div>
                    <div class="col-md-6">
                      <label for="employeePhone" class="form-label">Phone No</label>
                      <input type="phone" class="form-control <%= errorPhoneMsg%>" id="employeePhone" name="employeePhone" value="<%= employeePhone%>" required>
                      <span class="invalid-feedback">
        		Enter valid Phone No
                        </span>
                    </div>
                 
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="addEmployee" name="addEmployee" value="addEmployee">Add Employee</button>
                    </div>
                      
                </form>
                  
                </div>
              </div>
            </div>

        </div>

  </main><!-- End #main -->


  <%@include file="assets/jsp/footer.jsp"%>
  <%
      conn.close();
  %>

</body>

</html>