<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
<%@ page import="java.text.SimpleDateFormat,java.util.Date,java.io.*,javax.servlet.*, javax.servlet.http.*" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
     <%
            if (request.getParameter("msg") != null) {%>
        <script>alert('Faculty Login Successfully');</script>
        <%}%> 
    
    <style>
        .li {
            
            text-decoration: none;
            color: red;
            font-size: 4px;
        } 
    </style>
    <div id="slider">
    <div id="header_wrapper">
    <div id="header"><br><br>
    <font size="6" color="#FFFF00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Attendance System</font>
    </div>
    </div>
        
        <div id="menu_wrapper">
        <div id="menu">
                <ul class="navigation">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="admin.jsp">Admin</a></li>
                    <li><a href="faculty.jsp" class="selected">Faculty</a></li>
                    <li><a href="student.jsp">Student</a></li>
                     <li><a href="contact.jsp">Contact</a></li>
               </ul>
        </div>
        </div>
        <div id="content_wrapper">
        <div id="content">
        <div class="panel" id="home">
        <div class="col_550 float_l">
        <div class="cleaner_h30"></div>
    
     <%
  SimpleDateFormat sdfDate = new SimpleDateFormat("dd/MM/yyyy");
					SimpleDateFormat sdfTime = new SimpleDateFormat("HH:mm:ss");
					Date now = new Date();
										
					String strDate = sdfDate.format(now);
    try {
        
        String yr = request.getParameter("yr");
        System.out.println("yr" +yr);
        String branch = request.getParameter("branch");
         System.out.println("branch" +branch);
        String semester = request.getParameter("sem");
         System.out.println("semester" +semester);
        
       
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from student where yr='"+yr+"' and branch='"+branch+"' and semester='"+semester+"' ");
       
    %>

        <%
String a=request.getParameter("t");
Statement st1 = con.createStatement();
ResultSet rs2=st1.executeQuery("select * from student where yr='"+yr+"' and branch='"+branch+"' and semester='"+semester+"' ");
%>
<center>
 Date :   <%=strDate%>
<table><tr>
 <form method=post action="answers.jsp">
    
<%
int i=1;
while(rs2.next())
{
%><input type=hidden value=<%=rs2.getString(4) %> name="n<%=i %>">
    
    <tr><td><%= rs2.getString("rollno") %></td>

        
        <td><input type=radio value=Present name=cat<%=i %>>Present</td>
        <td><input type=radio value=Absent name=cat<%=i %>>Absent</td>
        
    </tr>
   
<%
i++;
}
%>

<td>
<input type=hidden value=<%=i %> name="tot">
<input type=submit value=submit></tr>
</form>
</table> 
       
         
        </center>
         </form>
        	
        
  </div>
        <br><Br><br>  
        <div class="col_300 float_r">
        <h2>Faculty Menu</h2>
              <li><a href="facultyhome.jsp"  style="text-decoration:none"><font size="3">Home</a></li>
              <li><a href="attendance.jsp"style="text-decoration:none">Attendance</a></li>
              <li><a href="favg.jsp"style="text-decoration:none">Average</a></li>
              <li><a href="index.html"style="text-decoration:none">Logout</a></li>
         </div>
         </div> 
         </div>
         </div>
         </div> 
         </div> 
         <div id="footer">
         <br><br>

</body>
</html>
<%}
         catch (Exception e) {
        e.printStackTrace();
        }
        %>