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
    $resd= mysqli_query($con, "select * from hod_details where hod_id='$hodid' AND password='$pwd';");
    $rowd= mysqli_fetch_array($resd);
    if($rowd[11]=='update'){
    $_SESSION['id']=$hodid;
    header('location:hod_updation.php');
    }
    $status= htmlspecialchars($_POST['status']);
    $sid= htmlspecialchars($_POST['staffid']);
    if($status=='close'){
        mysqli_query($con,"update details set status='hod closed' where staff_id='$sid'; ");
    }
    else{
        mysqli_query($con,"update details set status='current' where staff_id='$sid'; ");
    }
    mysqli_close($con);
    header('location:hod_close_request.php');
    ?>