<?php
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
session_start();
$hodid=$_SESSION['id'];
if($hodid==""){
    header("location:index.php");
}
$resd= mysqli_query($con, "select * from hod_details where hod_id='$hodid';");
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
$lr1=mysqli_query($con,"select count(*) from leave_requests where status='applied' AND department='$dpt';");
$lrn=mysqli_fetch_array($lr1);
$nlr=$lrn[0];
//if($nlr==0){
//  $nlr=""; 
//}
$sr=mysqli_query($con,"select count(*) from details where status='requested' AND department='$dpt';");
$srn=mysqli_fetch_array($sr);
$nsr=$srn[0];
//if($nsr==0){
//    $nsr="";
//} 
$cr=mysqli_query($con,"select count(*) from details where status='close requested' AND department='$dpt';");
$crn=mysqli_fetch_array($cr);
$ncr=$crn[0];
//if($ncr==0){
//    $ncr="";
//}
$lcr=mysqli_query($con,"select count(*) from leave_requests where (status='staffcancelled' OR status='cancelrequested') AND department='$dpt';");
$lcrn=mysqli_fetch_array($lcr);
$nlcr=$lcrn[0];
//if($nlcr==0){
//    $nlcr="";
//}
?>
<html>
<head><title>Home</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
/*    background-image: url("bg2.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;*/
}
div.background {
/*  background-image: url("bg2.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;*/
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
div.bodyin {
    background: url(bg11.jpg) no-repeat;
    border: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
}
.active {
    background-color: darkorange;
}
sup{
  
    color: red;
}
</style>
</head>
<body style="background-color:FLORALWHITE;">

<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<div class="bodyin">
<ul>
 <li><a href="#hod_home.php" class="active"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>

 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
  <li style="float:right"><a href="hod_chnge_pw.php">Change Password</a></li>
</ul>
<!--<div class="background">-->
<h1 style="color:red; text-align:center;">Welcome<?php echo " ".$fname." ".$lname; ?></h1>
<h2 style="color:green; text-align:center">Head Of <?php echo $dpt; ?>, Engineering Department</h2>
<table>
    <tr>
        <td>
            <a href="hod_leave_requests.php" class="button1">Leave Requests&nbsp;&nbsp;<sup>(<?php echo $nlr; ?>)</sup></a><br><br>
            <a href="hod_signup_requests.php"class="button1">SignUp Requests<sup>(<?php echo $nsr; ?>)</sup></a><br><br>
            <a href="hod_close_request.php" class="button1">Close Requests&nbsp;&nbsp;&nbsp;<sup>(<?php echo $ncr; ?>)</sup></a><br><br>
            <a href="hod_cancel_requests.php" class="button1">Cancel Requests<sup>(<?php echo $nlcr; ?>)</sup></a><br>
        </td>
        <td>
            <?php
            $today=date('Y-m-d');
            $lr= mysqli_query($con,"select * from leave_requests where staff_id='$hodid' AND to_date >= '$today';");
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
                echo'</table>';
                echo'<a href="hod_leave_cancel.php" class="button1">Cancel Leave</a><br><br>';
            }
            
            else{
                echo'<h1 style="text-align: center;color:darkblue; ">You have no Pending Leaves</h1>';
            }
                    mysqli_close($con);
                ?>
            </table>
        </td>
    </tr>
</table>

<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</div>
</body>
</html>

