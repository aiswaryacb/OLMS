<?php
session_start();
$_SESSION['sid']="";
?>
<html>
<head><title>Staff Login</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>
input[type=text], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: threedlightshadow;
}
input[type=password], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0.1;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    background-color: threedlightshadow;
    box-sizing: border-box;
}
body {
    margin: 0;
}

a:hover{
	background-color: green;
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
    background-color: darkorange;
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
    border: 1px solid black;
    margin-top: 100px;
    margin-bottom: 260px;
    margin-right: 80px;
    margin-left: 950px;
    opacity: 1;
  filter: alpha(opacity=60);
}

.button {
    background-color: navy;
    border: none;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
input[type=submit] {
    width: 50%;
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: darkblue;
}
</style>
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="index.php">Home</a></li>
</ul>

<div class="background">
    <div class="move">
    <h2 style="color:green"><b>&nbsp&nbsp&nbspStaff&nbspLogin</b></h2>
    <form action="staff_val.php" method="post">
        <p><label for = " Staff Id"><b>&nbsp&nbsp&nbsp&nbsp&nbspStaff&nbsp Id&nbsp&nbsp</b></label>
            <input type = "text" name = " StaffId" required/>
        <p><label for = " SPassword"><b>&nbsp&nbsp&nbsp&nbsp&nbspPassword</b></label>
            <input type = "password" name = " SPassword" required/>
        </br></br>&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" value="Login" />
    </form>
    <h2 style="color:red">&nbsp&nbspNew Staff?? <a href="Signup.php">Sign Up Here</a></h2>
</div>

<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</div>
</body>
</html>
