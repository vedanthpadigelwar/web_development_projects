<%@page import="java.sql.*"%>
<%@page import="databaseconnection.databasecon"%>
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
        
    <%@ page session="true" %>
            <%
                
ResultSet rs=null;
int a = 0;
long b = 0;
long avg= 0;
String aa = null;
String bb = null;

String roll = request.getParameter("name");

 try{
       
     Connection   con = databasecon.getconnection();
        Statement st=con.createStatement();
        rs=st.executeQuery("select *  from attendance where rollno = '"+roll+"' and att = 'Present'");
        
        while(rs.next()){
            
            
           
            a ++;
            
            
        }
                
        avg = a*100;
        
         b = avg/31;
       
         System.out.println("avggg" +b);
                
                
             

%>
         
        <br><Br><br>  
        <center>  
            
            <h1>Average Attendance is <font color="red"><%=b%>%</font></h1>
            
         </center>	
        
        </div>
        <br><Br><br>  
        <div class="col_300 float_r">
        <h2>Faculty Menu</h2>
              <li><a href="facultyhome.jsp"  style="text-decoration:none"><font size="3">Home</a></li>
              <li><a href="attendance.jsp"style="text-decoration:none">Attendance</a></li>
                <li><a href="favg.jsp"style="text-decoration:none">Average</a></li>
              <li><a href="logout.jsp"style="text-decoration:none">Logout</a></li>
         </div>
         </div> 
         </div>
         </div>
         </div> 
         </div> 
         <div id="footer">
         <br><br>
         Developed by <a href="http://1000projects.org/">1000 Projects</a> 

</body>
</html>
<%

}   catch(Exception e){
    e.printStackTrace();
    }

%>