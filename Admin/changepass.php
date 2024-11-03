<?php
define('TITLE','Change Password');
define('PAGE','changepass');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

$rEmail = $_SESSION['aEmail'];
    if(isset($_REQUEST['passupdate'])){
        if($_REQUEST['aPassword'] == ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 col-md-9 ml-5 mt-2" role=" alert">Fill All Fields </div>';
        } else{
            $aPass = $_REQUEST['aPassword'];
            $sql = "UPDATE adminlogin_tb SET a_password = '$aPass' WHERE a_email = '$aEmail'";
            if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 col-md-9 ml-5 mt-2" role=" alert">Password Updated </div>';
            }else{
                $passmsg = '<div class="alert alert-danger col-sm-6 col-md-9 ml-5 mt-2" role=" alert">Password Not Updated </div>';
            }
        }
        }
      

?>
<!-- Start user change password 2nd column -->
<div class="col-sm-6 col-md-4" style="margin-top:200px; margin-left:400px;">
    <form action="" method="post">
    <div class="form-group">
                    <label for="inputEmail">Email </label>
                    <input class="form-control" type="email" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword"> New Password</label>
                    <input class="form-control" type="aNamepassword" name="aPassword" id="inputnewpassword" placeholder="Enter New Password">
                </div>
        <div class="text-center">
          <button type="submit" class="btn btn-danger mr-1 mt-4" name="passupdate">Update</button>
          <button type="reset" class="btn btn-secondary mt-4" name="reset">Reset</button>
          <?php if(isset($passmsg)){echo $passmsg;} ?>
        </div>
    </form>
</div>
<!-- End user change password 2nd column -->




<?php
 include('includes/footer.php')
?>