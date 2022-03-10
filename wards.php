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

    <title>Hospital ERP - Ward Duty</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
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
<?php 
if(isset($_GET['checkin_id'])){
    $edit_id = $_GET['checkin_id'];
    $sessionID = $_GET['session_id'];
    
    $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $rows4 = mysqli_fetch_assoc($run4);
    ?>
    <br>
       <div class='well well-sm' id='ribbon'><h3>Record Patient's And Ward Details</h3></div>
       <br>
       <div class='tabs'>

        <div class='details_form1'>
            <div class='form1'>
                    <h3>Patient's Name:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['name'];?></h4>
                    <h3>Date of Birth:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['DOB'];?></h4>
                    <h3>Age:</h3>
                    <h4 style='color: orange;'><?php $dob = (string)$rows4['DOB']; $dob = $dob[0].$dob[1].$dob[2].$dob[3]; $date = date('Y'); echo $age = $date - $dob;?></h4>
                    <h3>Gender:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['gender'];?></h4>
                    <h3>Phone Number:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['number'];?></h4>
                    <label>Ward Number: (e.g Ward 7)</label>
                    <br>
                    <input type="text" class='form-control' name='ward_number' required='yes'>
                    <br>
                    <label>Bed Number:</label>
                    <br>
                    <input type="text" class='form-control'  name='bed_number' >
                    <br>
                    <form class='form-group' id='patients_form' method='post'>
                    
            </div>
            <div class='form1'>
                <label>Patients' Condition:</label>
                <textarea style="background-color: white;color:black;" required='yes' name="condition" rows="6" cols="40"></textarea>
                <br>
                <label>Procedures Done: (Operations)</label>
                <textarea style="background-color: white;color:black;" name="procedures" rows="6" cols="40"></textarea>
                <br>
                <label>Medicine Administered:</label>
                <textarea style="background-color: white;color:black;" name="drugs" rows="6" cols="40"></textarea>
                <br>
                <label>Date:</label>
                <br>
                <input type="datetime-local" class='form-control'  name='date' >
                <br>
                <input type="hidden" value="<?php echo $_GET['session_id'] ?>" name="session_details"></p>
                <input type="hidden" value="<?php echo $_GET['checkin_id'] ?>" name="checkin_details"></p>
                <input type='submit' value='Admit Patient' class='btn btn-danger' name='admit'>
                <br><br><br>
            </form>
            </div>
           
       </div>
       <br><br>
    <?php
}else if(isset($_GET['checkout_id'])){
    $edit_id = $_GET['checkout_id'];
    $sessionID = $_GET['session_id'];
    
    $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $rows4 = mysqli_fetch_assoc($run4);

    $sql3 = "SELECT * FROM wards WHERE status = 'open' AND patient_id = '$edit_id'";
    $run3= mysqli_query($conn, $sql3);
    $rows3 = mysqli_fetch_assoc($run3);

    ?>
    <br>
       <div class='well well-sm' id='ribbon'><h3>Record Patient's And Ward Details</h3></div>
       <br>
       <div class='tabs'>

        <div class='details_form1'>
            <div class='form1'>
                    <h3>Patient's Name:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['name'];?></h4>
                    <h3>Date of Birth:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['DOB'];?></h4>
                    <h3>Age:</h3>
                    <h4 style='color: orange;'><?php $dob = (string)$rows4['DOB']; $dob = $dob[0].$dob[1].$dob[2].$dob[3]; $date = date('Y'); echo $age = $date - $dob;?></h4>
                    <h3>Gender:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['gender'];?></h4>
                    <h3>Phone Number:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['number'];?></h4>
                    <h3>Date of Admission:</h3>
                    <h4 style='color: orange;'><?php echo $rows3['admission_date'];?></h4>
                    <br>   
            </div>
            <div class='form1'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Patients' Condition:</label>
                <textarea style="background-color: white;color:black;" required='yes' name="condition" rows="6" cols="40"><?php echo $rows3['patient_condition'];?></textarea>
                <br>
                <label>Procedures Done: (Operations)</label>
                <textarea style="background-color: white;color:black;" name="procedures" rows="6" cols="40"><?php echo $rows3['procedures_done'];?></textarea>
                <br>
                <label>Medicine Administered:</label>
                <textarea style="background-color: white;color:black;" name="drugs" rows="6" cols="40"><?php echo $rows3['drugs_given'];?></textarea>
                <br>
                <label>Date:</label>
                <br>
                <input type="datetime-local" class='form-control'  name='date' required='yes' >
                <br>
                <input type="hidden" value="<?php echo $_GET['session_id'] ?>" name="session_details"></p>
                <input type="hidden" value="<?php echo $_GET['checkout_id'] ?>" name="checkout_details"></p>
                <input type='submit' value='Check Out Patient' class='btn btn-success' name='checkout'>
                <br><br><br>
            </form>
            </div>
           
       </div>
       <br><br>
    <?php
}else if(isset($_GET['checkout'])){ ?>
    <br>
           <div class='well well-sm' id='ribbon'><h3>Check Out Patients From Wards</h3></div>
           <br>
           <div class='tabs'>
               
        <div class='patients_table'>
        <center><h3>Patients In Wards</h3></center>
                        <div class="table-responsive">  
                         <table id="patients_data" class="table table-bordered">  
                              <thead class='thead-dark'>  
                                   <tr>  
                                        <td>Name</td>  
                                        <td>Gender</td>  
                                        <td>Ward Number</td>
                                        <td>Bed Number</td>
                                        <td>Admission Date</td> 
                                        <td></td>
                                   </tr>  
                              </thead>  
                              <?php  
                              $sql3 = "SELECT * FROM wards WHERE status = 'open' ";
    
                              $result= mysqli_query($conn, $sql3);
                              while($row = mysqli_fetch_array($result))  
                              { 
                                $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$row[patient_id]' ";
                                $run4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_assoc($run4);
                                

                                echo "
                                   <tr>  
                                        <td>".$row4['name']."</td>   
                                        <td>".$row4['gender']."</td> 
                                        <td>".$row['ward_number']."</td>
                                        <td>".$row['bed_number']."</td>
                                        <td>".$row['admission_date']."</td>   
                                        <td><a href='wards.php?checkout_id=$row[patient_id]&session_id=$row[session_id]' style='color: white;'class='btn btn-warning'>Check-Out Patient</a></td>
                                   </tr>  
                                   ";  
                                   
                              }  
                              ?>  
                         </table>  
                    </div> 
           </div>
    <?php }else{ ?>
<br>
       <div class='well well-sm' id='ribbon'><h3>Check-In AND checkout Patients To Wards</h3></div>
       <br>
        <a href='wards.php?checkout'' style='margin-left: 70%;' class='btn btn-primary'>Check-Out Patients From Ward</a>
       <br>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
                    <div class="table-responsive" >  
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
                          WHERE sessions.status = 'open'
                          ORDER BY sessions.date ASC
                          ";

                          //$sql3 = "SELECT * FROM patients_details";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $sql4 = "SELECT * FROM wards WHERE patient_id = '$row[patient_id]' AND status = 'open' ";
                            $run4 = mysqli_query($conn, $sql4);
                            $count = mysqli_num_rows($run4);

                            if($count > 0 ){

                            }else{
                                echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td>  
                                    <td><a href='wards.php?checkin_id=$row[patient_id]&session_id=$row[session_id]' style='color: white;'class='btn btn-danger'>Check-In Patient To ward</a></td>
                               </tr>  
                               ";  
                            }
                               
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
if(isset($_POST['admit'])){
    $ward_number = $_POST['ward_number'];
    $bed_number = $_POST['bed_number'];
    $patients_condition = $_POST['condition'];
    $drugs = $_POST['drugs'];
    $procedures = $_POST['procedures'];
    $date = $_POST['date'];

    $patient_id = $_POST['checkin_details']; 
    $session_id = $_POST['session_details']; 

    $username = $_SESSION['username'];

    $sql1 = "INSERT INTO wards(patient_id, session_id, ward_number, bed_number, patient_condition, drugs_given, procedures_done, admitted_by, admission_date, checked_out_by, check_out_date, status) VALUES('$patient_id', '$session_id', '$ward_number', '$bed_number', '$patients_condition', '$drugs', '$procedures', '$username', '$date' , '', '', 'open')";

        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Patient Has been Admitted');
                window.location = 'wards.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Server Error. Retry');
               window.location = 'wards.php';
            </script>
            <?php
        }
}
if(isset($_POST['checkout'])){

   echo $procedures = $_POST['procedures'];
    $drugs = $_POST['drugs'];
    $patients_condition = $_POST['condition'];
    $date = $_POST['date'];

    $patient_id = $_POST['checkout_details']; 
    $session_id = $_POST['session_details']; 

    $username = $_SESSION['username'];

    $sql1 = "UPDATE wards SET procedures_done = '$procedures', drugs_given='$drugs', patient_condition = '$patients_condition', check_out_date = '$date', checked_out_by = '$username' ,status = 'closed' WHERE patient_id = '$patient_id' AND session_id = '$session_id' ";

        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Patient Has been Checked Out');
                window.location = 'wards.php';
            </script>
            <?php
        }else{
            ?>
            <script>
              alert('Server Error. Retry');
              window.location = 'wards.php';
            </script>
            <?php
        }
}

?>

