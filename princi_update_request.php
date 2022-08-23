<?php
    session_start();
    $pid=$_SESSION['pid'];
    if($pid==""){
        header("location:index.php");
    }
    $dbhost="localhost:3306";
    $dbuser="root";
    $dbpass="";
    $db="olms";
    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
?>
<html>
<head><title>Update Requests</title>
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
    margin-top: 15em;
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
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="principal_home.php" class><img id="home" src="h2.png"></a></li>
 <li><a href="princi_add_leave.php" >Add Leave</a></li>
 <li><a href="princi_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="princi_dept_list.php">Department List</a></li>
 <li style="float:right"><a href="princi_logout.php">Logout</a></li>
 <li style="float:right"><a href="princi_chnge_pw.php" >Change Password</a></li>
</ul>
<h1 style="text-align: center; color:midnightblue;">Update Requests</h1>
<div style="overflow-x:auto;">
    <?php
    $lr= mysqli_query($con,"SELECT * FROM `update_requests`");
    $i=1;
    if($row=mysqli_fetch_array($lr)){
        ?>
    <table>
                <tr>
                <th>Sl.No</th>
                <th>Name</th>
                <th>HOD ID</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Approve or Deny</th>
                </tr>
                <form action="princi_update_db.php" method="post">
                <tr>
                    <td><?php echo$i; ?></td>
                    <td><?php echo $row[1].' '.$row[2]; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo$row[8].'<br>'.$row[9].'<br>'.$row[7]; ?></td>
                    <td>
                        <input name="status" type="radio" value="current" checked/>Approve
                    <input name="status" type="radio" value="Deny" /> Deny<br>
                    <input type="hidden" name="hodid" value="<?php echo $row[0]; ?>" />
                    <input type="submit" value="Apply"/>
                    </td>
                    </tr>
                </form>
         <?php           
        while($row=mysqli_fetch_array($lr)){
            $i++;
        ?>
               <form action="princi_update_db.php" method="post">
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row[1].' '.$row[2];?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[8].'<br>'.$row[9].'<br>'.$row[7]; ?></td>
                    <td>
                        <input name="status" type="radio" value="current" checked>Approve
                        <input name="status" type="radio" value="Deny">Deny<br>
                        <input type="hidden" name="hodid" value="<?php echo $row[0]; ?>">
                        <input type="submit" value="Apply">
                        
                    
                    
                    </td>
                    </tr>
                    
               </form>
      
        <?php    
        }
        ?>
       </table>
    <?php
    }
    else{
        echo'<h2 style="text-align: center; color:green;">No Update Requests to show!</h2>';
    }
    ?>  
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
<?php
mysqli_close($con);
?>