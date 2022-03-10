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

    <title>Hospital ERP - Nurse Duty</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='#'></a></li>
                <li><a href='nurse_dash.php'>Home</a></li>
                <li><a href='#'></a></li>
               <li><a href='nurse.php'>Record Patients Details</a></li>
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
if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sessionID = $_GET['session_id'];
    
    $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $rows4 = mysqli_fetch_assoc($run4);
    ?>
    <br>
       <div class='well well-sm' id='ribbon'><h3>Record Patient's Vitals</h3></div>
       <br>
       <div class='tabs'>

        <div class='details_form1'>
            <div class='form1'>
                    <h3>Patient's Name:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['name'];?></h4>
                    <h3>Date of Birth:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['DOB'];?></h4>
                    <h3>Gender:</h3>
                    <h4 style='color: orange;'><?php echo $rows4['gender'];?></h4>
                    <form class='form-group' id='patients_form' method='post'>
                
            </div>
            <div class='form1'>
                <label>Body Temperature: (°C)</label>
                <br>
                <input type="text" class='form-control' name='temp' required>
                <br>
                <label>Blood Pressure: (mmHg)</label>
                <br>
                <input type="text" class='form-control'  name='pressure' required> 
                <br>
                <label>Oxygen Saturation: (%)</label>
                <br>
                <input type="text" class='form-control'  name='saturation' >
                <br>
                <label>Heart Rate: (bpm)</label>
                <br>
                <input type="text" class='form-control'  name='rate'>
                <br>
                <label>Weight: (kg)</label>
                <br>
                <input type="text" class='form-control' name='weight' >
                <br>
                <input type="hidden" value="<?php echo $_GET['session_id'] ?>" name="edit_details"></p>
                <input type='submit' value='Save Details' class='btn btn-danger' name='submitEdit'>
            </form>
            </div>
           
       </div>
       <br><br>
    <?php
}else{ ?>
<br>
       <div class='well well-sm' id='ribbon'><h3>Nurse Desk - Record Patient's Vitals</h3></div>
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
                          WHERE sessions.status = 'open' AND sessions.nurse_check = 0
                          ORDER BY sessions.date ASC
                          ";

                          //$sql3 = "SELECT * FROM patients_details";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td>  
                                    <td><a href='nurse.php?edit_id=$row[patient_id]&session_id=$row[session_id]' style='color: white;'class='btn btn-primary'>Record Vitals</a></td>
                               </tr>  
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
    $temp = $_POST['temp'];
    $rate = $_POST['rate'];
    $pressure = $_POST['pressure'];
    $weight = $_POST['weight'];
    $saturation = $_POST['saturation'];

    $edit_details = $_POST['edit_details']; 

    $sql1 = "UPDATE sessions SET oxygen_saturation= '$saturation', heart_rate='$rate', pressure='$pressure', weight = '$weight', temp='$temp', nurse_check=1  WHERE session_id = '$edit_details'";


        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Patient Vitals Have been Recorded');
                window.location = 'nurse.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Server Error. Retry');
               window.location = 'nurse.php';
            </script>
            <?php
        }
}

?>

