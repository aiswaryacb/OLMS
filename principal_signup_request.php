<html>
<head><title>Signup Requests</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
}

#home {
    width: 30px;
    height: 19px;
    background: url(img_navsprites.gif) 0 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:MEDIUMSLATEBLUE ;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: darkorange;
}




header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
    margin-top: 15em;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th{
   text-align: left;
    padding: 8px;
    background-color: activecaption;
    color:indigo;
} 
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
div{
    margin-top: 1em;
}

</style>
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANANGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="principal_home.php"><img id="home" src="h2.png"></a></li>
    <li><a href="hod_attendance.php">HOD Attendance</a></li>
    <li style="float:right"><a href="princi_logout.php">Logout</a></li>
</ul>
<h1 style="text-align: center; color:midnightblue;">SignUp Requests</h1>
<div style="overflow-x:auto;">
  <table>
      <tr>
          <th></th>
          <th>Sl.No</th>
          <th>Name</th>
          <th>Staff ID</th>
          <th>Department</th>
          <th>Designation</th>
          <th>Contact</th>
          <th>Approve or Deny</th>
      </tr>
      
  </table>
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>

