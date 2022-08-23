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

$sid= htmlspecialchars($_POST['sid']);
$status= htmlspecialchars($_POST['status']);
if($status=="approved"){
    mysqli_query($con,"UPDATE details SET status='hod approved' WHERE staff_id='$sid'; ");
}
else{
    mysqli_query($con,"UPDATE details SET status='denied' WHERE staff_id='$sid'; ");
}
echo'updating please waite';
mysqli_close($con);
header("location:hod_signup_requests.php");
?>
