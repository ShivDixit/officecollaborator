<?php
$con=new mysqli("localhost","root","","learning");
    // if(mysqli_connect_error()){
//     echo "cannot connect";
// }
// else
//     echo "connected";

//     $conn = new mysqli($servername, $username, $password);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";


?>

