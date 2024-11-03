<?php
define('PAGE', 'Requesterchangepass');
define('TITLE', 'Change Password');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='Requesterlogin.php'</script>";
}
    $rEmail = $_SESSION['rEmail'];
    if(isset($_REQUEST['passupdate'])){
        if($_REQUEST['rPassword'] == ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 col-md-9 ml-5 mt-2" role=" alert">Fill All Fields </div>';
        } else{
            $rPass = $_REQUEST['rPassword'];
            $sql = "UPDATE requsterlogin_tb SET r_password = '$rPass' WHERE r_email = '$rEmail'";
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
                    <input class="form-control" type="rNamepassword" name="rPassword" id="inputnewpassword" placeholder="Enter New Password">
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
include('includes/footer.php'); 
?>
