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
            $id=$_SESSION['id'];
            if($id==""){
                 header("location:index.php");
            }
            $dbhost="localhost:3306";
            $dbuser="root";
            $dbpass="";
            $db="olms";
            $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
            $resd= mysqli_query($con, "select * from hod_details where hod_id='$id';");
            $rowd= mysqli_fetch_array($resd);
            if($rowd[11]=='update'){
            $_SESSION['id']=$id;
            header('location:hod_updation.php');
            }
            $sid= htmlspecialchars($_GET['sid']);
            
            $result= mysqli_query($con,"select * from leave_history where staff_id='$sid';");
            $res=mysqli_query($con,"select * from details where staff_id='$sid';");
            $row1=mysqli_fetch_array($res);
            $row= mysqli_fetch_array($result);
?>
</head>
<body style="background-color:FLORALWHITE;">
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
<h1 style="text-align: center; color:midnightblue;">Leave History : <?php echo $row1[1].' '.$row1[2]; ?></h1>
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
          <th>Meternal/Paternal</th>
          
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
    <br><br>
    <p align="center">
    <button><a href='hod_leave_requests.php'>Back</a></button> 
    </p>
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
<?php
mysqli_close($con);
header('refresh:10;url:hod_leave_requests.php');
?>
