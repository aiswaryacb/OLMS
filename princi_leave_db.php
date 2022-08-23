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

$appno= htmlspecialchars($_POST["appno"]);
$status= htmlspecialchars($_POST["status"]);
$tol= htmlspecialchars($_POST["tol"]);
$nod= htmlspecialchars($_POST["nod"]);
$sid= htmlspecialchars($_POST["sid"]);
$res=mysqli_query($con,"select * from leave_history where leave_history.staff_id='$sid';");
$row=mysqli_fetch_array($res);
$crem=$row[7];
$ctak=$row[6];
$hrem=$row[10];
$htak=$row[9];
$mrem=$row[13];
$mtak=$row[12];
//echo $crow.'<br>'.$hrem.'<br>'.$mrem.'<br>';
if($status=="Approve"){
    mysqli_query($con," UPDATE leave_requests SET status = 'approved' WHERE app_no = '$appno';");
}
   
else if($status=="Deny"){
    mysqli_query($con," UPDATE leave_requests SET status = 'denied' WHERE app_no = '$appno';");
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
        $hcrem=$hrem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `half_taken` = '$htak', `half_remaining` = '$hcrem' WHERE `leave_history`.`staff_id` = '$sid';");
        
    }
    else if($tol=="mat/pat"){
        $mtak=$mtak-$nod;
        $mrem=$mrem+$nod;
        mysqli_query($con,"UPDATE `leave_history` SET `mat/pat_taken` = '$mtak', `mat/pat_remaining` = '$mrem' WHERE `leave_history`.`staff_id` = '$sid';");
    }
}

mysqli_close($con);
echo'updating please wait...';
header("refresh:0;url=princi_leave_requests.php");
?>
