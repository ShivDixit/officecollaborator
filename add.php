<?php
require("Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminlogin</title>
   
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="css/all.min.css">
    
</head>
<body>
<div class="header">
   <h1>Admin Dashboard</h1> 

</div>
    <div class="login-form">
      
    <h2>Employee Registration</h2>
    
    <form method="POST">
    <div class="input-field">
    <i class="fas fa-user"></i>
            <input type="text" placeholder="Admin Name" name="AdminName">
</div>
        <div class="input-field">
        <i class="fas fa-key"></i>
            <!-- <i class="fas fa-lock"></i> -->
            <input type="password" placeholder="Password" name="AdminPassword">
</div>
</div>
        <div class="input-field">
        <i class="fas fa-key"></i>
            <!-- <i class="fas fa-lock"></i> -->
            <input type="password" placeholder="Password" name="AdminPassword">
</div>
</div>
        <div class="input-field">
        <i class="fas fa-key"></i>
            <!-- <i class="fas fa-lock"></i> -->
            <input type="password" placeholder="Password" name="AdminPassword">
</div>
<button type="submit" name="Signin">Sign In</button>
<div class="extra">
    <a href="#">Forgot Password ?</a>
</div>
</form>
</div>
<?php
if(isset($_POST['Signin']))
{
   $query="SELECT * FROM `admin_login` WHERE 'Admin_Name'='$_POST[AdminName]' AND 'Password'='$_POST[AdminPassword]'";
$result=mysqli_query($conn,$query);
 if(mysqli_num_rows($result)==0)
{
session_start();
$_SESSION['AdminLoginId']=$_POST['AdminName'];
header("location:Admin Panel.php");
}
else{
    echo"<script>alert('Incorrect Password');</script>";
}
}
?>


</body>
</html>