<html>
<head><title>Cancel Requests</title>
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
/*input[type=submit] {
    width: 100%;
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
}*/
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
?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>
 
 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
 <li style="float:right"><a href="hod_chnge_pw.php">Change Password</a></li>
</ul>
    <h2 style="color: red; text-align: center">LEAVE CANCEL REQUESTS</h2>     
<table>
    <tr>
    
        <td>
            
            <?php
            $lr= mysqli_query($con,"select * from leave_requests where department='$dpt' AND staff_id!='$hodid' AND status='staffcancelled' OR status='cancelrequested'");
            
            if($row=mysqli_fetch_array($lr)){  
            ?>       
            <h1 style="text-align: center;color:darkblue; ">Cancel Leave Applications</h1>
            <table>
                <tr>
                    <th>Application Number</th>
                    <th>Applied Date</th>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Type of Leave</th>
                    <th>From</th>
                    <th>To</th>
                    <th>No of days</th>
                    <th>Reason</th>
                    <th>Approve or Deny</th>
                </tr>
                <form action="hod_cancel_approved.php" method="post">
                <tr>
                    
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[12]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2].' '.$row[3]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><?php echo $row[10]; ?></td>
                    <td>
                        <input name="status" type="radio" value="Approve" checked/>Approve
                    <input name="status" type="radio" value="Deny" /> Deny<br>
                    <input type="hidden" name="appno" value="<?php echo $row[0]; ?>" />
                    <input type="hidden" name="tol" value="<?php echo $row[6]; ?>" />
                    <input type="hidden" name="nod" value="<?php echo $row[9]; ?>" />
                    <input type="hidden" name="sid" value="<?php echo $row[1]; ?>" />
                    <input type="submit" value="Apply"/>
                    </td>
                </tr>
                </form>
            <?php
            while($row=mysqli_fetch_array($lr)){
            ?>
                <form action="hod_cancel_approved.php" method="post">
                <tr>
                    
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[12]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2].' '.$row[3]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><?php echo $row[10]; ?></td>
                    <td>
                   <input name="status" type="radio" value="Approve" checked/>Approve
                    <input name="status" type="radio" value="Deny" /> Deny<br>
                    <input type="hidden" name="appno" value="<?php echo $row[0]; ?>" />
                    <input type="hidden" name="tol" value="<?php echo $row[6]; ?>" />
                    <input type="hidden" name="nod" value="<?php echo $row[9]; ?>" />
                    <input type="hidden" name="sid" value="<?php echo $row[1]; ?>" />
                    <input type="submit" value="Apply"/>
                    </td>
                </tr>
                </form>
            <?php
            }
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
    