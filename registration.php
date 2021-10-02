<?php
session_start();
if(!isset($_SESSION['AdminLoginId'])){
    header("location:Admin login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
   <h1>Admin Registration Panel></h1> 
   <form method="POST">
   <button name="Logout">Logout</button>
  
    </form>

</div>
<div style="width:50%;margin-left:25%;margin-top:2%;">
<form action="registration.php" method="post">
  <div class="container">
    <h1>Registration</h1>
    
    <hr>

    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="Name" id="Name">

    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" id="Email" >

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" id="Password" >
    
    <label for="Designation"><b>Designation</b></label>
    <input type="text" placeholder="Designation" name="Designation" id="Designation" >

    <label for="Band"><b>Band</b></label>
    <input type="text" placeholder="Band" name="Band" id="Band" >

    
    <label for="Reportingmanager"><b>Reporting Manager</b></label>
    <input type="text" placeholder="Reporting manager" name="Reportingmanager" id="Reportingmanager" >


    <label for="AllocatedProject"><b>Allocated Project</b></label>
    <input type="text" placeholder="Allocated Project" name="AllocatedProject" id="AllocatedProject" >


    <label for="Address"><b>Address</label>
    <input type="text" placeholder="Address" name="Address" id="Address" >

    <label for="Skills"><b>Skills</b></label>
    <input type="text" placeholder="Skills" name="Skills" id="Skills" >


   

    

    <label for="Phoneno"><b>Phoneno</b></label>
    <input type="text" placeholder="Phoneno" name="Phoneno" id="Phoneno" >
    

    <input type="submit"  name="create" class="registerbtn" value="Sign Up">
    <!-- <button type="submit" class="registerbtn">Submit</button> -->
    <button type="back" formaction="Admin Panel.php" class="registerbtn" >Back</button>
  </div>
  
  
</form>
</div>
<?php 
if(isset($_POST['Logout'])){
    session_destroy();
    header("location:Admin Login.php");
}
?>
<div>
<?php 
$conn = mysqli_connect("localhost", "root", "", "learning");
          
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
  
if(isset($_POST['create'])){

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$Designation=$_POST['Designation'];
$Band=$_POST['Band'];
$Reportingmanager=$_POST['Reportingmanager']; 

$AllocatedProject=$_POST['AllocatedProject'];
$Address=$_POST['Address'];
$Skills=$_POST['Skills']; 
$Phoneno=$_POST['Phoneno'];

$sql = "INSERT INTO users VALUES('$Name','$Email','$Password','$Designation','$Band','$Reportingmanager','$AllocatedProject','$Address','$Skills','$Phoneno')";
  
if(mysqli_query($conn, $sql)){
   
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
</div>
</body>
</html>