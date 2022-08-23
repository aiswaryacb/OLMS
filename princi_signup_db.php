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
$sid= htmlspecialchars($_POST['sid']);
$status= htmlspecialchars($_POST['status']);
$gen= htmlspecialchars($_POST["gen"]);
$desig= htmlspecialchars($_POST["desig"]);
$tod= htmlspecialchars($_POST["tod"]);
$frmd= htmlspecialchars($_POST["frmd"]);
if($status=="approved"){
    mysqli_query($con,"UPDATE `details` SET `status` = 'current' WHERE `details`.`staff_id` = '$sid'; ");
    
    if($gen=="f"){
        mysqli_query($con,"INSERT INTO `leave_history` (`staff_id`, `gender`, `designation`, `ac_from_date`, `ac_to_date`, `cas_total`, `cas_taken`, `cas_remaining`, `half_total`, `half_taken`, `half_remaining`, `mat/pat_total`, `mat/pat_taken`, `mat/pat_remaining`) VALUES ('$sid', 'f', '$desig', '$frmd', '$tod', '15', '0', '15', '20', '0', '20', '360', '0', '360');");
    }
    else{
        mysqli_query($con,"INSERT INTO `leave_history` (`staff_id`, `gender`, `designation`, `ac_from_date`, `ac_to_date`, `cas_total`, `cas_taken`, `cas_remaining`, `half_total`, `half_taken`, `half_remaining`, `mat/pat_total`, `mat/pat_taken`, `mat/pat_remaining`) VALUES ('$sid', 'm', '$desig', '$frmd', '$tod', '15', '0', '15', '20', '0', '20', '20', '0', '20');");
    }
    
}
else{
    mysqli_query($con,"UPDATE details SET status='denied' WHERE staff_id='$sid'; ");
}
echo'updating please waite';
mysqli_close($con);
$_SESSION['pid']=$pid;
header("refresh:0;url=princi_signup_requests.php");
?>
