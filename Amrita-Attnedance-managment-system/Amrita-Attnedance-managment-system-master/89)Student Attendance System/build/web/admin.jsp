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
                    <li><a href="index.html" class="selected">Home</a></li>
                    <li><a href="admin.jsp">Admin</a></li>
                    <li><a href="faculty.jsp">Faculty</a></li>
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
         
        <br><Br><br>  
        <center>  <form name="myform" action="adminact.jsp" method="post">
        <table border="0" >
         <font color="white" size="5">Admin Login</font></h2> 
         <br><br>
         <tr><td><font color="white">User Name :</td><td><input type="text" name="username" required="" /></td></tr>
         <tr><td><font color="white">Password  :</td><td><input type="password" name="password" required="" /></td></tr>

         <tr rowspan="2" align="center"><td><br><input type="submit" name="submit" value="    Login    " /></td></tr>
         <tr></tr>      
         </table>
         </form>
         </center>	
        
        </div>
        <br><Br><br>  
        <div class="col_300 float_r">
        <h2>Sidebar Menu</h2>
              <li><a href="admin.jsp"  style="text-decoration:none"><font size="3">Admin</a></li>
              <li><a href="faculty.jsp"style="text-decoration:none">Faculty</a></li>
              <li><a href="student.jsp"style="text-decoration:none">Student</a></li>
              <li><a href="index.html"style="text-decoration:none">Contact</a></li>
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
