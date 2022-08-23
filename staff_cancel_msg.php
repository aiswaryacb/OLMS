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
    <li><a href="staff_home.php"><img id="home" src="h2.png"></a></li>
    <li><a href="staff_leave_apply.php">Apply Leave</a></li>
    <li><a href="staff_leave_history.php">Leave History</a></li>
<!--    <li><a href="staff_leave_cancel.php">Cancel Leave</a></li>-->
    <li><a href="close.php">Close Account</a></li>
    <li style="float:right"><a href="staff_logout.php">Logout</a></li>
</ul>


<?php 
session_start();
$sid=$_SESSION['sid'];
if($sid==""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);

$appno= htmlspecialchars($_POST["appno"]);
$result= mysqli_query($con, "select * from leave_requests where app_no='$appno';");
$row=mysqli_fetch_array($result);
	$status= $row[11];
        $frmdate=$row[7];
        $todate=$row[8];
        $staffid=$row[1];
        $nod=$row[9];
        $fname=$row[2];
        $lname=$row[3];
        $dpt=$row[4];
        $des=$row[5];
        
        $reason=$row[10];
        $toodate=$row[12];
        $today=date('Y-m-d');
        
        
         $date3=date_create("$frmdate");
        $date4=date_create("$today");
        $difff=date_diff($date3,$date4);
        $nodd=$difff->format("%R%a days");
        $nodd+=1;
        
          $tomorrow = date("Y-m-d", strtotime("+1 day"));

          
          $date1=date_create("$tomorrow");
        $date2=date_create("$todate");
        $diff=date_diff($date1,$date2);
        $ddiff=$diff->format("%R%a days");
        $ddiff+=1;
        
        $tol= $row[6];
//$nod= htmlspecialchars($_POST["nod"]);
//$sid= htmlspecialchars($_POST["sid"]);
$res=mysqli_query($con,"select * from leave_history where leave_history.staff_id='$sid';");
$roww=mysqli_fetch_array($res);
$crem=$roww[7];
$ctak=$roww[6];
$hrem=$roww[10];
$htak=$roww[9];
$mrem=$roww[13];
$mtak=$roww[12];


if($staffid==$sid){        
if($todate<$today){
    echo'<script> alert("Leave already taken")</script>';
        header("refresh:0;url=Staff_home.php");
}
else if($frmdate<=$today&&$todate>$today){
 
mysqli_query($con," UPDATE leave_requests SET status = 'staffcancelled',from_date = '$tomorrow',no_of_days = '$ddiff' WHERE app_no = '$appno';");   
mysqli_query($con,"INSERT INTO `leave_requests` (`app_no`, `staff_id`, `fname`, `lname`, `department`, `designation`, `type_of_leave`, `from_date`, `to_date`, `no_of_days`, `remarks`, `status`, `apply_date`) VALUES (NULL, '$staffid', '$fname', '$lname', '$dpt', '$des', '$tol', '$frmdate', '$today', '$nodd', '$reason', 'approved', '$toodate');");
echo'<h1 style="text-align:center;color:red">Leave Cancel Application Sent.</h1>
<br>
<br><br><br><br><br>
<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>';
}
 else {
echo'<h1 style="text-align:center;color:red">Leave Cancel Application Sent.</h1>
<br>
<br><br><br><br><br>
<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>';
 if($status=="applied"){
    //mysqli_query($con," DELETE FROM leave_requests WHERE app_no = '$appno';");
     mysqli_query($con," UPDATE leave_requests SET status = 'cancelled' WHERE app_no = '$appno';");
    if($tol=="casual"){
        $ctak=$ctak-$nod;
        $crem=$crem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `cas_taken` = '$ctak', `cas_remaining` = '$crem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
    else if($tol=="Half Pay"){
        $htak=$htak-$nod;
        $hrem=$hrem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `half_taken` = '$htak', `half_remaining` = '$hrem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
    else if($tol=="Commuted"){
        $nod=2*$nod;
        $htak=$htak-$nod;
        $hcrem=$hcrem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `half_taken` = '$htak', `half_remaining` = '$hcrem' WHERE `leave_history`.`staff_id` = '$sid';");
        
    }
    else if($tol=="mat/pat"){
        $mtak=$mtak-$nod;
        $mrem=$mrem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `mat/pat_taken` = '$mtak', `mat/pat_remaining` = '$mrem' WHERE `leave_history`.`staff_id` = '$sid';");
    }

     
}
else if($status=="hod approved"){
   mysqli_query($con," UPDATE leave_requests SET status = 'cancelrequested' WHERE app_no = '$appno';");
}
else if($status=="staffcancelled" || $status=="cancelrequested" || $status=="hodcancelled" ){
   echo'<script> alert("Cancel request already sent!!")</script>';
}

else if($status=="cancelled"){
   echo'<script> alert("Leave already cancelled!!")</script>';
}
else {
   mysqli_query($con," UPDATE leave_requests SET status = 'staffcancelled' WHERE app_no = '$appno';");
}
}      
}
else{
    echo'<script> alert("Incorrect application number")</script>';
        header("refresh:0;url=staff_home.php");
}

     
    


mysqli_close($con);
header("refresh:2;url=staff_home.php");
?>
</body>
</html>
