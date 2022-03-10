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
  
       <div class='well well-sm' id='ribbon'><h3>End Patient's Session</h3></div>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
        <center><h3>List of Patients With Ongoing Sessions</h3></center>
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
                          $sql3 = "SELECT * FROM sessions WHERE status = 'open' ORDER BY date DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))
                          {  

                            $sql5 = "SELECT * FROM patients_details WHERE patient_id = '$row[patient_id]'";
                            $result5= mysqli_query($conn, $sql5);
                            $row5 = mysqli_fetch_array($result5);

                               echo "
                               <tr>  
                                    <td>".$row5['name']."</td>  
                                    <td>".$row5['number']."</td>  
                                    <td>".$row5['DOB']."</td>  
                                    <td>".$row5['gender']."</td>  
                                    <td>".$row5['kin']."</td>
                                    <td>".$row5['kin_number']."</td>
                                    <td>".$row5['regDate']."</td>
                                    <td><a href='sessions.php?edit_id=$row[session_id]' style='color: white;'class='btn btn-primary'>End Session</a></td>    
                               </tr>  
                               ";  
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
if(isset($_GET['edit_id'])){ 
    $sql = "UPDATE sessions SET status = 'closed' WHERE session_id = '$_GET[edit_id]'";

    if(mysqli_query($conn, $sql)){?>
        <script>alert('Session Has Been Ended'); window.location='sessions.php';</script>
    <?php
    }else{
        ?>
        <script>alert('Server Error. Try Again'); window.location='sessions.php';</script>
    <?php
    }
}
?>