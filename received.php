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

    <title>Hospital ERP -store</title>
</head>
<body>
<div class='body'>
       <nav>
           <ul>
                <li><a href='store.php'>Home</a></li>
                <li><a href='#'></a></li>
               <li><a href='issued.php'>Issue Out Equipment/Drugs</a></li>
               <li><a href='#.php'>Receive In Equipment/Drugs</a></li>
               <li><a href='#'></a></li>
               <li><a href='#'></a></li>

               <li class='right'><a href="logout.php">Logout ( <?php echo $username;?> )</a></li>
           </ul>
       </nav>

     <!--  <button class="btn btn-danger" style='margin-left: 10%;' onclick="goBack()">Go Back</button>
        <script>
      function goBack() {
      window.history.back();
      }
      </script> -->
        <br>
       <br>
       <div class='well well-sm' id='ribbon'><h3>Record Equipments/Drugs That you Have Received:</h3></div>
       <div class='tabs'>
       <div class='details_form'>
            <form class='form-group' id='patients_form' method='post'>
            <label>Type of Item:</label>
                <select class='form-control' name='type' required='yes'>
                    <option></option>
                    <option value='Medicine'>Medicine</option>
                    <option value='Medical Equipment'>Medical Equipment</option>
                    <option value='Clothing'>Clothing</option>
                    <option value='Stationery'>Stationery</option>
                    <option value='Furniture'>Furniture</option>
                    <option value='Electronic'>Electronic</option>
                    <option value='Other Equipment'>Other Equipment</option>
                </select>
                <br>
                <label>Equipment Name/ Description:</label>
                <input type='text' class='form-control' placeholder='Name of Equipment/Medicine/Electronic/Stationery' name='name' required='yes'>
                <br>
                <label>Quantity:</label>
                <input type='text' class='form-control' placeholder='E.g 10 Boxes' name='quantity' required='yes'>
                <br>
                <label>Received From:</label>
                <input type='text' class='form-control' placeholder="Received From" name='receiver' required='yes'>
                <br>
                <label>Date:</label>
                <input type="date" class='form-control' name='date' required='yes'>
                <br>
                <input type='submit' value='Save Details' style='color: black;' class='btn btn-warning' name='submit'>
            </form>
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


    <?php

}else{
    ?>
    <script>alert('You are not Logged in'); window.location='index.php'</script>
    <?php
}
?>
<?php 
if(isset($_POST['submit'])){
    $username = $_SESSION['username'];

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $receiver = $_POST['receiver'];
    $date = $_POST['date'];


    $sql1 = "INSERT INTO store_received(name, quantity, type, received_from, received_by, issued_by, issued_to, date) VALUES('$name', '$quantity', '$type', '$receiver', '$username', '', '', '$date')";

        if(mysqli_query($conn, $sql1)){
            ?>
            <script>
                alert('Records Updated');
                window.location = 'received.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Server Error. Retry');
                window.location = 'received.php';
            </script>
            <?php
        }
}


?>