<?php
include("Connection.php");
error_reporting(0);
$email=$_GET['email'];
//echo $email;
//$sql = "select * from users where email = '$email'";
 
$sql = 'SELECT * FROM users where email="'.$email.'"';
if($result = mysqli_query($con, $sql)){
  $row = mysqli_fetch_array($result);
  
  }

  else 
  echo "no data found";
// echo $sql;
// $result = $con->query($sql);

// echo "result = ".$result;

// $row = mysqli_fetch_array($result);

 //echo $row;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Panel</title>
    <style>
        body{
            margin:0px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
       div.header{
           font-family:poppins;
           display:flex;
           justify-content:space-between;
        align-items:center;
        padding:0px 60px;
        background-color: #204969;
       }
       div.header button{
           background-color: #f0f0f0;
           font-size:16px;
           font-weight:20px;
           padding:8px 12px;
           border:2px solid black;
           border: radius 5px;

       }
       body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: darkslategrey;
}

* {
  box-sizing: border-box;
}

.container {
  padding: 20px;

  background-color: white;
}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: dodgerblue;
}


.signin {
  background-color: #f1f1f1;
  text-align: center;
}
        </style>
</head>
<body>
    
        <div class="header">
   <h1>Employee Update Panel></h1> 
   <form method="POST">
   <button name="Logout">Logout</button>
  
    </form>

</div>
<div style="width:50%;margin-left:25%;margin-top:2%;">
<form method="post">
  <div class="container">
    <h1>Update</h1>
    
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" value=<?php echo $row[1] ?> name="email" id="email" >

    <label for="Phoneno"><b>Phoneno</b></label>
    <input type="text" value=<?php echo $row[9] ?> name="Phoneno" id="Phoneno" >

    <label for="Address"><b>Address</b></label>
    <input type="text" value=<?php echo $row[7] ?> name="Address" id="Address" >
    
    <label for="Skills"><b>Skills</b></label>
    <input type="text" value=<?php echo $row[8] ?> name="Skills" id="Skills" >
    


    <button type="submit" name="update"class="registerbtn">Update</button>
    <button type="Back" formaction="employepanel.php"class="registerbtn">Back</button>

  </div>
  
  
</form>
</div>
<?php 
if(isset($_POST['Logout'])){
    session_destroy();
    header("location:Admin Login.php");
}
?>
<?php 
$conn = mysqli_connect("localhost", "root", "", "learning");
          
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
  
if(isset($_POST['update'])){


$Email=$_POST['email'];
$Phoneno=$_POST['Phoneno'];
$Address=$_POST['Address'];
$Skills=$_POST['Skills']; 


echo $Email;
echo $Phoneno;
echo $Address;
echo $Skills;

$sql = "update users set Phoneno = '$Phoneno', Skills = '$Skills', Address= '$Address' where email = '$Email'";
  echo $sql;
 if(mysqli_query($con, $sql)){
  //  echo "record updated";
  header("location:employepanel.php");
 } else{
     echo "ERROR: Hush! Sorry $sql. " 
         . mysqli_error($conn);
 }
}
mysqli_close($conn);
?>
</body>
</html>