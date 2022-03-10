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

    <link rel='stylesheet' href='style7.css'>

    <title>Hospital ERP - Pharma Duty</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='#'></a></li>
                <li><a href='pharmacy.php'>Home</a></li>
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
      window.history.back()
      }
      </script> 
       <br>
<?php 
if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sessionID = $_GET['session_id'];
    
    $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $rows4 = mysqli_fetch_assoc($run4);

    $sql5 = "SELECT * FROM sessions WHERE session_id = '$sessionID'";
    $run5 = mysqli_query($conn, $sql5);
    $rows5 = mysqli_fetch_assoc($run5);
    ?>
    <br>
       <div class='well well-sm' id='ribbon'><h5>Dispense Drugs</h5></div>
       <div class='tabs'>

        <div class='details_form2'>
                <table class="table table-condensed table-bordered">
                <tr>
                        <td colspan='1'><h4>Patient's Name:</h3></td>
                        <td colspan='3'><h4 style='color: orange;'><?php echo $rows4['name'];?></h4></td>
                        
                    </tr>
                    <tr>
                        <td><h4>Date of Birth:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows4['DOB'];?></h4></td>
                        <td><h4>Age:</h4></td>
                        <td><h4 style='color: orange;'><?php $dob = (string)$rows4['DOB']; $dob = $dob[0].$dob[1].$dob[2].$dob[3]; $date = date('Y'); echo $age = $date - $dob;?></h4></td>
                                               
                    </tr>
                    <tr>
                        <td><h4>Gender:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows4['gender'];?></h4></td> 
                        <td><h4>Body Temperature:</h3></td>
                        <td><h4 style='color: orange;'><?php echo $rows5['temp'];?> °C</h4></td> 
                    </tr>
                    <tr>
                        <td><h4>Weight:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows5['weight'];?> kg</h4></td>
                        <td><h4>Blood Pressure:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows5['pressure'];?> mmHg</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Heart Rate:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows5['heart_rate'];?> bpm</h4></td>
                        <td><h4>Oxygen Saturation:</h4></td>
                        <td><h4 style='color: orange;'><?php echo $rows5['oxygen_saturation'];?> %</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Symptoms:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['symptoms']);?></h4></td>
                        <td><h4>Procedures Done:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['procedures']);?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Lab Tests Requested:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['test_types']);?></h4></td>
                        <td><h4>Lab Tests Done:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['lab_test_done']);?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Lab Results:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['lab_results']);?></h4></td>
                        <td><h4>Diagnosis:</h4></td>
                        <td><h4 style='color: orange;'><?php echo nl2br($rows5['diagnosis']);?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Prescription:</h4></td>
                        <td colspan='3'><h4 style='color: orange;'><?php echo nl2br($rows5['prescription']); ?></h4></td>
                    </tr>

                </table>
                <div style='margin-left: 75%;'>
                    <a href='patient_report.php?patientPDF_id=<?php echo $rows5['patient_id']?>' class='btn btn-primary'>Check Patient's Previous Records</a>
                </div>
                <hr>
                <h5 style='color: yellow;'>Fill in the Following Form as you Administer to the patient:</h5>
                <br>
                <div class='doctor_form'>
                    
                        <div class='doc'>
                        <form class='form-group' method='post'>
                            <label>Drugs Issued:</label>
                            <br>
                            <textarea style="background-color: white;color:black;"  name="issued" rows="6" cols="50" ></textarea>
                        </div>
                        <div class='doc'>
                            <label>Drugs Not Available:</label>
                            <br>
                            <textarea style="background-color: white;color:black;" name="unavailable" rows="6" cols="50"></textarea>
                            <br>
                        </div>
                </div>
                <br>
                <div class='buttons' style='display: flex; margin-left: 5%;'>
                            <input type="hidden" value="<?php echo $_GET['session_id'] ?>" name="edit_details"></p>
                            <input type='submit' value='Save Details' style ='margin-left:30%; width: 40%; color: black;' class='btn btn-danger' name='submitEdit'>
                </div>
                            
                </form>
                
           
       </div>
       <br><br>
       <br><br>
    <?php
}else{ ?>
<br>
       <div class='well well-sm' id='ribbon'><h3>Pharmaceutical Desk - Dispense Drugs</h3></div>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
                    <div class="table-responsive">  
                     <table id="patients_data" class="table table-bordered">  
                          <thead class='thead-dark'>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>D.O.B</td>  
                                    <td>Gender</td>
                                    <td></td>
                               </tr>  
                          </thead>  
                          <?php  
                          $sql3 = "SELECT *
                          FROM patients_details
                          LEFT JOIN sessions
                          ON patients_details.patient_id = sessions.patient_id
                          WHERE sessions.status = 'open' AND sessions.nurse_check = 1 AND sessions.doctor_check = 'on' AND sessions.prescription != '' AND sessions.drugs_given = ''
                          ORDER BY sessions.date ASC
                          ";

                          //$sql3 = "SELECT * FROM patients_details";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                              if($row['lab_request'] == 'on'){
                                  $waiting = "<div style='color: yellow;'>Awaiting Lab Test Results</div>";
                              }else{ 
                                  if($row['lab_results_out'] == 'on'){
                                    $waiting = "<div style='color: red;'>Lab Test Results Are Out</div>";
                                  }else{
                                    $waiting = '';
                                  }
                                  
                              }
                               echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td> 
                                    <td><a href='pharmacy.php?edit_id=$row[patient_id]&session_id=$row[session_id]' style='color: white;'class='btn btn-primary'>Attend To Patient</a></td>
                                    ";         
                          }  
                          ?>  
                     </table>  
                </div> 
       </div>
<?php }
?>
       
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
if(isset($_POST['submitEdit'])){

    $username = $_SESSION['username'];
    $issued = $_POST['issued'];
    $unavailable = $_POST['unavailable'];

    $edit_details = $_POST['edit_details']; 

    $sql1 = "UPDATE sessions SET drugs_given = '$issued', unavailable_drugs='$unavailable' WHERE session_id = '$edit_details'";


        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Details Saved');
                window.location = 'pharmacy.php';
            </script>
            <?php
        }else{
            ?>
            <script>
              alert('Server Error. Retry');
             window.location = 'pharmacy.php';
            </script>
            <?php
        }
}

?>

