<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
<%
    String facultyname = request.getParameter("fname");
    System.out.println(facultyname);
    String password = request.getParameter("password");
    System.out.println(password);
    try{
      
		
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from faculty where facultyname='"+facultyname+"' and password='"+password+"'");
       if(rs.next())
        {
         String  user = rs.getString(2);
		   session.setAttribute("user",user);
		   System.out.println("User:"+user);
                   response.sendRedirect("facultyhome.jsp?msg=Login");
        }
       else 
        {
            response.sendRedirect("faculty.jsp?msg=LoginFail");
                }
	}
    catch(Exception e)
    {
        System.out.println("Error in faculty.jsp"+e.getMessage());
    }
%>


