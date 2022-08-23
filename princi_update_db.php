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
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$hodid= htmlspecialchars($_POST['hodid']);
$status= htmlspecialchars($_POST['status']);
$res= mysqli_query($con, "select * from update_requests where hod_id='$hodid';");
$row= mysqli_fetch_array($res);
$fname=$row[1];
$lname=$row[2];
$address=$row[8];
$phn=$row[9];
$email=$row[7];
$dob=$row[3];
$gen=$row[4];
$pw=$row[10];
if($status=='current'){
mysqli_query($con,"UPDATE `hod_details` SET `fname` = '$fname', `lname` = '$lname', `dob` = '$dob', `gender` = '$gen', `email` = '$email', `address` = '$address', `ph_no` = '$phn', `password` = '$pw', `status` = '$status' WHERE `hod_details`.`hod_id` = '$hodid'; ");

}
else{
    mysqli_query($con,"UPDATE `hod_details` SET `status` = 'current' WHERE `hod_details`.`hod_id` = '$hodid';");
    
}
mysqli_query($con,"DELETE FROM `update_requests` WHERE `update_requests`.`hod_id` = '$hodid'");
mysqli_close($con);
header('location:princi_update_request.php');
?>

