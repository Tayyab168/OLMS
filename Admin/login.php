<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
    if(isset($_REQUEST['aEmail'])){

        $aEmail =mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
        $aPassword =mysqli_real_escape_string($conn,  trim($_REQUEST['aPassword']));

        $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '".$aEmail."' AND a_password = '".$aPassword."' limit 1 ";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $_SESSION['is_adminlogin'] = true;
            $_SESSION['aEmail'] = $aEmail;
            echo "<script>location.href='dashboard.php'; </script>";
            exit;
        }else{
            $msg = '<div class= "alert alert-warning mt-2">Email/Password is incorrect/User not Registered</div>';
        }
    }
    } else{
        echo "<script>location.href='dashboard.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Css -->

    <link rel = "stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesom css -->
    <link rel = "stylesheet" href = "../css/all.min.css" >

    <title>Login</title>
</head>
<body>
    <div class= "mb-3 mt-5 text-center" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Service Managment System</span>
    </div>
    <p class="text-center" style = "font-size: 25px">
        <i class= "mr-3 fas fa-user-secret text-danger"></i>Admin Area
    </p>
<div class= "conatiner-fluid">
    <div class="row justify-content-center mt-5" >
        <div class= "col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4"  method="post">
                <div class= "form-group">
                   <i class="fas fa-user"> </i>
                   <label for="email" class="font-weight-bold pl-2"> Email</label>
                    <input type="email" name="aEmail" id="" class="form-control" placeholder="Email">
                    <small class="form-text">We'll never share your Email with anyone else. </small>
                </div>
                    
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="pass" class="font-weight-bold pl-2">Password</label>
                    <input type="Password" name="aPassword" id="" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-outline-danger mt-4 font-weight-bold btn-block shadow-sm"> Login </button>
                <?php  if(isset($msg)){echo $msg;} ?>
            </form>
            <div class="text-center">
                <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm"> Back To Home</a>
            </div>
        </div>
    </div>
</div>


<!--JavaScript Files -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>

</body>
</html>