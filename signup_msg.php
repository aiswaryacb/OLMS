<?php
session_start();
$sid=$_SESSION['sid'];
if($sid==''){
 header("refresh:5;url=Staff_login.php");   
}
?>
<html>
<head><title>Message</title>
<link href="icon2.png" rel="icon" type="image/png"/>
<script src="JQ/jquery.validate.js" type="text/javascript"></script>
<script src="JQ/jquery.min.js" type="text/javascript"></script>

</head>
<style>
.error{color: red;}
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




header, footer {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
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


<h2 style="text-align:center;color:green">Sign up request has been send for approval.<br></h2>

<br>
<br><br><br><br><br>
<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>
</body>
</html>
<?php

header("refresh:5;url=Staff_login.php");
?>
