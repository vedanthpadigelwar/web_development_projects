<%@page import="java.sql.*"%>
<%@page import="databaseconnection.databasecon"%>
<%@ page session="true" %>

<html>
<body>
<%
   Connection con = null;
           
            String rollno=request.getParameter("rollno");
	    String sname=request.getParameter("sname");
            String branch=request.getParameter("branch");
            String date=request.getParameter("date");
            String att=request.getParameter("att");
            
                try
		{
		
	con = databasecon.getconnection();
	PreparedStatement pst2=con.prepareStatement("insert into attendance values(?,?,?,?,?)");
        
        pst2.setString(1,rollno);
        pst2.setString(2,sname);
        pst2.setString(3,branch);
        pst2.setString(4,date);
        pst2.setString(5,att);
        pst2.executeUpdate();
                
       response.sendRedirect("attendance1.jsp?msg=success"); 
       }
	  
	catch(SQLException e)
        {
		out.print(e.getMessage());
	    }  
           %>
</body>
</html>