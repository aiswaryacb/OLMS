<?php
session_start();
//if(isset(htmlspecialchars($_POST['submit'])))
//{
 $dbhost="localhost:3306";
 $dbuser="root";
 $dbpass="";
 $db="olms";
 $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
 $pid=htmlspecialchars($_POST['PrincipalId']);
 $pwd=htmlspecialchars($_POST['PPassword']);
 if($pid!=''&&$pwd!='')
 {
   //$query=mysql_query("select * from hod_details where hod_id='$hodid' and password='$pwd';") or die(mysql_error());
   $res= mysqli_query($con, "select * from principal_details where principal_id='$pid' and password='$pwd';");
   $row= mysqli_fetch_array($res);
   if($res)
   {
      if($row[8]==$pwd){ 
        $_SESSION['pid']=$pid;
        header('location:principal_home.php');
        }
      else
        {
        echo'<script> alert("Incorrect password or Principal id")</script>';
        header("refresh:0;url=Principal_login.php");
        }
   }
   else
    {
    echo'<script> alert("Incorrect password or principal id")</script>';
    header("refresh:0;url=Principal_login.php");
    }
 }
?>