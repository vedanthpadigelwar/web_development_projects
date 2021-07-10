<%@page import="java.sql.*"%>
<%@page import="databaseconnection.*"%>
<%@ page session="true" %>
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
                    <li><a href="faculty.jsp">Faculty</a></li>
                    <li><a href="student.jsp" class="selected">Student</a></li>
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
  
    try 
    
    {
        String date = request.getParameter("date");
         String to = request.getParameter("to");
        System.out.println("date" +date);
        String rollno = session.getAttribute("rollno").toString();
        System.out.println("rollno" +rollno);
        
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from attendance where  rollno='"+rollno+"' and date between '"+date+"' and '"+to+"'");
      
        
        
        
    %>
        
    <br>
     <center> 
      
         <font color="white" size="5">Student Attendance Details</font>
         <br><br>
	    <table width="100%" height="80" border="2">
                                              
                <tr>
                <th><font color="red">Roll No</th>
                <th><font color="red">Student Name</th> 
                <th><font color="red">Branch</th>
                <th><font color="red">Date</th>
                <th><font color="red">Attendance</th>
               </tr>
                                              
    <%
        while(rs.next()){
        
        
        %>
       <tr>
        
         <th style="color: white"><%=rs.getString(1)%></th>
         <th style="color: white"><%=rs.getString(2)%></th>
         <th style="color: white"><%=rs.getString(3)%></th>
         <th style="color: white"><%=rs.getString(6)%></th>
         <th style="color: white"><%=rs.getString(7)%></th>
       </tr>
       
    
                 <%}%>
        </table></center>
        <%}
         catch (Exception e) {
        e.printStackTrace();
        }
        %>	
      
   </div>
        <br><br>
        <div class="col_300 float_r">
        <h2>Student Menu</h2>
              <li><a href="studenthome.jsp"  style="text-decoration:none"><font size="3">Home</a></li>
              <li><a href="viewattendance.jsp"style="text-decoration:none">View Attendance</a></li>
              <li><a href="studentattendance.jsp"style="text-decoration:none"><font size="2">View Total Attendance</font></a></li>
              <li><a href="savg.jsp"style="text-decoration:none">Average</a></li>
              <li><a href="viewsubjects.jsp"style="text-decoration:none">View Subjects</a></li>
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
