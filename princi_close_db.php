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
    
    $status= htmlspecialchars($_POST['status']);
    $sid= htmlspecialchars($_POST['staffid']);
    if($status=='closed'){
        mysqli_query($con,"update details set status='closed' where staff_id='$sid'; ");
        mysqli_query($con,"delete from leave_history where leave_history.staff_id='$sid';");
    }
    else{
        mysqli_query($con,"update details set status='current' where staff_id='$sid'; ");
    }
    mysqli_close($con);
    header('location:princi_close_request.php');
    ?>