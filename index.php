<?php
session_start();
require("connection.php");
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
    <link rel='stylesheet' href='style.css'>


    <title>Hospital ERP</title>
</head>
<body>
<div class='body'>
    <br>
        <form id='login' method='post' class='form-group'>
            <center><h2><img src='images/staff.png' width='50px' height='50px'>  Staff Login</h2></center>
            <br>
            <div class='notice'></div>
            <input type='text' class='form-control' placeholder='Email' name='email' required='yes'>
            <br>
            <input type='password' class='form-control' placeholder='Password' name='password' required='yes'>
            <br>
            <input type='submit' class='btn btn-success' value='Login' name='submit'> 
        </form>
</div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

       $sql = "SELECT * FROM users WHERE email = '$email'";
       $run = mysqli_query($conn, $sql);
       $rows = mysqli_fetch_assoc($run);

       $username = $rows['username'];
       $role = $rows['role'];

       $count = mysqli_num_rows($run);

        if($count>0){
            if($password == $rows['password']){

                $sql2 = "INSERT INTO staff_logs(username, role) VALUES('$username', '$role')";
                mysqli_query($conn, $sql2);

                if($rows['role'] == 'secretary'){
                    ?>
                        <script>
                            window.location='secretary.php';
                        </script>
                    <?php
                }else if($rows['role'] == 'doctor'){
                    ?>
                        <script>
                            window.location='doctor.php';
                        </script>
                    <?php
                }else if($rows['role'] == 'nurse'){
                    ?>
                        <script>
                            window.location='secretary.php'; //change later to nurse_dash.php when receptionist is introduced
                        </script>
                    <?php
                }else if($rows['role'] == 'lab'){
                    ?>
                        <script>
                            window.location='lab.php';
                        </script>
                    <?php
                }else if($rows['role'] == 'pharmacist'){
                    ?>
                        <script>
                            window.location='pharmacy.php';
                        </script>
                    <?php
                }else if($rows['role'] == 'store'){
                    ?>
                        <script>
                            window.location='store.php';
                        </script>
                    <?php
                }else if($rows['role'] == 'admin'){
                    ?>
                        <script>
                            window.location='admin.php';
                        </script>
                    <?php
                }
                $_SESSION['username']=$rows['username'];
            }else{
                ?>
                <script>
                alert('Wrong Password. Retry');
                window.location='index.php';
                </script>
           <?php }

        }else{ ?>
            <script>
               alert('User Does Not exist');
               window.location='index.php';
            </script>
       <?php }
    }

?>