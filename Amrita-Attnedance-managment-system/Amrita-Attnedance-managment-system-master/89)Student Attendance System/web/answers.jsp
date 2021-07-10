<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
<%@ page import="java.text.SimpleDateFormat,java.util.Date,java.io.*,javax.servlet.*, javax.servlet.http.*" %>

                     
<% 
    SimpleDateFormat sdfDate = new SimpleDateFormat("dd/MM/yyyy");
					SimpleDateFormat sdfTime = new SimpleDateFormat("HH:mm:ss");
					Date now = new Date();
										
					String strDate = sdfDate.format(now);
int a=Integer.parseInt(request.getParameter("tot"));
Connection con = databasecon.getconnection();
 Statement st1 = con.createStatement();
ResultSet rs2;
int m=0;
int k=0;
for(int i=1;i<a;i++)
{
    
String b=request.getParameter("n"+i);
String c=request.getParameter("cat"+i);
 Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from student where rollno = '"+b+"' ");
        if(rs.next())
        {
        
        
        }   

PreparedStatement pst2=con.prepareStatement("insert into attendance values(?,?,?,?,?,?,?)");
       
        pst2.setString(1,b);
        pst2.setString(2,rs.getString("sname"));
        pst2.setString(3,rs.getString("branch"));
        pst2.setString(4,rs.getString("yr"));
      pst2.setString(5,rs.getString("semester"));
      pst2.setString(6,strDate);
      pst2.setString(7,c);
        pst2.executeUpdate();
        
        
}

  response.sendRedirect("attendance.jsp?msg=success");
%>