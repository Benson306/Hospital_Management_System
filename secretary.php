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


    <title>Hospital ERP- Receptionist Desk</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='secretary.php'>Home</a></li>
               <li><a href='patients_details.php'>Record Patients Details</a></li>
               <li><a href='appointments.php'>Schedule Appointmets</a></li>
               <li><a href='sessions.php'>End Patient's Session</a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>
       <br><br>
       <div class='panel'>
            <div class="inside">
            <a href="patients_details.php"> <img src='images/details.png' height='100px' width='100px'>
                <br>
                <br>
                Record Patients' Personal Details</a>
            </div>
            <div class="inside">
            <a href="start_session.php"> <img src='images/session.png' height='100px' width='100px'>
                <br>
                <br>
                Start Patients' Session</a>
            </div>
            <div class="inside">
            <a href="search_details.php"> <img src='images/search.png' height='100px' width='100px'>
                <br>
                <br>
                Search For Patients' Details And Generate Their Report</a>
            </div>
            <div class="inside">
                <a href="current.php"> <img src='images/print.png' height='100px' width='100px'>
                <br>
                <br>
                Print Report of Patient's Current Visit</a>
            </div>
            <div class="inside">
            <a href="appointments.php"> <img src='images/appointment.png' height='100px' width='100px'>
                <br>
                <br>
                Schedule And View Booked Appointments</a>
            </div>
            <div class="inside">
                <a href="sessions.php"> <img src='images/stop.png' height='100px' width='100px'>
                <br>
                <br>
                End Patient's Session</a>
            </div>
            
        </div>
        <br>
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
</html>

    <?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>
