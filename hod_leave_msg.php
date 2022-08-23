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
    <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
    <li><a href="hod_leave_apply.php">Apply Leave</a></li>
    
    <li><a href="hod_leave_history.php">Leave History</a></li>
    <li><a href="update.php">Update Details</a></li>
    <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
    <li><a href="hod_staff_list.php">Staff List</a></li>
    <li style="float:right"><a href="hod_logout.php">Logout</a></li>
</ul>

<h1 style="text-align:center;color:red">Application Sent.</h1>
<br>
<br><br><br><br><br>
<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>
<?php 
session_start();
$sid=$_SESSION['id'];
if($sid==""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$resd= mysqli_query($con, "select * from hod_details where hod_id='$sid';");
$rowd= mysqli_fetch_array($resd);
if($rowd[11]=='update'){
    $_SESSION['id']=$hodid;
    header('location:hod_updation.php');
}

$tol=htmlspecialchars($_POST["tol"]);
$frmd=htmlspecialchars($_POST["frm"]);
$tod=htmlspecialchars($_POST["to"]);
$reason=htmlspecialchars($_POST["reason"]);
//$nod= htmlspecialchars($_POST["no_of_days"]);
$res=mysqli_query($con,"select * from hod_details where hod_id='$sid';");
$row=mysqli_fetch_array($res);
$fname=$row[1];
$lname=$row[2];
$dpt=$row[6];
$des=$row[5];
$date=date('Y-m-d');
 $date1=date_create("$frmd");
        $date2=date_create("$tod");
        $diff=date_diff($date1,$date2);
        $ddiff=$diff->format("%R%a days");
        $ddiff+=1;
        $nod=$ddiff;

$val= mysqli_query($con, "select * from leave_history where staff_id='$sid';");
$val_row=mysqli_fetch_array($val);
if($tol=="casual"){
    $bal=$val_row[7];
}
else if($tol=="Half Pay"){
    $bal=$val_row[10];
}
else if($tol==="Commuted"){
    $bal=$val_row[10];
}
else{
    $bal=$val_row[13];
}
$bal=$bal-$nod;
if($bal<0){
  echo'<script> alert("No sufficient leave remaining in this type!!")</script>';
  mysqli_close($con);
  header("refresh:0;url=staff_leave_apply.php");   
}
else{
    $dat=mysqli_query($con,"select count(*) from leave_requests where (to_date='$tod' or to_date='$frmd' or from_date='$tod' or from_date='$frmd') and staff_id='$sid' and (status!='denied' and status!='cancelled');");
    $datv= mysqli_fetch_array($dat);
    $inbtwn=mysqli_query($con,"select * from leave_requests where staff_id='$sid' and (status!='denied' and status!='cancelled');");
    $inbtwnv= mysqli_fetch_array($inbtwn);
    $count=0;
    while($inbtwnv){
        if($inbtwnv[7]<$tod && $inbtwnv[8]>$tod){
            $count++;
        }
        else if($inbtwnv[7]<$frmd && $inbtwnv[8]>$frmd){
            $count++;
        }
        $inbtwnv=mysqli_fetch_array($inbtwn);
    }
//    $inbtwn1=mysqli_query($con,"select count(*) from leave_requests where staff_id='$sid' and status!='denied' and to_date between '$tod' and '$frmd';");
//    $inbtwnu=mysqli_fetch_array($inbtwn1);
    $accademic=mysqli_query($con,"select ac_from_date, ac_to_date from leave_history where staff_id='$sid';");
    $row=mysqli_fetch_array($accademic);
    if($datv[0]>0 || $count>0){
      echo'<script> alert("You have already applied a leave on this date!!")</script>';
      mysqli_close($con);
      header("refresh:0;url=hod_leave_apply.php");  
    }
    else if($frmd<$row[0] || $frmd>$row[1] || $tod<$row[0] || $tod>$row[1]){
    echo'<script> alert("You can apply leave for the current accademic year only!!")</script>';
    mysqli_close($con);
    header("refresh:0;url=staff_leave_apply.php"); 
    }
    else{
        mysqli_query($con,"INSERT INTO `leave_requests` (`app_no`, `staff_id`, `fname`, `lname`, `department`, `designation`, `type_of_leave`, `from_date`, `to_date`, `no_of_days`, `remarks`, `status`, `apply_date`) VALUES (NULL, '$sid', '$fname', '$lname', '$dpt', '$des', '$tol', '$frmd', '$tod', '$nod', '$reason', 'hod approved', '$date');");
        $res=mysqli_query($con,"select * from leave_history where leave_history.staff_id='$sid';");
$row=mysqli_fetch_array($res);
$crem=$row[7];
$ctak=$row[6];
$hrem=$row[10];
$htak=$row[9];
$mrem=$row[13];
$mtak=$row[12];
if($tol=="casual"){
        $ctak=$ctak+$nod;
        $crem=$crem-$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `cas_taken` = '$ctak', `cas_remaining` = '$crem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
    else if($tol=="Half Pay"){
        $htak=$htak+$nod;
        $hrem=$hrem-$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `half_taken` = '$htak', `half_remaining` = '$hrem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
    else if($tol=="Commuted"){
        $nod=2*$nod;
        $htak=$htak+$nod;
        $hcrem=$hrem-$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `half_taken` = '$htak', `half_remaining` = '$hcrem' WHERE `leave_history`.`staff_id` = '$sid';");
        
    }
    else if($tol=="mat/pat"){
        $mtak=$mtak+$nod;
        $mrem=$mrem-$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `mat/pat_taken` = '$mtak', `mat/pat_remaining` = '$mrem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
        mysqli_close($con);
        header("refresh:2;url=hod_home.php");
    }
}
?>
</body>
</html>
