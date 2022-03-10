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

    <title>Hospital ERP - Appointment</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='secretary.php'>Home</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>

       <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.history.back();
      }
      </script> 
      <br>
       <br>

<div class='well well-sm' id='ribbon'><h3>My Booked Appointments</h3></div>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
                    <div class="table-responsive">  
                     <table id="patients_data" class="table table-bordered">  
                          <thead class='thead-dark'>  
                               <tr>  
                                    <td>Patient's Name</td>  
                                    <td>Phone Number</td>  
                                    <td>Doctor Needed</td>  
                                    <td>Service Needed</td>  
                                    <td>Date</td>
                               </tr>  
                          </thead>  
                          <?php  
                          $sql3 = "SELECT * FROM appointments WHERE doc = '$username' ORDER BY date DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "
                               <tr>  
                                    <td>".$row['patient_name']."</td>  
                                    <td>".$row['phone_number']."</td>  
                                    <td>".$row['doc']."</td>  
                                    <td>".$row['service']."</td>  
                                    <td>".$row['date']."</td> 
                               </tr>  
                               ";  
                          }  
                          ?>  
                     </table>  
                </div> 
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
if(isset($_POST['book'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $doc = $_POST['doc'];
    $service = $_POST['service'];
    $date = $_POST['date'];



    $sql1 = "INSERT INTO appointments(patient_name, phone_number, doc, service, date) VALUES('$name', '$number', '$doc', '$service', '$date')";


        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Appointment Details Recorded');
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


?>