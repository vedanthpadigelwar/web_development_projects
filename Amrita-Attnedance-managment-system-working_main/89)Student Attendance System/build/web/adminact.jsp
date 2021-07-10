<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
<%
    String username = request.getParameter("username");
    System.out.println(username);
    String password = request.getParameter("password");
    System.out.println(password);
    try{
      
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from admin where username='"+username+"' and password='"+password+"'");
       if(rs.next())
        {
         String  user = rs.getString(2);
		   session.setAttribute("user",user);
		   System.out.println("User:"+user);
			response.sendRedirect("adminhome.jsp?msg=Login");
        }
       else 
        {
            response.sendRedirect("admin.jsp?msg=LoginFail");
                }
	}
    catch(Exception e)
    {
        System.out.println("Error in adminact.jsp"+e.getMessage());
    }
%>


