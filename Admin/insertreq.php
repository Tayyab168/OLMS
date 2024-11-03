<?php
define('TITLE','Update Requester');
define('PAGE','requester');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['reqsubmit'])){
    if (($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $rname = $_REQUEST['r_name'];
        $remail = $_REQUEST['r_email'];
        $rpassword = $_REQUEST['r_password'];
        $sql = "INSERT INTO requsterlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpassword')";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">New Customer Added</div>';
        } else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Not Updated</div>';
        }
    }
}
?>
<!-- Strat 2nd Column -->
<div class="col-sm-6 jumbotron center" style="margin-left:350px; margin-top: 150px; ">
  <h3 class="text-center">Add New Customer</h3>
  <form action="" method="post">
    
    <div class="form-group">
      <label for="r_name">Name</label>
      <input type="text" class="form-control" id="r_name" name="r_name">
    </div>

    
    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="text" class="form-control" id="r_email" name="r_email">
    </div>

    
    <div class="form-group">
      <label for="r_password">Password</label>
      <input type="text" class="form-control" id="r_password" name="r_password">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">submit</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){ echo $msg; } ?>
  </form>
</div>
<!-- End 2nd Column -->
<?php
 include('includes/footer.php')
?>