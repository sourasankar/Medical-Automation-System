<%-- 
    Document   : logout.jsp
    Created on : Nov 26, 2021, 12:10:24 PM
    Author     : soura
--%>

<%
    
    session.invalidate();
    response.sendRedirect("../../branchLogin.jsp");

%>
