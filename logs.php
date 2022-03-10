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

    <title>Hospital ERP - Admin</title>
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
       <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
    <script>
      function goBack() {
      window.history.back();
      }
      </script> 
      <br>
       <br>

       <div class='well well-sm' id='ribbon'><h3>Staff Login Logs</h3></div>
       <br>
       <div class='tabs'>
    <div class='patients_table'>
                    <div class="table-responsive">  
                     <table id="patients_data" class="table table-bordered">  
                          <thead class='thead-dark'>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Role</td>  
                                    <td>Logged in At: (Date and Time)</td>  
                               </tr>  
                          </thead>  
                          <?php

                         $sql3 = "SELECT * FROM staff_logs ORDER BY date DESC";
                          $result= mysqli_query($conn, $sql3);
                          while($row = mysqli_fetch_array($result))  
                          {  
                              
                                echo "
                               <tr>  
                                    <td>".$row['username']."</td>  
                                    <td>".$row['role']."</td>  
                                    <td>".$row['date']."</td>   
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