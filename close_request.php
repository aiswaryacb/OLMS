<?php
session_start();
$sid=$_SESSION['sid'];
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($con, "UPDATE `details` SET `status` = 'close requested' WHERE `details`.`staff_id` = '$sid';");
mysqli_close($con);
echo 'done';
//header("refresh:2;url=staff_close.php");
header('location:staff_close.php');

?>