<?php
session_start();
//if(isset(htmlspecialchars($_POST['submit'])))
//{
 $dbhost="localhost:3306";
 $dbuser="root";
 $dbpass="";
 $db="olms";
 $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
 $sid=htmlspecialchars($_POST['StaffId']);
 $pwd=htmlspecialchars($_POST['SPassword']);
 if($sid!=''&&$pwd!='')
 {
   //$query=mysql_query("select * from hod_details where hod_id='$hodid' and password='$pwd';") or die(mysql_error());
   $res= mysqli_query($con, "select * from details where staff_id='$sid' and password='$pwd';");
   $row= mysqli_fetch_array($res);
   if($res)
   {
        if($row[10]==$pwd){
            if($row[11]=='current'){
            $_SESSION['sid']=$sid;
            header('location:staff_home.php');
            }
            else if($row[11]=='requested'){
            $_SESSION['sid']=$sid;
            header('location:signup_msg.php');
            }
            else if($row[11]=='hod approved'){
            $_SESSION['sid']=$sid;
            header('location:signup_msgh.php');
            }
            elseif ($row[11]=='close requested') {
            $_SESSION['sid']=$sid;
            header('location:staff_close.php');
            }
            elseif ($row[11]=='hod closed') {
            $_SESSION['sid']=$sid;
            header('location:staff_close.php');
            }
            else{
            echo'<script> alert("Your account has been closed")</script>';
            header("refresh:0;url=Staff_login.php");    
            }
            
        }
        else
        {
         echo'<script> alert("Incorrect password or staffid")</script>';
        header("refresh:0;url=Staff_login.php");
        
        }
   }
 }
 else
 {
  echo'<script> alert("Invalid staff id!!!")</script>';
  header("refresh:0;url=Staff_login.php");
  
 }
mysqli_close($con);
?>