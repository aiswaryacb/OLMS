<html>
<head><title>Leave Requests</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
    
}
div.background {
  background-image: url("bg2.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0px;
}

#home {
    width: 30px;
    height: 19px;
    background: url(img_navsprites.gif) 0 0;
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




header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
    margin-top: 25em;
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
    opacity:0.5;
  
} 
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

ol {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}
button {
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
div.outer{
    border: 1px solid black;
}
div.move {
    border: 1px black;
    margin-bottom: 140px;
    margin-right: 80px;
    margin-left: 950px;
    opacity: 1;
  filter: alpha(opacity=60);
}
.active {
    background-color: darkorange;
}
input[type=submit] {
    width: 25%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
</head>
<body style="background-color:FLORALWHITE;">
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
$res= mysqli_query($con, "select * from hod_details where hod_id='$hodid';");
$row=mysqli_fetch_array($res);
	$fname= $row[1];
        $lname=$row[2];
        $dpt=$row[6];
?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>
 
 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
</ul>
    <h2 style="color: red;">LEAVE CANCEL REQUESTS</h2>     
<table>
    <tr>
    
        <td>
            
            <?php
            $lr= mysqli_query($con,"select * from leave_requests where department='$dpt' AND staff_id!='$hodid' AND status='staffcancelled' OR status='cancelrequested'");
            
            if($row=mysqli_fetch_array($lr)){  
                     
                      
                echo'
                    
                <h1 style="text-align: center;color:darkblue; ">Cancel Leave Applications</h1>
                
            
                <table>
                <tr>
                    <td>Application Number</td>
                    <td>'.$row[0].'</td>
                </tr>
              <tr>
                    <td>Applied Date</td>
                    <td>'.$row[12].'</td>
                </tr>
                
                <tr>
                    <td>Staff ID</td>
                    <td>'.$row[1].'</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>'.$row[2].' '.$row[3].'</td>
                </tr>
                <tr>
                    <td>Type of Leave</td>
                    <td>'.$row[6].'</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>'.$row[7].'</td>
                </tr>
                <tr>
                    <td>To</td>
                    <td>'.$row[8].'</td>
                </tr>
                <tr>
                    <td>No of days</td>
                    <td>'.$row[9].'</td>
                </tr>
                <tr>
                
                    <td>Reason</td>
                    <td>'.$row[10].'</td>
                </tr></table>
            <form action="hod_cancel_approved.php" method="post">
                        <input type="hidden" name="appno" value="'.$row[0].'">
                        <table>
                            <tr>
                                
                                <td>Approve&nbsp;<input type="radio" name="status" value="Approve"></td>
                                <td>Deny&nbsp;<input type="radio" name="status" value="Deny"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<input type="submit" value="Go"></td>
                            </tr>
                        </table>    
                    </form>';
            
            }

            else{
                echo'<h1 style="text-align: center;color:darkblue; ">No Pending Applications</h1>';
            }
            mysqli_close($con);
            ?>
        </td>
   
    </tr>
</table>    
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
    