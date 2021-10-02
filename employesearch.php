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
    <title>employesearch</title>
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
       h2{
           text-align:center;
       }
       div.yo{
           text-align:center;
       }
        </style>
</head>
<body>
    
        <div class="header">
   <h1>Employee -<?php echo $_SESSION['AdminLoginId']?></h1> 
   
   <form method="POST">
   <button name="Logout">Logout</button>
   <button name="Back"formaction="employepanel.php">Back</button>
  
    </form>
</div>
<h2>Find Employees Details</h2>
<div class="yo" style="padding:50px;">
<form method="POST">
    <input style="padding:20px;border-radius:10px;width:22%" type="text"name="email"></input>
<button style="padding:20px;border-radius:10px;width:10%" type="Search" name="search">Search</button>
    </form>
</div>
<div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered" style=" padding: 10px;margin-left: 3%;">
                            <tr bgcolor="#204969">
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Name </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Email </td>
                                
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Address </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Skills </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Designation </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Reporting Manager </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Project Allocated </td>
                                <!-- <td> </td> -->
                            </tr>
<?php 
if(isset($_POST['Logout'])){
    session_destroy();
    header("location:Admin Login.php");
}
?>

<?php

if(isset($_POST['search']))
{


$servername = "localhost";
$username = "root";
$password = "";
$db = "learning";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$search = $_POST['email'];
//echo $search;
$sql = "select * from users where email = '$search'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['designation'] . "</td>";
         
            echo "<td>" . $row['reportingmanager'] . "</td>";
            echo "<td>" . $row['allocatedproject'] . "</td>";
           
    echo "</tr>";
        
    }
  
    
} else {
	echo "0 records";
}

$conn->close();
}

?>
</body>
</html>