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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

    <link rel='stylesheet' href='style4.css'>

    <title>Hospital ERP</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='secretary.php'>Home</a></li>
               <li><a href='patients_details.php'>Record Patients Details</a></li>
               <li><a href='patients_details.php'>Book Appointment</a></li>
               <li><a href='patients_details.php'>Record Payments</a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>

       <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='secretary.php';
      }
      </script> 
      <br>
       <br>
       <div class='well well-sm' id='ribbon'><h3>Record Patient's Personal Details</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Full Patients Name:</label>
                <input type='text' class='form-control' placeholder='Name' name='name' required='yes'>
                <br>
                <label>Date of Birth:</label>
                <input type='date' class='form-control' placeholder='D.O.B' name='dob'required='yes'>
                <br>
                <label>Gender:</label>
                <select class='form-control' name='gender' required='yes'>
                    <option></option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
                <br>
                <label>Tel Number:</label>
                <input type='text' class='form-control' placeholder='Tel Number' name='number' required='yes'>
                <br>
                <label>National ID Number:</label>
                <input type='text' class='form-control' placeholder='National ID Number' name='national' required='yes'>
                <br>
                <label>Marital Status:</label>
                <select class='form-control' name='marital' required='yes'>
                    <option></option>
                    <option value='Single'>Single</option>
                    <option value='Married'>Married</option>
                </select>
                <label>Residence:</label>
                <input type='text' class='form-control' placeholder='Residence' name='residence' required='yes'>
                <br>
                <label>Occupation:</label>
                <input type='text' class='form-control' placeholder='Occupation' name='occupation'>
                <br>
                <label>Insurance Type:</label>
                <br>
                <input type="text" class='form-control' Placeholder='Name of Insurance' name='insurance' >
                <br>
                <label>Insurance Number:</label>
                <br>
                <input type="text" class='form-control' Placeholder='Insurance Number' name='insurance_number' >
                <br>
                <label>Name of Next of Kin:</label>
                <br>
                <input type="text" class='form-control' Placeholder='Name of Next Of Kin' name='kin' >
                <br>
                <label>Relationship:</label>
                <br>
                <input type="text" class='form-control' Placeholder='Relationship with Kin' name='relationship' >
                <br>
                <label>Phone Number of Next of Kin:</label>
                <br>
                <input type="text" class='form-control' Placeholder='Phone Number of Next Of Kin' name='kin_number' >
                <br>
                <input type='submit' value='Save Details' class='btn btn-danger' name='submit'>
            </form>
       </div>
       </div>
       <br><br>
</div>

</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#patients_data').DataTable({
        "order": []
      });  
      
 }); 
 </script>
<script> 
(function(seconds) {
    var refresh,       
        intvrefresh = function() {
            clearInterval(refresh);
            refresh = setTimeout(function() {
               location.href = location.href;
            }, seconds * 1000);
        };

    $(document).on('keypress click', function() { intvrefresh() });
    intvrefresh();

}(15));
/*setInterval(function(){
    $(" #patients_data").load(" #patients_data > *");
}, 5000);
});*/
</script>

    <?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>
<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $kin = $_POST['kin'];
    $kin_number = $_POST['kin_number'];
    $residence = $_POST['residence'];
    $occupation = $_POST['occupation'];
    $marital = $_POST['marital'];
    $insurance_number = $_POST['insurance_number'];
    $insurance = $_POST['insurance'];
    $relationship = $_POST['relationship'];
    $national = $_POST['national'];


    $sql = "SELECT * FROM patients_details WHERE name = '$name'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
    $count = mysqli_num_rows($run);

    $sql1 = "INSERT INTO patients_details(name, number, DOB, gender, kin, kin_number, national_id, kin_relationship, residence, occupation, marital, insurance_type, insurance_number) VALUES('$name', '$number', '$dob', '$gender', '$kin', '$kin_number', '$national', '$relationship', '$residence', '$occupation', '$marital' , '$insurance', '$insurance_number')";


    if($count > 0){
        ?>
        <script>
            alert('A patient is already registered in the system with the same name0');
        </script>
        <?php
    }else{
        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Patient Details Recorded');
                window.location = 'secretary.php';
            </script>
            <?php
        }else{
            ?>
            <script>
            alert('Server Error. Retry');
            window.location = 'secretary.php';
            </script>
            <?php
        }
    }
}


?>