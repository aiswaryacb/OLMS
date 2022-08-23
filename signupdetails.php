<?php 
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$fname = htmlspecialchars($_POST['fname']);
$lname=htmlspecialchars($_POST['lname']);
$dob=htmlspecialchars($_POST["dob"]);
//$day= htmlspecialchars($_POST['DOBDay']);
//$month= htmlspecialchars($_POST['DOBMonth']);
//$year= htmlspecialchars($_POST['DOBYear']);
//$dob=$year.'-'.$month.'-'.$day;
//if((int)$month==02){
////    $n=4;
////    if(intval($year)%intval($n)==0){
////        if(intval($day)>29){
////            echo'<script> alert("Invalid date")</script>';
////            header("refresh:0;url=Signup.php");
////        }
////    }
////    else{
//          if((int)$day>28){
//            echo'<script> alert("Invalid date")</script>';
//            header("refresh:0;url=Signup.php");
//        }
////    }
//}
////$dod=date_create($dobstr);
////echo $dob;
$gen=htmlspecialchars($_POST["gender"]);
//$sid=htmlspecialchars($_POST["sid"]);
$desig=htmlspecialchars($_POST["designation"]);
$dpt=htmlspecialchars($_POST["dept"]);
$mail=htmlspecialchars($_POST["mailid"]);
$add=htmlspecialchars($_POST["address"]);
$phn=htmlspecialchars($_POST["phno"]);
$pw= htmlspecialchars($_POST["pw"]);
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$res1=mysqli_query($con,"select max(sl_no) from details;");
$maxid=mysqli_fetch_array($res1);
$newid=$maxid[0]+1;
if($dpt=="Computer Science"){
    $sid='scs'.$newid;
}
else if($dpt=="Civil"){
    $sid='sce'.$newid;
}
else if($dpt=="Electronics and Communication"){
    $sid='sec'.$newid;
}
else if($dpt=="Electrical and Electronics"){
    $sid='see'.$newid;
}
else if($dpt=="Electronics and Instrumentation"){
    $sid='sei'.$newid;
}
else if($dpt=="Information Technology"){
    $sid='sit'.$newid;
}


//mysqli_query($con,"INSERT INTO 'details'('staff_id','fname','lname','dob','gender','designation','department','email','address','ph_no','password') VALUES ('$sid','$fname','$lname','$dob','$gen','$desig','$dpt','$mail','$add','$phn','$pw');");
//$sql="INSERT INTO 'details'('staff_id','fname','lname','dob','gender','designation','department','email','address','ph_no','password') VALUES ('$sid','$fname','$lname','$dob','$gen','$desig','$dpt','$mail','$add','$phn','$pw')";
//echo $sid;
//$query="INSERT INTO 'details'('staff_id','fname','lname','dob','gender','designation','department','email','address','ph_no','password') VALUES ('$sid','$fname','$lname','$dob','$gen','$desig','$dpt','$mail','$add','$phn','$pw');";

$res2=mysqli_query($con,"select * from details where `e-mail`='$mail';");
$res3=mysqli_query($con,"select * from details where `ph_no`='$phn';");
$res4=mysqli_query($con,"select * from hod_details where `email`='$mail';");
$res5=mysqli_query($con,"select * from hod_details where `ph_no`='$phn';");
$res6=mysqli_query($con,"select * from principal_details where `email`='$mail';");
$res7=mysqli_query($con,"select * from principal_details where `ph_no`='$phn';");
//if(mysqli_num_rows($res1)>0){
//    echo'<script> alert("Staff Id already exists")</script>';
//    mysqli_close($con);
//    header("refresh:0;url=Signup.php");
//}
if(mysqli_num_rows($res2)>0 || mysqli_num_rows($res4)>0 || mysqli_num_rows($res6)>0 ){
    echo'<script> alert("E-mail Id already exists")</script>';
    mysqli_close($con);
    header("refresh:0;url=Signup.php");
}
else if(mysqli_num_rows($res3)>0 || mysqli_num_rows($res5)>0 || mysqli_num_rows($res7)>0){
    echo'<script> alert("Phone number already exists")</script>';
    mysqli_close($con);
    header("refresh:0;url=Signup.php");
}
else{
mysqli_query($con, "INSERT INTO `details` (`staff_id`, `fname`, `lname`, `dob`, `gender`, `designation`, `department`, `e-mail`, `address`, `ph_no`, `password`, `status`) VALUES ('$sid', '$fname', '$lname', '$dob', '$gen', '$desig', '$dpt', '$mail', '$add', '$phn', '$pw', 'requested');");
mysqli_close($con);
//header("refresh:2;url=signup_msg.php");
session_start();
$_SESSION['pass']=$sid;
//header("refresh:3;url=Signup_msg.php");
header('location:signup_msgnew.php');
}
?>