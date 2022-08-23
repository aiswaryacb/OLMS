<html>
<head><title>Message</title>
<link href="icon2.png" rel="icon" type="image/png"/>
<script src="JQ/jquery.validate.js" type="text/javascript"></script>
<script src="JQ/jquery.min.js" type="text/javascript"></script>       
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

header{
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}

</style>
</head>
<body style="background-color:WHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="principal_home.php"><img id="home" src="h2.png"></a></li>
    
    <li><a href="princi_add_leave.php" >Add Leave</a></li>
    <li><a href="princi_staff_on_leave.php">Staffs On Leave</a></li>
    <li><a href="princi_dept_list.php">Department List</a></li>
    <li style="float:right"><a href="princi_logout.php">Logout</a></li>
    <li style="float:right"><a href="#princi_chnge_pw.php" class="active">Change Password</a></li>
</ul>
    <?php
session_start();
$pid=$_SESSION['pid'];
if($pid==""){
    header("location:index.php");
}
$opw=htmlspecialchars($_POST["opw"]);
$npw=htmlspecialchars($_POST["npw"]);
$dbhost="localhost:3306";
$dbuser="root";
$dbpass="";
$db="olms";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$db);

$val= mysqli_query($con, "select * from principal_details where principal_id='$pid';");
$val_row=mysqli_fetch_array($val);

$pw=$val_row[8];

if($opw==$pw)
{
    mysqli_query($con,"UPDATE `principal_details` SET `password` = '$npw' WHERE `principal_id` = '$pid';");
    echo'<h1 style="text-align:center;color:red">Password Changed Successfully!!</h1>';    
}

else{
         echo'<h1 style="text-align:center;color:red">Sorry...Current Password Didnot Match </h1>';
         }
                 
                 //<br>
//<br><br><br><br><br>
    echo'<h5 style="text-align: left;color:gray">You will Be redirected to Home page in 5sec.....</h5>';
mysqli_close($con);
header("refresh:2;url=principal_home.php");
?>
</body>
</html>
