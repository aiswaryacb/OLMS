
<html>
<head><title>Department-List</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>
<style>

body {
    margin: 0;
/*    background: url(bg2.jpg) no-repeat;*/
}
.active {
    background-color: darkorange;
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
.botton2{
    background-color: lightcoral; /* Green */
    border: none;
    color: white;
    padding: 0px 0px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 10px;
}
.button2:hover{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
sup{
  
    color: red;
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
</style>
</head>
<body style="background-color:FLORALWHITE;">
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
$res= mysqli_query($con, "select * from principal_details where principal_id='$pid';");
$row=mysqli_fetch_array($res);
	$fname= $row[1];
        $lname=$row[2];
$dpt=mysqli_query($con,"select * from hod_details;");
$dept=mysqli_fetch_array($dpt);


?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="principal_home.php"><img id="home" src="h2.png"></a></li>
    
    <li><a href="princi_add_leave.php" >Add Leave</a></li>
    <li><a href="princi_staff_on_leave.php">Staffs On Leave</a></li>
    <li><a href="#princi_dept_list.php" class="active">Department List</a></li>
    <li style="float:right"><a href="princi_logout.php">Logout</a></li>
    <li style="float:right"><a href="princi_chnge_pw.php" >Change Password</a></li>
</ul>
<h1 style="text-align:center; color: Green;">Department List</h1>
<?php
if($dept){
    $sl=1;
    echo'<table>
        <tr>
            <th>Sl.no:</th>
            <th>Department</th>
            <th>HOD</th>
            <th>View Staff</th>
        </tr>';
        while($dept){
            
                echo'<tr><td>'.$sl.'</td>
                     <td>'.$dept[6].'</td>
                     <td>'.$dept[1].' '.$dept[2].'</td>
                     <form action="princi_staff_list.php" method="post">
                     <input type="hidden" value="'.$dept[6].'" name="dpt" id="dpt">
                     <td><input type="submit" value="Go"></td>
                     </form>
                     </tr>';
            
            $dept= mysqli_fetch_array($dpt);
            $sl++;
        }
    echo '</table>';
}
else {
    echo'<h2 style="text-align: center; color: blue;">No Departments to show</h2>';
}
?>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
<?php
mysqli_close($con);
?>