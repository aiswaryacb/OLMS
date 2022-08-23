<?php
session_start();
$pid=$_SESSION['pid'];
if($pid=""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$desig=htmlspecialchars($_POST['designtn']);
$frmd=htmlspecialchars($_POST['acdmcyr_frm']);
$tod=htmlspecialchars($_POST['acdmcyr_to']);
$casual= htmlspecialchars($_POST['casual']);
$halfpay= htmlspecialchars($_POST['halfpay']);
mysqli_query($con,"UPDATE `leave_history` SET `ac_from_date` = '$frmd', `ac_to_date` = '$tod', `cas_total` = '$casual', `cas_taken` = '0', `cas_remaining` = '$casual', `half_total` = '$halfpay', `half_taken` = '0', `half_remaining` = '$halfpay' WHERE `leave_history`.`designation` = '$desig';");
mysqli_close($con);
header('location:principal_home.php');
?>