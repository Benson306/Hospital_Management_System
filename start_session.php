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

       <div class='well well-sm' id='ribbon'><h3>Start Patient's Session</h3></div>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
                    <div class="table-responsive">  
                     <table id="patients_data" class="table table-bordered">  
                          <thead class='thead-dark'>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Phone Number</td>  
                                    <td>D.O.B</td>  
                                    <td>Gender</td>  
                                    <td>Next of Kin</td>
                                    <td>Next of Kin's Number</td>
                                    <td>Date of Registration</td>
                                    <td></td>
                               </tr>  
                          </thead>  
                          <?php

                         $sql3 = "SELECT * FROM patients_details ORDER BY regDate DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                              $pid = $row['patient_id'];
                            $sql3 = "SELECT * FROM sessions WHERE patient_id = '$pid' AND status = 'open' ";
                            $run = mysqli_query($conn, $sql3);
                            $c = mysqli_num_rows($run);

                            if($c>0){
                                echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['number']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td>  
                                    <td>".$row['kin']."</td>
                                    <td>".$row['kin_number']."</td>
                                    <td>".$row['regDate']."</td>

                                    <td style='color: yellow;'>Ongoing Session</td>    
                               </tr>  
                               "; 
                            }else{
                                echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['number']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td>  
                                    <td>".$row['kin']."</td>
                                    <td>".$row['kin_number']."</td>
                                    <td>".$row['regDate']."</td>

                                    <td><a href='start_session.php?session_id=$row[patient_id]' style='color: black;'class='btn btn-warning'>Start Session</a></td>    
                               </tr>  
                               "; 
                            }
                                
                          }  
                          ?>  
                     </table>  
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
</script>
<script>  
 $(document).ready(function(){  
       
      
 }); 
 </script>

    <?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>
<?php 
if(isset($_GET['session_id'])){
    $patient_id = $_GET['session_id'];

    $sql2 = "SELECT * FROM sessions WHERE patient_id = '$patient_id' AND status = 'open'";
    $run2 = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($run2);

    if($count > 0){
        ?>
            <script>
                alert('Patient Already Has an Ongoing Session. Terminate Session To start Another Session');
                window.location = 'start_session.php';
            </script>
            <?php
    }else{
        $sql1 = "INSERT INTO sessions (patient_id, oxygen_saturation, pressure, heart_rate, weight, temp, nurse_check, symptoms, differential_diagnosis,lab_request,test_types, lab_results_out,lab_test_done,lab_results, diagnosis, prescription, procedures, referal, doctor_check, doctor_attending, drugs_given, unavailable_drugs, consultation_fee, medicine_fee, lab_fee, procedures_fee, next_checkup, status) VALUES ('$patient_id', '', '', '', '', '', 0, '', '', '', '', '', '' , '', '', '','', '', '', '', '', '', '', '', '', '', '', 'open')";

   // $sql1 = "UPDATE patients_details SET name = '$name', number='$number', DOB = '$dob', gender='$gender', kin='$kin', kin_number='$kin_number' WHERE patient_id = '$edit_id'";
        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Session Has been Started');
                window.location = 'start_session.php';
            </script>
            <?php
        }else{
            ?>
            <script>
               alert('Server Error. Retry');
            window.location = 'start_session.php';
            </script>
            <?php
        }
    }

    


        
}

?>
