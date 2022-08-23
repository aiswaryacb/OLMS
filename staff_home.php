<html>
<head><title>Home</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
 background: url(bg4.jpg) no-repeat;
    
}



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:MEDIUMSLATEBLUE ;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: darkorange;
}

.active {
    background-color: darkorange;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
    margin-top: 24em;
}
header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}


div.seek{
   
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 100px;
}
.button {
    background-color: navy;
    border: none;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
div.background {
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    margin-left: 0px;
    border: 1px solid blue;
}
div.move {
    border: 1px black;
    margin-top: 40px;
    margin-bottom: 215px;
    margin-right: 80px;
    margin-left: 100px;
    opacity: 1;
  filter: alpha(opacity=60);
}
div.bodyin {
/*    background: url(bg4.jpg) no-repeat;*/
    border: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
}
.button1 {
    background-color: lightcoral; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 10px;
}
.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
table {
    border-collapse: collapse;
    width: 100%;
    
}

th{
   text-align: left;
    padding: 8px;
    background-color:background;
    color:indigo;
    opacity:0.9;
  
} 
td {
    text-align: left;
    padding: 8px;
    opacity: 0.9;
}

tr:nth-child(even){background-color: #f2f2f2}
/*tr:nth-child(odd){background-color: #f2f2f2}*/

#home {
    width: 30px;
    height: 19px;
    background: url(img_navsprites.gif) 0 0;
}

</style>
</head>
<body style="background-color:activeborder ;">
    <?php
session_start();
$sid=$_SESSION['sid'];
if($sid==""){
    header("location:index.php");
}
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
$details= mysqli_query($con,"select status from details where staff_id='$sid';");
$staffstatus=mysqli_fetch_array($details);
if($staffstatus=='requested'){
    header('location:signup_msg.php');
}
else if($staffstatus=='hod approved'){
    header('location:signup_msgh.php');
}
else if($staffstatus=='close requested'){
    header('location:staff_close.php');
}
else if($staffstatus=='hod closed'){
    header('location:staff_close.php');
}
else if($staffstatus=='closed'){
    echo'<script> alert("Your account has been closed")</script>';
            header("refresh:0;url=Staff_login.php");  
}
$res= mysqli_query($con, "select * from details where staff_id='$sid';");
$row=mysqli_fetch_array($res);
$fname=$row[1];
$lname=$row[2];             
 ?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<div class="bodyin">
<ul>
    <li><a href="#staff_home.php" class="active"><img id="home" src="h2.png"></a></li>
    <li><a href="staff_leave_apply.php">Leave Apply</a></li>
    <li><a href="staff_leave_history.php">Leave History</a></li>
    <li><a href="close.php">Close account</a></li>
   
    <li style="float:right"><a href="staff_logout.php">Logout</a></li>
     <li style="float:right"><a href="chnge_pw.php">Change Password</a></li>
</ul>
<!--<div class="bodyin">-->
<h1 style="color:red; text-align:center;">Welcome<?php echo " ".$fname." ".$lname; ?></h1>
<table>
    <tr>
        
        <td>
            <?php
            $today=date('Y-m-d');
            $lr= mysqli_query($con,"select * from leave_requests where staff_id='$sid' AND to_date >= '$today';");
            if($row=mysqli_fetch_array($lr)){  
            echo'<h1 style="text-align: center;color:darkblue; ">Leaves Applied</h1>
            <table>
                <tr>
                    <th>Application Number</th>
                    <th>Type of Leave</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    
                </tr>';
                echo'<tr>
                        <td>'.$row[0].'</td>
                        <td>'.$row[6].'</td>
                        <td>'.$row[7].'</td>
                        <td>'.$row[8].'</td>
                        <td>'.$row[11].'</td>
                    </tr>';
                
                    while($row=mysqli_fetch_array($lr)){
                        echo'<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[6].'</td>
                                <td>'.$row[7].'</td>
                                <td>'.$row[8].'</td>
                                <td>'.$row[11].'</td>
                            </tr>'; 
                    }
              echo'<tr>
                <a href="staff_leave_cancel.php" class="button1">Cancel Leave</a><br><br>
                 </tr>';   
                
            }
            
            else{
                echo'<h1 style="text-align: center;color:darkblue; ">You have no Pending Leaves</h1>';
            }
            mysqli_close($con);
            ?>
            
      </td>
        
    </tr>
    
</table>

</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>

