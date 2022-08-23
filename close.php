<?php
session_start();
$hodid=$_SESSION['sid'];
if($hodid==""){
    header("location:index.php");
}
?>
<html>
<head><title>Message</title>
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




header{
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
}
#home {
    width: 30px;
    height: 19px;
    background: url(img_navsprites.gif) 0 0;
}
.button1 {
    background-color: green; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 10px;
	align:center;
}
.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

div.seek{
    border: solid 1px black;
    margin-top: 50px;
    margin-bottom: 100px;
    margin-right: 350px;
    margin-left: 350px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 20px;
        padding-right: 20px;
        background-color: buttonhighlight;
		}

</style>
</head>
<body style="background-color:FLORALWHITE;">
<header><h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="staff_home.php"><img id="home" src="h2.png"></a></li>
    <li><a href="staff_leave_apply.php">Apply Leave</a></li>
    <li><a href="staff_leave_history.php">Leave History</a></li>
    <li style="background-color: darkorange"><a href="#close.php">Close Account</a></li>
    <li style="float:right"><a href="staff_logout.php">Logout</a></li>
    <li style="float:right"><a href="chnge_pw.php">Change Password</a></li>
</ul>


<div class="seek">
    <h1 style="text-align:center;color:green;font-size: 200%">CLOSE ACCOUNT</h1>
    <h2 style="text-align:center;"><i>Closing your account will permenantly delete all your details from the system.</i></h2>
	<h1 style="color:red" align="center"><b>Are You Sure ?</b></h1> 
     
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="close_request.php" class="button1">Yes</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="staff_home.php" class="button1">No&nbsp</a>
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
