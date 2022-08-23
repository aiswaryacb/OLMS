<html>
<head><title>Message</title>
<link href="icon2.png" rel="icon" type="image/png"/>
<script src="JQ/jquery.validate.js" type="text/javascript"></script>
<script src="JQ/jquery.min.js" type="text/javascript"></script>       
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

header{
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}


</style>
</head>
<body style="background-color:WHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php" class="active"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>

 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
 <li style="float:right" class="active"><a href="#chnge_pw.php" class="active">Change Password</a></li>
</ul>

<!--<h1 style="text-align:center;color:red">Application Sent.</h1>-->
<br>
<br><br><br><br><br>
<!--<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>-->
<?php
session_start();
$hodid=$_SESSION['id'];
if($hodid==""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$resd= mysqli_query($con, "select * from hod_details where hod_id='$hodid';");
$rowd= mysqli_fetch_array($resd);
if($rowd[11]=='update'){
    $_SESSION['id']=$hodid;
    header('location:hod_updation.php');
}

$opw=htmlspecialchars($_POST["opw"]);
$npw=htmlspecialchars($_POST["npw"]);


$val= mysqli_query($con, "select * from hod_details where hod_id='$hodid';");
$val_row=mysqli_fetch_array($val);

$pw=$val_row[10];

if($opw==$pw)
{
    mysqli_query($con,"UPDATE `hod_details` SET `password` = '$npw' WHERE `hod_id` = '$hodid';");
    echo'<h1 style="text-align:center;color:red">Password Changed Successfully!!</h1>';    
}

else{
         echo'<h1 style="text-align:center;color:red">Sorry...Current Password Didnot Match </h1>';
         }
                 
                 //<br>
//<br><br><br><br><br>
    echo'<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>';
mysqli_close($con);
header("refresh:2;url=hod_home.php");
?>
</body>
</html>
