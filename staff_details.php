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

    <link rel='stylesheet' href='style9.css'>

    <title>Hospital ERP</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='admin.php'>Home</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'>Administrator Tab</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>
       
<?php
if(isset($_GET['add_member'])){
?>
<button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='admin.php';
      }
      </script> 
      <br>
       <br>
<div class='well well-sm' id='ribbon'><h3>Add New Staff Member</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Staff Name:</label>
                <input type='text' class='form-control' placeholder='Name' name='name' required='yes'>
                <br>
                <label>Email:</label>
                <input type='email' class='form-control' placeholder='e.g ben@gmail.com' name='email' >
                <br>
                <label>Phone Number:</label>
                <input type='text' class='form-control' placeholder='e.g 07845524521' name='number' >
                <br>
                <label>National ID Number:</label>
                <input type='text' class='form-control' placeholder='National ID' name='national_id' required='yes'>
                <br>
                <label>Role:</label>
                <select class='form-control' name='role' required='yes'>
                    <option></option>
                    <option value='secretary'>Receptionist</option>
                    <option value='nurse'>Nurse</option>
                    <option value='doctor'>Doctor</option>
                    <option value='pharmacist'>Pharmacist</option>
                    <option value='lab'>Lab Technician</option>
                    <option value='store'>Store Keeper</option>
                    <option value='admin'>Administrator</option>
                    <option value='support Staff'>Support Staff</option>
                </select>
                <br>
                <label>Specialization (e.g Dematologist):</label>
                <input class='form-control' type="text" list="specialization" name='specialization'>
                <datalist id="specialization" name='specialization'>
                <option value = 'General Physician' >General Physician</option>
                <option value = 'Dermatologist' >Dermatologist</option>
                <option value = 'Dentist'>Dentist</option>
                <option value = 'ENT Specialist' >ENT Specialist</option>
                <option value = 'Bones'>Bones</option>
                <option value = 'Gynecologist'>Gynecologist</option>
                <option value = 'Homeopath'>Homeopath</option>
                <option value = 'Homeopath'>Other</option>
                </datalist>
                <br>
                <label>Assign Password:</label>
                <br>
                <input type="password" class='form-control' Placeholder='Password' name='password' required='yes'>
                <br>
                <label>Repeat Password:</label>
                <br>
                <input type="password" class='form-control' Placeholder='Confirm Password' name='conf_pass' required='yes'>
                <br>
                <input type='submit' value='Save Details' class='btn btn-danger' name='save_new'>
            </form>
       </div>
       </div>


<?php }else if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sql4 = "SELECT * FROM users WHERE user_id = '$edit_id'";
    $run4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($run4);
?>
<button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='admin.php';
      }
      </script> 
      <br>
       <br>
<div class='well well-sm' id='ribbon'><h3>Edit Staff Member Details</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <label>Staff Name:</label>
                <input type='text' class='form-control' Value='<?php echo $row4['username']?>' name='name' required='yes'>
                <br>
                <label>Email:</label>
                <input type='email' class='form-control' Value='<?php echo $row4['email']?>' name='email' >
                <br>
                <label>Phone Number:</label>
                <input type='text' class='form-control' Value='<?php echo $row4['number']?>' name='number' >
                <br>
                <label>National ID Number:</label>
                <input type='text' class='form-control' Value='<?php echo $row4['id_number']?>' name='national_id' required='yes'>
                <br>
                <label>Role:</label>
                <select class='form-control' name='role' required='yes'>
                    <option Value='<?php echo $row4['role']?>'><?php echo $row4['role']?></option>
                    <option value='secretary'>Receptionist</option>
                    <option value='nurse'>Nurse</option>
                    <option value='doctor'>Doctor</option>
                    <option value='pharmacist'>Pharmacist</option>
                    <option value='lab'>Lab Technician</option>
                    <option value='store'>Store Keeper</option>
                    <option value='admin'>Administrator</option>
                    <option value='support Staff'>Support Staff</option>
                </select>
                <br>
                <label>Specialization (e.g Dematologist):</label>
                <input class='form-control' type="text" list="specialization" Value='<?php echo $row4['specialty']?>' name='specialization'>
                <datalist id="specialization" name='specialization'>
                <option value = 'General Physician' >General Physician</option>
                <option value = 'Dermatologist' >Dermatologist</option>
                <option value = 'Dentist'>Dentist</option>
                <option value = 'ENT Specialist' >ENT Specialist</option>
                <option value = 'Bones'>Bones</option>
                <option value = 'Gynecologist'>Gynecologist</option>
                <option value = 'Homeopath'>Homeopath</option>
                <option value = 'Homeopath'>Other</option>
                </datalist>
                <br>
                <input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_details"></p>
                <input type='submit' value='Save Details' class='btn btn-danger' name='edit'>
            </form>
       </div>
       </div>


<?php }else if(isset($_GET['change_id'])){
    $change_id = $_GET['change_id'];
    $sql4 = "SELECT * FROM users WHERE user_id = '$change_id'";
    $run4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($run4);
?>
<button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.location='admin.php';
      }
      </script> 
      <br>
       <br>
<div class='well well-sm' id='ribbon'><h3>Change Password For Staff Member</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
                <div style='color: yellow;'>User Requesting Change: <h4 style='color: orange;'><?php echo $row4['username'];?></h4></div>
                <br>
                <label>New Password:</label>
                <br>
                <input type="password" class='form-control' Placeholder='New Password' name='password' required='yes'>
                <br>
                <label>Repeat Password:</label>
                <br>
                <input type="password" class='form-control' Placeholder='Confirm Password' name='conf_pass' required='yes'>
                <br>
                <input type="hidden" value="<?php echo $_GET['change_id'] ?>" name="change_details"></p>
                <input type='submit' value='Reset Password' class='btn btn-danger' name='change'>
            </form>
       </div>
       </div>


<?php }else{
    ?>
    <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
        window.history.back();
      }
      </script> 
      <br>
       <br>
    <div class='well well-sm' id='ribbon'><h3>Staff Details</h3></div>
       <br>
       
       <div class='tabs'>
           
    <div class='patients_table1'>
                    <div class="table-responsive"> 
                    <a href='staff_details.php?add_member' style = 'margin-left: 70%; margin-bottom: 2%;' class='btn btn-success'>Add New Staff Member</a>
                     <table id="patients_data" class="table table-bordered">  
                          <thead class='thead-dark'>  
                               <tr>  
                                    <td>Username</td>  
                                    <td>Email</td>
                                    <td>National ID No.</td>
                                    <td>Phone Number</td>  
                                    <td>Role</td>  
                                    <td>Specialization</td>  
                                    <td>Registration Date</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                               </tr>  
                          </thead>  
                          <?php

                         $sql3 = "SELECT * FROM users ORDER BY regDate DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                                echo "
                               <tr>  
                                    <td>".$row['username']."</td>  
                                    <td>".$row['email']."</td>
                                    <td>".$row['id_number']."</td>
                                    <td>".$row['number']."</td>  
                                    <td>".$row['role']."</td>  
                                    <td>".$row['specialty']."</td>  
                                    <td>".$row['regDate']."</td>
                                    <td><a href='staff_details.php?edit_id=$row[user_id]' style='color: white;'class='btn btn-primary'>Edit Details</a></td> 
                                    <td><a href='staff_details.php?change_id=$row[user_id]' style='color: black;'class='btn btn-warning'>Change Password</a></td>
                                    <td><a href='staff_details.php?delete_id=$row[user_id]' style='color: black;'class='btn btn-danger'>Delete</a></td>     
                               </tr>  
                               "; 
                          }  
                          ?>  
                     </table>  
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
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $del_sql = "DELETE FROM users WHERE user_id = '$delete_id'";
    if(mysqli_query($conn, $del_sql)){
        ?>
        <script>alert("Deleted"); window.location="staff_details.php";</script>
        <?php
    }else{
        ?>
        <script>alert("Server Error"); window.location="staff_details.php";</script>
        <?php 
    }
}

if(isset($_POST['save_new'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $national_id = $_POST['national_id'];
    $role = $_POST['role'];
    $specialization = $_POST['specialization'];
    $password = $_POST['password'];
    $conf_pass = $_POST['conf_pass'];

    $date = date('Y-m-d');

    $sql2 = "SELECT * FROM users WHERE email = '$email'";
    $run2 = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($run2);

    if($count>0){
        ?>
        <script>alert('A user is registered with this email');window.location='staff_details.php?add_member'</script>
        <?php
    }else{
        $sql3 = "INSERT INTO users(email, username, id_number, number,role, specialty, password, regDate) VALUES('$email','$name','$national_id','$number','$role', '$specialization','$password', '$date')";

        if($password == $conf_pass){
            if(mysqli_query($conn, $sql3)){
                ?>
                <script>alert('Details Saved');window.location='staff_details.php?add_member'</script>
                <?php
            }else{ ?>
            <script>alert('Server Error. Retry');window.location='staff_details.php?add_member'</script> 
        <?php }

        }else{
            ?>
            <script>alert('Password Does Not Match. Retry');window.location='staff_details.php?add_member'</script>
            <?php
        }

    }

    
}


if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $national_id = $_POST['national_id'];
    $role = $_POST['role'];
    $specialization = $_POST['specialization'];

    $edit_id = $_POST['edit_details'];

        $sql3 = "UPDATE users SET email='$email', username = '$name', id_number = '$national_id', number='$number', role = '$role', specialty = '$specialization' WHERE user_id = '$edit_id'";

            if(mysqli_query($conn, $sql3)){
                ?>
                <script>alert('Details Updated');window.location='staff_details.php'</script>
                <?php
            }else{ ?>
            <script>alert('Server Error. Retry');window.location='staff_details.php'</script> 
        <?php }
}


if(isset($_POST['change'])){

    $password = $_POST['password'];
    $conf_pass = $_POST['conf_pass'];

    $edit_id = $_POST['change_details'];

        $sql3 = "UPDATE users SET password='$password' WHERE user_id = '$edit_id'";

        if($password == $conf_pass){
            if(mysqli_query($conn, $sql3)){
                ?>
                <script>alert('Details Updated');window.location='staff_details.php'</script>
                <?php
            }else{ ?>
            <script>alert('Server Error. Retry');window.location='staff_details.php'</script> 
        <?php }

        }else{
            ?>
            <script>alert('Password Does Not Match. Retry');window.location='staff_details.php'</script>
            <?php
        }
            
}

       

?>
