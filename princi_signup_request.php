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
</style>
</head>
<body style="background-color:FLORALWHITE;">
<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
 <li><a href="principal_home.php" class><img id="home" src="h2.png"></a></li>
 <li><a href="princi_add_leave.php" >Add Leave</a></li>
 <li style="float:right"><a href="princi_logout.php">Logout</a></li>
</ul>
<h1 style="text-align: center; color:midnightblue;">SignUp Requests</h1>
<div style="overflow-x:auto;">
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
    $lr= mysqli_query($con,"select * from details where status='hod approved';");
    $i=1;
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
                    <form action="princi_signup_db.php" method="post">
                        <input type="hidden" name="sid" value="'.$row[0].'">
                        <input type="hidden" name="gen" value="'.$row[4].'">
                        <input type="hidden" name="desig" value="'.$row[5].'">
                        <table>
                            <tr>
                                <td>Please set the academic year before approving</td><td></td>
                            </tr>
                            <tr>
                                <td>From : <input type="date" name="frmd"></td>
                                <td>To : <input type="date" name="tod"></td>
                            </tr>
                                
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