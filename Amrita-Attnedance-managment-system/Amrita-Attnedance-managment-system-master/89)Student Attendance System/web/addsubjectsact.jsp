
<%@page import="java.sql.*"%>
<%@page import="databaseconnection.databasecon"%>
<%@ page session="true" %>

<html>
<body>
<%
   Connection con = null;
   
           String yr=request.getParameter("yr");
           String sem=request.getParameter("sem");
	    String subject1=request.getParameter("sub1");
            String subject2=request.getParameter("sub2");
            String subject3=request.getParameter("sub3");
            String subject4=request.getParameter("sub4");
            String subject5=request.getParameter("sub5");
            String subject6=request.getParameter("sub6");
            
                try
		{
		
	con = databasecon.getconnection();
	PreparedStatement pst2=con.prepareStatement("insert into subjects values(?,?,?,?,?,?,?,?)");
        pst2.setString(1,yr);
         pst2.setString(2,sem);
        pst2.setString(3,subject1);
        pst2.setString(4,subject2);
        pst2.setString(5,subject3);
        pst2.setString(6,subject4);
        pst2.setString(7,subject5);
        pst2.setString(8,subject6);
        pst2.executeUpdate();
                
       response.sendRedirect("addsubjects.jsp?msg=success"); 
       }
	  
	catch(SQLException e)
        {
		out.print(e.getMessage());
	    }  
           %>
</body>
</html>