<%@page import="java.sql.*"%>
<%@page import="databaseconnection.databasecon"%>
<%@ page session="true" %>

<html>
<body>
<%
   Connection con = null;
           
	    String sname=request.getParameter("sname");
            String password=request.getParameter("password");
            String email=request.getParameter("email");
            String rollno=request.getParameter("sid");
            String yr=request.getParameter("yr");
            String branch=request.getParameter("branch");
            String semester=request.getParameter("sem");
            String mobile=request.getParameter("mobile");
            String date=request.getParameter("date");
            
                try
		{
		
	con = databasecon.getconnection();
	PreparedStatement pst2=con.prepareStatement("insert into student values(?,?,?,?,?,?,?,?,?)");
       
        pst2.setString(1,sname);
        pst2.setString(2,password);
        pst2.setString(3,email);
        pst2.setString(4,rollno);
        pst2.setString(5,yr);
        pst2.setString(6,branch);
        pst2.setString(7,semester);
        pst2.setString(8,mobile);
        pst2.setString(9,date);
        pst2.executeUpdate();
                
       response.sendRedirect("addstudent.jsp?msg=success"); 
       }
	  
	catch(SQLException e)
        {
		out.print(e.getMessage());
	    }  
           %>
</body>
</html>