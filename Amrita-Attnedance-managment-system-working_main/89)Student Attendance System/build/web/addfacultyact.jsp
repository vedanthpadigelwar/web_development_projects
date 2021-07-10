<%@page import="java.sql.*"%>
<%@page import="databaseconnection.databasecon"%>
<%@ page session="true" %>

<html>
<body>
<%
   Connection con = null;
           
	    String facultyname=request.getParameter("fname");
            String password=request.getParameter("password");
            String email=request.getParameter("email");
            String facultyid=request.getParameter("fid");
            String department=request.getParameter("dep");
            String mobile=request.getParameter("mobile");
            
                try
		{
		
	con = databasecon.getconnection();
	PreparedStatement pst2=con.prepareStatement("insert into faculty values(?,?,?,?,?,?)");
       
        pst2.setString(1,facultyid);
        pst2.setString(2,facultyname);
        pst2.setString(3,password);
        pst2.setString(4,email);
        pst2.setString(5,department);
        pst2.setString(6,mobile);
        pst2.executeUpdate();
                
       response.sendRedirect("addfaculty.jsp?msg=success"); 
       }
	  
	catch(SQLException e)
        {
		out.print(e.getMessage());
	    }  
           %>
</body>
</html>