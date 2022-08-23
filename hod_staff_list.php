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
        $today=date('Y-m-d');
$staff=mysqli_query($con,"select * from details where status='current' AND department='$dpt';");
$staffs=mysqli_fetch_array($staff);

?>
<html>
<head><title>Staff-List</title>
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
    /*background: url(bg11.jpg) no-repeat;*/
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
 <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>

 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="#hod_staff_list.php" class="active">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
  <li style="float:right"><a href="hod_chnge_pw.php">Change Password</a></li>
</ul>
    <h1 style="text-align:center; color: Green;">Staff List-<?php echo $dpt; ?>,Department</h1>
    <?php
if($staffs){
    echo'<table>
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Designation</th>
        </tr>';
        while($staffs){
            
                echo'<tr><td>'.$staffs[0].'</td>
                     <td>'.$staffs[1].' '.$staffs[2].'</td>
                     <td>'.$staffs[5].'</td>
                    </tr>';
            
            $staffs= mysqli_fetch_array($staff);
        }
        
    echo'</table>';
}
else {
    echo'<h2 style="text-align:center;color:blue">No Staffs in your department </h2>';
}
?>


<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</div>
</body>
</html>
<?php
    mysqli_close($con);
?>

