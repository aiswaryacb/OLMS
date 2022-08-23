<html>
<head><title>Add Leave</title>
<link href="icon2.png" rel="icon" type="image/png"/>

</head>
<style>

body {
    margin: 0;
    background-color:white;
    background: url(lr2.jpg);
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
    margin-top: 10em;
}
.button {
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
.button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.buttonC{
    width: 50%;
    padding: 10px 10px;
    margin: 0 0;
    box-sizing: border-box;
    border: 0px;  
    outline: none;
    text-align: left;
}


input[type=submit] {
    width: 100%;
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: darkblue;
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
select {
    width: 100%;
    padding: 10px 10px;
    border: none;
    border-radius: 10px;
    border: 2px solid #BDBDBD;
}
div{
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
</style>
</head>
<body style="background-color:FLORALWHITE;">
    <?php
session_start();
$pid=$_SESSION['pid'];
if($pid==""){
    header("location:index.php");
}
?>
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="principal_home.php"><img id="home" src="h2.png"></a></li>
    
    <li><a href="#princi_add_leave.php" class="active">Add Leave</a></li>
    <li><a href="princi_staff_on_leave.php">Staffs On Leave</a></li>
    <li><a href="princi_dept_list.php">Department List</a></li>
    <li style="float:right"><a href="princi_logout.php">Logout</a></li>
    <li style="float:right"><a href="princi_chnge_pw.php" >Change Password</a></li>
</ul>
    
<div>
<h1 style="text-align: center;color: blueviolet">ADD LEAVE</h1>
<form action="princi_add_leave_db.php" method="post" name="addleave">
    <table border="0px">
        
        <tr>
            Acedamic Year:
        </tr>
        <tr>
            <td>
                <label for="acdmcyr_frm">From</label>
            </td>
            <td>
                <input type="date" name ="acdmcyr_frm">
            </td>
        </tr>
        <tr>
            <td>
               <label for="acdmcyr_to">To</label> 
            </td>
            <td>
                <input type="date" name ="acdmcyr_to">
            </td>
        </tr>
        <tr>
            <td><label for="designtn">Designation</label></td>
            <td><select name="designtn">
                        <option>~select~</option>
                        <option value="Teaching Staff">Teaching Staff</option>
                        <option value="Non-teaching Staff">Non Teaching Staff</option>
                        <option value="HOD">HOD</option>
                    </select></td>
        
        </tr>
        <tr>
            <td>
                <label for="casual">No: of Casual Leaves :</label>
            </td>
            <td>
                <input type="number" min="0" name="casual">
            </td>
        </tr>
        <tr>
            <td>
                <label for="halfpay">No: of Half Pay Leaves :</label>
            </td>
            <td>
                <input type="number" min="0" name="halfpay">
            </td>
        </tr>
        
        
        <tr>
            <td><input type="submit" value="Add Leave"></td>
            <td><a href="principal_home.php" class="button">Cancel</a></td>
        </tr>
    </table>
</form>
    </div>   
        

<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>
</body>
</html>
<!--?php
    mysqli_close($con);
?-->