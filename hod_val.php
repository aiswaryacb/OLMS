<?php
session_start();
//if(isset(htmlspecialchars($_POST['submit'])))
//{
 $dbhost="localhost:3306";
 $dbuser="root";
 $dbpass="";
 $db="olms";
 $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
 $hodid=htmlspecialchars($_POST['hodid']);
 $pwd=htmlspecialchars($_POST['HPassword']);
 if($hodid!=''&&$pwd!='')
 {
   //$query=mysql_query("select * from hod_details where hod_id='$hodid' and password='$pwd';") or die(mysql_error());
   $res= mysqli_query($con, "select * from hod_details where hod_id='$hodid' AND password='$pwd';");
   $row= mysqli_fetch_array($res);
   if($res)
   {
        if($row[10]==$pwd){
            if($row[11]=='current'){
                $_SESSION['id']=$hodid;
                header('location:hod_home.php');
                }
            else if($row[11]=='update'){
                $_SESSION['id']=$hodid;
                header('location:hod_updation.php');
            }
            else{
                $_SESSION['id']=$hodid;
                header('location:hod_updation.php');
                }
        }
        else
        {
        echo'<script> alert("Incorrect password or hod id")</script>';
        header("refresh:0;url=Hod_login.php");
        }
    }
    else
    {
        echo'<script> alert("Incorrect password or hod id")</script>';
        header("refresh:0;url=Hod_login.php");
    }
 }
 mysqli_close($con);
?>