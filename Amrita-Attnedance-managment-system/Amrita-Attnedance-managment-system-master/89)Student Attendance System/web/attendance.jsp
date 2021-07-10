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
    <%
            if (request.getParameter("msg") != null) {%>
        <script>alert('Attendance Added Success');</script>
        <%}%> 
    
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#" class="selected">Faculty</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Contact</a></li>
               </ul>
        </div>
        </div>
        <div id="content_wrapper">
        <div id="content">
        <div class="panel" id="home">
        <div class="col_550 float_l">
        <div class="cleaner_h30"></div>
         
        <br><Br><br>  
        <center>  <form name="myform" action="attendance1.jsp" method="post">
        <table border="0" >
        <font color="white" size="5">Attendance</font></h2> 
        <br><br>
                                                  
        <tr><td><font color="white"> Year :</td>
        <td><select type="text" name="yr" style="width:170px;"  required="">
        <option>--Select--</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select></td></tr>
                
        <tr><td><font color="white"> Branch :</td>
        <td><select type="text" name="branch" style="width:170px;"  required="">
                <option value="">--Select--</option>
                <option value="EEE">EEE</option>
                <option value="CSE">CSE</option>
                <option value="Mechanical">Mechanical</option>
              
        </select></td></tr>
                
        <tr><td><font color="white"> Semester :</td>
        <td><select type="text" name="sem" style="width:170px;"  required="">
            <option value="">--Select--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
        </select></td></tr>
                
        <tr rowspan="2" align="center"><td><br><input type="submit" name="submit" value="    Submit    " /></td></tr>
         <tr></tr>      
         </table>
         </form>
         </center>	
        
        </div>
        <br><Br><br>  
        <div class="col_300 float_r">
        <h2>Faculty Menu</h2>
              <li><a href="facultyhome.jsp"  style="text-decoration:none"><font size="3">Home</a></li>
              <li><a href="attendance.jsp"style="text-decoration:none">Attendance</a></li>
                <li><a href="favg.jsp"style="text-decoration:none"> Average</a></li>
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
