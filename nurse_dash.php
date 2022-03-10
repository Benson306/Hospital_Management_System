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
    <link rel='stylesheet' href='style10.css'>


    <title>Hospital ERP</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='#'>Home</a></li>
                <li><a href='#'></a></li>
               <li><a href='attend_patient.php'>Attend To Patient</a></li>
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
       <div class='panel1'>
            <div class="inside1">
            <a href="nurse.php"> <img src='images/attend.png' height='100px' width='100px'>
                <br>
                <br>
                Record Patient's Vitals(Out-patients)</a>
            </div>
            <div class="inside1">
            <a href="patient_report.php"> <img src='images/details.png' height='100px' width='100px'>
                <br>
                <br>
                Retrieve Patient's Records</a>
            </div>
            <div class="inside1">
            <a href="wards.php"> <img src='images/ward.png' height='100px' width='130px'>
                <br>
                <br>
                Check-In and Checkout IN-Patients (Wards)</a>
            </div>
            <div class="inside1">
            <a href="ward_report.php"> <img src='images/wardr.png' height='100px' width='100px'>
                <br>
                <br>
                Ward Reports</a>
            </div>
            
        </div>
</div>
</body>
</body>
</html>

<?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>