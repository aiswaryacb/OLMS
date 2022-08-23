<?php
if(isset (htmlspecialchars($_POST["sid"])))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('localhost:3360' , 'root', '', 'olms');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $username = filter_var(htmlspecialchars($_POST["username"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT staff_id FROM details WHERE staff_id=?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        die('<img src="notavailable.png" />');
    }else{
        die('<img src="available.jpg" />');
    }
}
?>