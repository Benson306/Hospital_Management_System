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
               <li><a href='patients_details.php'>Record Patients Details</a></li>
               <li><a href='appointments.php'>Book Appointment</a></li>
               <li><a href='sessions.php'>End Patient's Session</a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>

       

<?php 
if(isset($_GET['view'])){?>
<button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.history.back();
      }
      </script> 
      <br>
       <br>
<div class='well well-sm' id='ribbon'><h3>Booked Appointments</h3></div>
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
                                    <td></td>
                                    <td></td>
                               </tr>  
                          </thead>  
                          <?php  
                          $sql3 = "SELECT * FROM appointments ORDER BY date DESC";
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
                                    <td><a href='appointments.php?edit_id=$row[appointment_id]' style='color: white;'class='btn btn-primary'>Edit</a></td>
                                    <td><a href='appointments.php?delete_id=$row[appointment_id]' style='color: white;'class='btn btn-danger'>Delete</a></td>
                               </tr>  
                               ";  
                          }  
                          ?>  
                     </table>  
                </div> 
       </div>

<?php }else if(isset($_GET['edit_id'])){
    $sql5 = "SELECT * FROM appointments WHERE appointment_id = '$_GET[edit_id]'";
    $result= mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result);

    ?>
    <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='secretary.php';
      }
      </script> 
      <br>
       <br>
    <div class='well well-sm' id='ribbon'><h3>Edit Booked</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Full Patients Name:</label>
                <input type='text' class='form-control' value='<?php echo $row5['patient_name']; ?>' name='name' required='yes'>
                <br>
                <label>Tel Number:</label>
                <input type='text' class='form-control' value='<?php echo $row5['phone_number']; ?>'  name='number' required='yes'>
                <br>
                <label>Doctor/Nurse Needed:</label>
                <input class='form-control' type="text" value='<?php echo $row5['doc']; ?>' list="doc" name='doc'>
                <datalist id="doc" name='doc'>
                    <?php  
                            $sql3 = "SELECT username FROM users";
                            $result= mysqli_query($conn, $sql3);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<option value='$row[username]'>$row[username]</option>";
                            }
                        ?>
                </datalist>
                <br>
                <label>Service That They Need:</label>
                <br>
                <textarea style="background-color: white;color:black;" required='yes' name="service" rows="6" cols="103"><?php echo $row5['service']; ?></textarea>
                <br>
                <label>Date:</label>
                <input type='date' class='form-control' placeholder='D.O.B' value='<?php echo $row5['date']; ?>' name='date' required='yes'>
                <br>
                <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_details"></p>
                <input type='submit' value='Update Details' class='btn btn-success' name='edit'>
            </form>
       </div>
       </div>
       <br><br>
        </div>
    <?
}else{
    ?>
    <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.history.back();
      }
      </script> 
      <br>
       <br>
    <div class='well well-sm' id='ribbon'><h3>Book Appointment</h3></div>
       <a href='appointments.php?view' class='btn btn-primary' style='margin-left: 65%;'>View Booked Appointments</a>
       <br><br>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Full Patients Name:</label>
                <input type='text' class='form-control' placeholder='Name' name='name' required='yes'>
                <br>
                <label>Tel Number:</label>
                <input type='text' class='form-control' placeholder='Tel Number' name='number' required='yes'>
                <br>
                <label>Doctor/Nurse Needed:</label>
                <input class='form-control' type="text" list="doc" name='doc'>
                <datalist id="doc" name='doc'>
                    <?php  
                            $sql3 = "SELECT username FROM users";
                            $result= mysqli_query($conn, $sql3);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<option value='$row[username]'>$row[username]</option>";
                            }
                        ?>
                </datalist>
                <br>
                <label>Service That They Need:</label>
                <br>
                <textarea style="background-color: white;color:black;" required='yes' name="service" rows="6" cols="103"></textarea>
                <br>
                <label>Date:</label>
                <input type='date' class='form-control' placeholder='D.O.B' name='date' required='yes'>
                <br>
                <input type='submit' value='Save Details' class='btn btn-danger' name='book'>
            </form>
       </div>
       </div>
       <br><br>
        </div>
    
    
    <?php
}
?>
 

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
$(document).ready(function(){
setInterval(function(){
    $(" #patients_data").load(" #patients_data > *");
}, 5000);
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
if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $doc = $_POST['doc'];
    $service = $_POST['service'];
    $date = $_POST['date'];

    $edit_id = $_POST['edit_details'];

    $sql1 = "UPDATE appointments SET patient_name ='$name', phone_number ='$number', doc = '$doc', service = '$service', date = '$date' WHERE appointment_id = '$edit_id'";


        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Appointment Details Updated');
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

if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $del_sql = "DELETE FROM appointments WHERE appointment_id = '$delete_id'";
    if(mysqli_query($conn, $del_sql)){
        ?>
        <script>alert("Deleted"); window.location="secretary.php";</script>
        <?php
    }else{
        ?>
        <script>alert("Server Error"); window.location="secretary.php";</script>
        <?php 
    }
}
?>