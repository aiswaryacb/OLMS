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
$date=date('d-m-Y');
?>
<html>
<head>
	<title>Apply Leave</title>
	<link href="icon2.png" rel="icon" type="image/png"/>
        <script src="JQ/jquery.min.js" type="text/javascript"></script>
        <script src="JQ/jquery.validate.js" type="text/javascript"></script>
        <script src="JQ/hodleave.js" type="text/javascript"></script>
</head>
<style>
.hidden{
    display: none;
}
.error {color: #FF0000;}
body{
	margin: 0;
	background-color:white;
        background: url(lr2.jpg);
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

.active {
    background-color: darkorange;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}
div.seek{
    border: solid 1px black;
    margin-top: 50px;
    margin-bottom: 100px;
    margin-right: 350px;
    margin-left: 300px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 50px;
    background-color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.buttonC {
    width: 100%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit] {
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
input[type=number] {
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

input[type=number]:focus {
    border: 2px solid #3498DB;
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
input[type=date] {
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

input[type=date]:focus {
    border: 2px solid #3498DB;
}

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    border-radius: 4px;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    font-size: 16px;
    resize: none;
}

select {
    width: 100%;
    padding: 10px 10px;
    border: none;
    border-radius: 10px;
    border: 2px solid #BDBDBD;
}
</style>
</head>
<body>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="hod_home.php"><img id="home" src="h2.png"></a></li>
 <li><a href="#hod_leave_apply">Apply Leave</a></li>
 
 <li><a href="hod_leave_history.php">Leave History</a></li>
 <li><a href="update.php">Update Details</a></li>
 <li><a href="hod_staff_on_leave.php">Staffs On Leave</a></li>
 <li><a href="hod_staff_list.php">Staff List</a></li>
 <li style="float:right"><a href="hod_logout.php">Logout</a></li>
  <li style="float:right"><a href="hod_chnge_pw.php">Change Password</a></li>
</ul>
<div class="seek">
<h2 style="color:green" align="center"><b>&nbsp&nbsp&nbspLeave&nbspApplication</b></h2>
<form action="hod_leave_msg.php" method="post" name="leave_apply" id="leave_apply">
    <table style="border: 0px">
        <!--tr>
            <td><label for ="staffid">Staff ID:</label></td>
            <td><br><input type="text" name="staffid"><br/><br/></td>
        </tr-->
        <tr>
            <td><label for="tol">Type of Leave :</label></td>
            <td><select name="tol" required>
                    <option value="">~select~</option>
		<option value="casual">Casual Leave</option>
		<option value="Half Pay">Half Pay Leave</option>
		<option value="Commuted">Commuted</option>
		<option value="mat/pat">Meternity/Paternity</option>
                
            </select></td>
        </tr>
        <input type="date" class="hidden" name="today" id="today" value="<?php echo $date; ?>"/>
        <tr>
            <td><label for="frm">From : </label></td>
            <td><input type="date" name="frm" id="frm" required></td>
        </tr>
        <tr>
            <td><label for="to">To : </label></td>
            <td><input type="date" name="to" id="to" required></td>
        </tr>
        <tr>
<!--            <td><label for ="no_of_days">No: of Leaves</label></td>
            <td><input type="number" name="no_of_days" min='1' max='180' required></td>-->
        </tr>
        <tr></tr>
        <tr>
            <td><label for="reason">Reason : </label></td>
            <td><input type="text" name="reason" required><br/><br/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Apply"/></td><td></td>
            <td><a href="hod_home.php" class="buttonC">Cancel</a></td>
        </tr>
    </table>

</form>
</div>
<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>

	

