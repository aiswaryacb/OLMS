<?php
session_start();
$_SESSION['pid']=$_SESSION['sid']=$_SESSION['id']="";
?>
<html>
<head><title>OLMS</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
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

.active {
    background-color:darkorange ;
}

footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}

div.background {
  background: url(emp.jpg) no-repeat;
  border: 1px solid black;
}

div.move {
    border: 1px black;
    margin-top: 100px;
    margin-bottom: 140px;
    margin-right: 80px;
    margin-left: 950px;
    opacity: 1;
  filter: alpha(opacity=60);
}
div a:hover {
    background-color: darkorange;
}


.button {
    background-color: green;
    border: none;
    color: white;
    padding: 15px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
.button2 {
    background-color: green;
    border: none;
    color: white;
    padding: 15px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
.button3 {
    background-color: green;
    border: none;
    color: white;
    padding: 15px 45px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
</style>
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a class="active" href="#home">Home</a></li>
</ul>

<div class="background">
<div class="move">

<a href="Staff_login.php" class="button2"> Staff&nbspLogin</a><br/>

<a href="HOD_login.php" class="button2"> HOD&nbspLogin</a><br/>

<a href="Principal_login.php" class="button"> Principal&nbspLogin</a><br/>


</div>
</div>

<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
