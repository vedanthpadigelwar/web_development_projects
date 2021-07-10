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
     <%
            if (request.getParameter("msg") != null) {%>
        <script>alert('Student Login Successfully');</script>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Faculty</a></li>
                    <li><a href="#" class="selected">Student</a></li>
                    <li><a href="#">Contact</a></li>
               </ul>
        </div>
        </div>
        <div id="content_wrapper">
        <div id="content">
        <div class="panel" id="home">
        <div class="col_550 float_l">
        <div class="cleaner_h30"></div>
     <%
  
        String yr = session.getAttribute("yr").toString();
        String semester = session.getAttribute("semester").toString();
            
    try {
        
        
       
	Connection con = databasecon.getconnection();
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery("select * from subjects  where sem = '"+semester+"' and yr = '"+yr+"'");
      
    %>
        
    <br>
     <center> 
      
        <h2><font color="#3183bf" size="5">View Subjects</font></h2>
        <br>
	    <table width="500" height="130" border="2">
                                              
                <tr>
                <th><font color="#FFFF00">Subject1</th>
                <th><font color="#FFFF00">Subject2</th> 
                <th><font color="#FFFF00">Subject3</th>
                <th><font color="#FFFF00">Subject4</th>
                <th><font color="#FFFF00">Subject5</th>
                <th><font color="#FFFF00">Subject6</th></font>
           
               
               
                </tr>
                                              
    <%
        while(rs.next()){
        
        
        %>
       <tr>
        
      
         <th style="color: white"><%=rs.getString(3)%></th>
         <th style="color: white"><%=rs.getString(4)%></th>
         <th style="color: white"><%=rs.getString(5)%></th>
         <th style="color: white"><%=rs.getString(6)%></th>
         <th style="color: white"><%=rs.getString(7)%></th>
         <th style="color: white"><%=rs.getString(8)%></th>
         
       </tr>
       
    
                 <%}%>
        </table></center>
        <%}
         catch (Exception e) {
        e.printStackTrace();
        }
        %>	
        
        </div>
        <br><Br><br>  
        <div class="col_300 float_r">
        <h2>Student Menu</h2>
              <li><a href="studenthome.jsp"  style="text-decoration:none">Home</a></li>
              <li><a href="viewattendance.jsp"style="text-decoration:none">View Attendance</a></li>
              <li><a href="studentattendance.jsp"style="text-decoration:none">View Total Attendance</a></li>
              <li><a href="savg.jsp"style="text-decoration:none">Average</a></li>
              <li><a href="viewsubjects.jsp"style="text-decoration:none">View Subjects</a></li>
              <li><a href="logout.jsp"style="text-decoration:none">Logout</a></li>
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
