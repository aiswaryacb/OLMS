<html>
<head><title>Message</title>
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
    <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 
 
 
 
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
</ul>

<h1 style="text-align:center;color:red">Update request Sent.</h1>
<?php 
session_start();
    $id=$_SESSION['id'];
    if($id==""){
        header("location:index.php");
    }
   
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$fname = htmlspecialchars($_POST['fname']);
$lname=htmlspecialchars($_POST['lname']);
$dob=htmlspecialchars($_POST["dob"]);
//$day= htmlspecialchars($_POST['DOBDay']);
//$month= htmlspecialchars($_POST['DOBMonth']);
//$year= htmlspecialchars($_POST['DOBYear']);
//$dob=$year.'-'.$month.'-'.$day;
$gen=htmlspecialchars($_POST["gender"]);
//$sid=htmlspecialchars($_POST["sid"]);
//$desig=htmlspecialchars($_POST["designation"]);
//$dpt=htmlspecialchars($_POST["dept"]);
$mail=htmlspecialchars($_POST["mailid"]);
$add=htmlspecialchars($_POST["address"]);
$phn=htmlspecialchars($_POST["phno"]);
$pw= htmlspecialchars($_POST["pw"]);
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$res=mysqli_query($con,"select * from hod_details where hod_id='$id';");
$row=mysqli_fetch_array($res);
$sid=$row[0];
$desig=$row[5];
$dpt=$row[6];
$res2=mysqli_query($con,"select * from hod_details where `email`='$mail';");
$res3=mysqli_query($con,"select * from hod_details where `ph_no`='$phn';");
$res4=mysqli_query($con,"select * from details where `e-mail`='$mail';");
$res5=mysqli_query($con,"select * from details where `ph_no`='$phn';");
$res6=mysqli_query($con,"select * from principal_details where `email`='$mail';");
$res7=mysqli_query($con,"select * from principal_details where `ph_no`='$phn';");
if(mysqli_num_rows($res2)>0 || mysqli_num_rows($res4)>0 || mysqli_num_rows($res6)>0 ){
    echo'<script> alert("E-mail Id already exists")</script>';
    mysqli_close($con);
    header("refresh:0;url=update.php");
}
else if(mysqli_num_rows($res3)>0 || mysqli_num_rows($res5)>0 || mysqli_num_rows($res7)>0){
    echo'<script> alert("Phone number already exists")</script>';
    mysqli_close($con);
    header("refresh:0;url=update.php");
}
else{
mysqli_query($con, "INSERT INTO `update_requests` (`hod_id`, `fname`, `lname`, `dob`, `gender`, `designation`, `department`, `email`, `address`, `ph_no`, `password`, `status`) VALUES ('$sid', '$fname', '$lname', '$dob', '$gen', '$desig', '$dpt', '$mail', '$add', '$phn', '$pw', 'requested');");
mysqli_query($con,"UPDATE `hod_details` SET `status` = 'update' WHERE `hod_details`.`hod_id` = '$sid';");
mysqli_close($con);
header("refresh:2;url=hod_updation.php");
}
?>
</body>
</html>
