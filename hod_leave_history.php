<html>
<head><title>Leave History</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
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
    margin-top: 9em;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th{
   text-align: left;
    padding: 8px;
    background-color: activecaption;
    color:indigo;
} 
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
div{
    margin-top: 1em;
}

</style>
<?php
            session_start();
            $sid=$_SESSION['id'];
            if($sid==""){
                 header("location:index.php");
            }
            $dbhost="localhost:3306";
            $dbuser="root";
            $dbpass="";
            $db="olms";
            $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
            $resd= mysqli_query($con, "select * from hod_details where hod_id='$sid';");
$rowd= mysqli_fetch_array($resd);
if($rowd[11]=='update'){
    $_SESSION['id']=$hodid;
    header('location:hod_updation.php');
}
            
            $res= mysqli_query($con,"select * from leave_history where staff_id='$sid';");
            $row= mysqli_fetch_array($res);
?>
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>
 
 <li style="background-color: darkorange"><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
  <li style="float:right"><a href="hod_chnge_pw.php">Change Password</a></li>
</ul>
<h1 style="text-align: center; color:midnightblue;">Leave History</h1>
<div style="overflow-x:auto;">
    
    <table>
        <tr>
            <td>
                <h3 style="text-align: center; color: darkgreen;">Accademic Year</h3>
            </td>
            <td>
                <h3 style="color:green"> From: &nbsp;&nbsp;<?php echo $row[3]; ?></h3>
            </td>
            
            <td>
                <h3 style="color:green;"> To: &nbsp;&nbsp;<?php echo $row[4]; ?></h3>
            </td>
        </tr>
    </table>
  <table>
      <tr>
          <th></th>
          <th>Casual Leave</th>
          <th>Half Pay</th>
          <th>Maternal/Paternal</th>
          
      </tr>
      <tr>
          <td>Leaves Taken</td>
          <td><?php echo $row[6]; ?></td>
          <td><?php echo $row[9]; ?></td>
          <td><?php echo $row[12]; ?></td>
          
      </tr>
      <tr>
          <td>Total Allowances</td>
          <td><?php echo $row[5]; ?></td>
          <td><?php echo $row[8]; ?></td>
          <td><?php echo $row[11]; ?></td>
          
      </tr>
      <tr>
          <td>Remaining</td>
          <td><?php echo $row[7]; ?></td>
          <td><?php echo $row[10]; ?></td>
          <td><?php echo $row[13]; ?></td>
          
      </tr>
  </table>
  <table>
    <tr>
        
        <td>
            <?php
            
            $lr= mysqli_query($con,"select * from leave_requests where staff_id='$sid';");
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
            }
            else{
                echo'<h1 style="text-align: center;color:darkblue; ">You have no Leaves</h1>';
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

