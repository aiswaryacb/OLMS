
<html>
<head><title>Home</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
    background: url(bg2.jpg) no-repeat;
}
.active {
    background-color: darkorange;
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
    margin-top: 25em;
}
.button1 {
    background-color: lightcoral; /* Green */
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
}
.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.botton2{
    background-color: lightcoral; /* Green */
    border: none;
    color: white;
    padding: 0px 0px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 10px;
}
.button2:hover{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
sup{
  
    color: red;
}
</style>
</head>
<body style="background-color:FLORALWHITE;">
    <?php
session_start();
$pid=$_SESSION['pid'];
if($pid==""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$res= mysqli_query($con, "select * from principal_details where principal_id='$pid';");
$row=mysqli_fetch_array($res);
	$fname= $row[1];
        $lname=$row[2];
$lr=mysqli_query($con,"select count(*) from leave_requests where status='hod approved';");
$lrn=mysqli_fetch_array($lr);
$nlr=$lrn[0];
//if($nlr==0){
//  $nlr=""; 
//}
$sr=mysqli_query($con,"select count(*) from details where status='hod approved';");
$srn=mysqli_fetch_array($sr);
$nsr=$srn[0];
//if($nsr==0){
//    $nsr="";
//}
$ur=mysqli_query($con,"select count(*) from update_requests where status='requested';");
$urn=mysqli_fetch_array($ur);
$nur=$urn[0];
//if($nur==0){
//    $nur="";
//}
$cr=mysqli_query($con,"select count(*) from details where status='hod closed';");
$crn=mysqli_fetch_array($cr);
$ncr=$crn[0];
//if($ncr==0){
//    $ncr="";
//}
$lcr=mysqli_query($con,"select count(*) from leave_requests where status='hodcancelled';");
$lcrn=mysqli_fetch_array($lcr);
$nlcr=$lcrn[0];
//if($nlcr==0){
//    $nlcr="";
//}
mysqli_close($con);       
//echo $nlr.' '.$nsr.' '.$nur.' '.$ncr.' '.$nlcr;
?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="#principal_home.php" class="active"><img id="home" src="h2.png"></a></li>
    
    <li><a href="princi_add_leave.php">Add Leave</a></li>
    <li><a href="princi_staff_on_leave.php">Staffs On Leave</a></li>
    <li><a href="princi_dept_list.php">Department List</a></li>
    <li style="float:right"><a href="princi_logout.php">Logout</a></li>
    <li style="float:right"><a href="princi_chnge_pw.php" >Change Password</a></li>
</ul>

<h1 style="text-align:center;color:red">Welcome<?php echo " ".$fname." ".$lname; ?></h1>
<h2 style="text-align:center;color:green">Principal,College Of Engineering Kottayam</h2>
<a href="princi_leave_requests.php" class="button1">Leave Requests&nbsp;&nbsp;<sup>(<?php echo $nlr; ?>)</sup></a><br><br>
<a href="princi_signup_requests.php" class="button1">SignUp Requests&nbsp;<sup>(<?php echo $nsr; ?>)</sup></a><br><br>
<a href="princi_update_request.php"class="button1">Update Requests&nbsp;<sup>(<?php echo $nur; ?>)</sup></a><br><br>
<a href="princi_close_request.php" class="button1">Close Requests&nbsp;&nbsp;<sup>(<?php echo $ncr; ?>)</sup></a><br><br>
<a href="princi_cancel_requests.php" class="button1">Cancel Requests&nbsp;<sup>(<?php echo $nlcr; ?>)</sup></a><br><br>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
