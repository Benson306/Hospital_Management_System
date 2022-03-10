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
       
      <br>
       <br>
<?php 
if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sql4 = "SELECT * FROM patients_details WHERE patient_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $rows4 = mysqli_fetch_assoc($run4);
    ?>
    <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='secretary.php';
      }
      </script> 
    <br>
       <div class='well well-sm' id='ribbon'><h3>Edit Patient's Details</h3></div>
       <br>
       <div class='tabs'>

        <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
            <label>Full Patients Name:</label>
                <input type='text' class='form-control' value='<?php echo $rows4['name'];?>' name='name' required='yes'>
                <br>
                <label>Date of Birth:</label>
                <input type='date' class='form-control' value='<?php echo $rows4['DOB'];?>' name='dob'required='yes'>
                <br>
                <label>Gender:</label>
                <select class='form-control' name='gender' required='yes'>
                    <option value='<?php echo $rows4['gender'];?>'><?php echo $rows4['gender'];?></option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
                <br>
                <label>Tel Number:</label>
                <input type='text' class='form-control' value='<?php echo $rows4['number'];?>' name='number' required='yes'>
                <br>
                <label>National ID Number:</label>
                <input type='text' class='form-control' value='<?php echo $rows4['national_id'];?>' name='national' required='yes'>
                <br>
                <label>Marital Status:</label>
                <select class='form-control' name='marital' required='yes'>
                    <option value='<?php echo $rows4['marital'];?>'><?php echo $rows4['marital'];?></option>
                    <option value='Single'>Single</option>
                    <option value='Married'>Married</option>
                </select>
                <label>Residence:</label>
                <input type='text' class='form-control' value='<?php echo $rows4['residence'];?>' name='residence' required='yes'>
                <br>
                <label>Occupation:</label>
                <input type='text' class='form-control' value='<?php echo $rows4['occupation'];?>' name='occupation'>
                <br>
                <label>Insurance Type:</label>
                <br>
                <input type="text" class='form-control' value='<?php echo $rows4['insurance_type'];?>' name='insurance' >
                <br>
                <label>Insurance Number:</label>
                <br>
                <input type="text" class='form-control' value='<?php echo $rows4['insurance_number'];?>' name='insurance_number' >
                <br>
                <label>Name of Next of Kin:</label>
                <br>
                <input type="text" class='form-control' value='<?php echo $rows4['kin'];?>' name='kin' >
                <br>
                <label>Relationship:</label>
                <br>
                <input type="text" class='form-control' value='<?php echo $rows4['kin_relationship'];?>' name='relationship' >
                <br>
                <label>Phone Number of Next of Kin:</label>
                <br>
                <input type="text" class='form-control' value='<?php echo $rows4['kin_number'];?>' name='kin_number' >
                <br>
                <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_details"></p>
                <input type='submit' value='Save Details' class='btn btn-danger' name='submitEdit'>
            </form>
       </div>
    <?php
}else{ ?>
<br>
<button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='secretary.php';
      }
      </script> 
       <div class='well well-sm' id='ribbon'><h3>Search Patient's Details</h3></div>
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
                                    <td></td>
                                    <td></td>
                               </tr>  
                          </thead>  
                          <?php  
                          $sql3 = "SELECT * FROM patients_details ORDER BY regDate DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "
                               <tr>  
                                    <td>".$row['name']."</td>  
                                    <td>".$row['number']."</td>  
                                    <td>".$row['DOB']."</td>  
                                    <td>".$row['gender']."</td>  
                                    <td>".$row['kin']."</td>
                                    <td>".$row['kin_number']."</td>
                                    <td>".$row['regDate']."</td>
                                    <td><a href='search_details.php?edit_id=$row[patient_id]' style='color: white;'class='btn btn-primary'>Edit</a></td>
                                    <td><a href='search_details.php?delete_id=$row[patient_id]' style='color: white;'class='btn btn-danger'>Delete</a></td>
                                    <td><a href='search_details.php?patientPDF_id=$row[patient_id]' style='color: white;'class='btn btn-success'>Generate Report</a></td>    
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

    $edit_id = $_POST['edit_details']; 

    $sql1 = "UPDATE patients_details SET name = '$name', number='$number', DOB = '$dob', gender='$gender', kin='$kin', kin_number='$kin_number' WHERE patient_id = '$edit_id'";

    $sql1 = "UPDATE patients_details SET name ='$name', number = '$number', DOB='$dob', gender='$gender', kin='$kin', kin_number='$kin_number', national_id ='$national', kin_relationship='$relationship', residence='$residence', occupation='$occupation', marital='$marital', insurance_type='$insurance', insurance_number='$insurance_number' WHERE patient_id = '$edit_id'";


        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Patient Details Have been Edited');
                window.location = 'search_details.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Server Error. Retry');
                window.location = 'search_details.php';
            </script>
            <?php
        }
}


if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $del_sql = "DELETE FROM patients_details WHERE patient_id = '$delete_id'";
    if(mysqli_query($conn, $del_sql)){
        ?>
        <script>alert("Deleted"); window.location="search_details.php";</script>
        <?php
    }else{
        ?>
        <script>alert("Server Error"); window.location="search_details.php";</script>
        <?php 
    }
}
?>
<?php
   
   if(isset($_GET['patientPDF_id'])){
       $patientPDF_id = $_GET['patientPDF_id'];
       $_SESSION['patientPDF_id']=$patientPDF_id; ?>
       <script>window.location="patientPDF.php"</script>
       <?php
   }
   
   ?>