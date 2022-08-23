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
?>
<html>
<head><title>Change Password</title>
<link href="icon2.png" rel="icon" type="image/png"/>
</head>

<script src="JQ/jquery.min.js" type="text/javascript"></script>
<script src="JQ/jquery.validate.js" type="text/javascript"></script>
<script src="JQ/hpw.js" type="text/javascript"></script>


<style>
.error {color: #FF0000;}
body {
    margin: 0;
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
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
#home {
    width: 30px;
    height: 19px;
    background: url(img_navsprites.gif) 0 0;
}
button {
    background-color: green; /* Green */
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
	align:center;
}
.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

div.seek{
    border: solid 1px black;
    margin-top: 50px;
    margin-bottom: 100px;
    margin-right: 350px;
    margin-left: 350px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 20px;
        padding-right: 20px;
        background-color: buttonhighlight;
		}
                
  input[type=text] {
    width: 100%;
    padding: 10px 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 2px solid #3498DB;
}
    .buttonC {
    width: 120%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit] {
    width: 60%;
    background-color: green;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=password] {
    width: 100%;
    padding: 10px 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=password]:focus {
    border: 2px solid #3498DB;
}
.active {
    background-color: darkorange;
}

</style>
</head>
<body style="background-color:FLORALWHITE;">
<header><h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="hod_home.php" class="active"><img id="home" src="h2.png"></a></li>
 <li><a href="hod_leave_apply.php">Apply Leave</a></li>

 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
 <li style="float:right" class="active"><a href="#hod_chnge_pw.php" class="active">Change Password</a></li>
</ul>
<div class="seek">
    <h2 style="color:green" align="center"><b>&nbsp&nbsp&nbspChange &nbspPassword</b></h2>
<form action="hod_pw_msg.php" method="post" name="hpw" id="hpw">
    <table style="border: 0px">
        <tr>
                <td><label for="opw" >Current Password : </label><span class="error">*</span></td>
                <td><input type="password" name="opw" placeholder="Current Password" required></td>
            </tr>
            <tr>
                <td><label for="npw" >New Password : </label><span class="error">*</span></td>
                <td><input type="password" name="npw" placeholder="New Password" required></td>
            </tr>
            
        <tr>
            <td><input type="submit" value="Apply"/></td><td></td>
            <td><a href="staff_home.php" class="buttonC">Cancel</a></td>
        </tr>
    </table>

</form>
</div>
			
		
	
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>

