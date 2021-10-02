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
   <h1>Office Collaborator</h1> 

</div>
    <div class="login-form">
      
    <h2>Admin and User Login Panel </h2>
    
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
<button type="submit" name="Signin">Sign In</button>
<div class="extra">
   
</div>
</form>
</div>
<?php
if(isset($_POST['Signin']))
{
  // $query="SELECT * FROM admin_login WHERE Admin_Name="+'$_POST[AdminName]' AND Admin_Password='$_POST[AdminPassword]'";
  //$query = 'SELECT * FROM admin_login WHERE Admin_Name="SHIV" AND Admin_Password="12345"';  
    $query = "SELECT * FROM admin_login WHERE `Admin_Name` ='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";



  $result = $con->query($query);
    
if($result->num_rows == 1)
{
session_start();
$_SESSION['AdminLoginId']=$_POST['AdminName'];

while($row = $result->fetch_assoc()) {
    if($row["role"] == "user"){
     
       header("location:employepanel.php");
    }
    else {
      
        header("location:Admin Panel.php");
    }
}
   

//header("location:Admin Panel.php");


}
else{
    echo"<script>alert('Incorrect Password');</script>";
}
}
?>
</body>
</html>