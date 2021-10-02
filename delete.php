<?php
include("Connection.php");
error_reporting(0);
$email=$_GET['email'];

$query='DELETE FROM users WHERE email="'.$email.'"';
$result = $con->query($query);

if($result)
{ 
 
    header("location:Admin login.php");
}
else{

    header("location:Admin login.php");
}