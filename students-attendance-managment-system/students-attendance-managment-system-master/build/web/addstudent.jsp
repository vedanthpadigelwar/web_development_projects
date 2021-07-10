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
        <script>alert('Student Added Successfully');</script>
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
                    <li><a href="#" >Home</a></li>
                    <li><a href="#"class="selected">Admin</a></li>
                    <li><a href="#">Faculty</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Contact</a></li>
               </ul>
        </div>
        </div>
        <div id="content_wrapper">
        <div id="content">
        <div class="panel" id="home">
        <div class="col_550 float_l">
            <br>
         <center>  <form name="myform" action="addstudentact.jsp" method="post">
         <table border="0" >
             <font color="white" size="5">Add Student</font></h2> 
         <br><br>       
         <tr><td><font color="white"> Student Name :</td><td><input type="text" name="sname" required="" /></td></tr>
         <tr><td><font color="white"> Student Roll No:</td><td><input type="text" name="sid" required="" /></td></tr>
         <tr><td><font color="white">Password :</td><td><input type="password" name="password" required="" /></td></tr>
         <tr><td><font color="white"> E-Mail :</td><td><input type="text" name="email" required="" /></td></tr>
         
         <tr><td><font color="white"> Year :</td>
         <td><select type="text" name="yr" style="width:170px;"  required="">
             <option>--Select--</option>
                <option>--Select--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select></td></tr>
         <tr><td><font color="white"> Branch :</td>
         <td><select type="text" name="branch" style="width:170px;"  required="">
             <option>--Select--</option>
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
         
         <tr><td><font color="white"> D.O.B :</td><td><input type="date" name="date" style="width:165px;" required="" /></td></tr>
         <tr><td><font color="white"> Mobile :</td><td><input type="text" name="mobile" required="" /></td></tr>
         
         <tr rowspan="2" align="center"><td><br><input type="submit" name="submit" value="    Add    " /></td></tr>
         <tr></tr>      
         </table>
         </form>
         </center>	
         </div>
        <br>
        <div class="col_300 float_r">
        <h2>Admin Menu</h2>
              <li><a href="adminhome.jsp"  style="text-decoration:none"><font size="3">Home</a></li>
              <li><a href="addfaculty.jsp"style="text-decoration:none">Add Faculty</a></li>
              <li><a href="addstudent.jsp"style="text-decoration:none">Add Student</a></li>
              <li><a href="addsubjects.jsp"style="text-decoration:none">Add Subjects</a></li>
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
