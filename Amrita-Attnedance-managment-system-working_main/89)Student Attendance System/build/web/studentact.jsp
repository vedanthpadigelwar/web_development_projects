<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
<%
    String rollno = request.getParameter("sid");
    System.out.println(rollno);
    String password = request.getParameter("password");
    System.out.println(password);
    
    try{
      
		
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from student where rollno ='"+rollno+"' and password='"+password+"'");
       if(rs.next())
        {
         String  user = rs.getString(1);
         String  yr = rs.getString("yr");
         String  semester = rs.getString("semester");
		   session.setAttribute("user",user);
		   System.out.println("User:"+user);
                   session.setAttribute("rollno",rollno);
                   session.setAttribute("semester",semester);
                   session.setAttribute("yr",yr);
                   response.sendRedirect("studenthome.jsp?msg=Login");
        }
       else 
        {
            response.sendRedirect("student.jsp?msg=LoginFail");
                }
	}
    catch(Exception e)
    {
        System.out.println("Error in student.jsp"+e.getMessage());
    }
%>


