<?php
session_start();
require("connection.php");
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel='stylesheet' href='style4.css'>


    <title>Hospital ERP- Administrator</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='admin.php'>Home</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'>Administrator Tab</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>
       <br><br>
       <br><br>
       <br><br>
       <br><br>
       <div class='panel'>
            <div class="inside">
            <a href="staff_details.php"> <img src='images/details.png' height='100px' width='100px'>
                <br>
                <br>
                Add/View/Update Staff Details</a>
            </div>
            <div class="inside">
            <a href="logs.php"> <img src='images/logs.png' height='120px' width='120px'>
                <br>
                <br>
                View Staff Login Logs</a>
            </div>
            <div class="inside">
            <a href="patient_report.php"> <img src='images/appointment.png' height='100px' width='100px'>
                <br>
                <br>
                View Patients Reports</a>
            </div>
            <div class="inside">
                <a href="ward_report.php"> <img src='images/wardr.png' height='100px' width='80px'>
                <br>
                <br>
                View Ward Reports</a>
            </div>
            <div class="inside">
                <a href="store_report.php"> <img src='images/reports.png' height='100px' width='80px'>
                <br>
                <br>
                View Store Reports</a>
            </div>
            
        </div>
</div>
</body>
</html>

    <?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>
