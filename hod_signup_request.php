<html>
<head><title>Signup Requests</title>
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
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php" class><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>

 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
</ul>
<h1 style="text-align: center; color:midnightblue;">SignUp Requests</h1>
<div style="overflow-x:auto;">
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
    $dpt=$row[6];
    $lr= mysqli_query($con,"select * from details where department='$dpt' and status='requested';");
    
    if($row=mysqli_fetch_array($lr)){
        echo '<table>
                <tr>
                   <td>Staff ID</td> 
                   <td>'.$row[0].'</td>
                </tr>
                <tr>
                   <td>Name</td>
                   <td>'.$row[1].' '.$row[2].'</td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>'.$row[6].'</td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>'.$row[5].'</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>'.$row[8].'<br>'.$row[9].'<br>'.$row[7].'</td>
                </tr>
                </table>
                    <form action="hod_signup_db.php" method="post">
                        <input type="hidden" name="sid" value="'.$row[0].'">
                        <table>
                            <tr>
                                
                                <td>Approve&nbsp;<input type="radio" name="status" value="approved"></td>
                                <td>Deny&nbsp;<input type="radio" name="status" value="denied"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<input type="submit" value="Go"></td>
                            </tr>
                        </table>    
                    </form>';
                
      
            
        }
    
    else{
        echo'<h2 style="text-align: center; color:green;">No Signup Requests to show!</h2>';
    }
    ?>  
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
<?php
mysqli_close($con);
?>