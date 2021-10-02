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
        </style>
</head>
<body>
    
        <div class="header">
   <h1>Company Details -<?php echo $_SESSION['AdminLoginId']?></h1> 
   <form method="POST" >
   <button name="Logout">Logout</button>
   
   <button name="Back" formaction="employepanel.php">Back</button>
  
   <!-- <a href="/learn/search.php"><button>Search</button>
    </a> -->
    </form> 
</div>
</div>
    <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered" style=" padding: 10px;margin-left: 3%;">
                            <tr bgcolor="#204969">
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Name </td>
                                
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Phone No. </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Address </td>
                                <td style="padding: 15px;border-radius:5px;font-weight:500;width:150px;"> Skills </td>
                                
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

$link = mysqli_connect("localhost", "root", "", "learning");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "SELECT * FROM users";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
              
                echo "<td>" . $row['phoneno'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                
                echo "<td>" . $row['skills'] . "</td>";
               
                echo "<td>" . $row['reportingmanager'] . "</td>";
                echo "<td>" . $row['allocatedproject'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>
</body>
</html>