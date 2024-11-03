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
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 jumbotron" style="margin-top:120px; margin-left:320px;">
 <h3 class="text-center">Update Requester Detail</h3>
  <?php 
    if (isset($_REQUEST['edit'])) {
    $sql = "SELECT * FROM requsterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    }
    if(isset($_REQUEST['requpdate'])){
        if (($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $rid = $_REQUEST['r_login_id'];
            $rname = $_REQUEST['r_name'];
            $remail = $_REQUEST['r_email'];
            $sql = "UPDATE requsterlogin_tb SET r_login_id = '$rid', r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update Succefully</div>';
            } else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Not Updated</div>';
            }
        }
    }
  ?>

  <form action="" method="POST">
    <div class="form-group">
      <label for="r_login_id">Requester ID</label>
      <input type="text" name="r_login_id" id="r_login_id" class="form-control" value="<?php if (isset($row['r_login_id'])) {
          echo $row['r_login_id'];
      } ?>" readonly>
    </div>

    <div class="form-group">
      <label for="r_name">Name</label>
      <input type="text" name="r_name" id="r_name" class="form-control" value="<?php if (isset($row['r_name'])) {
          echo $row['r_name'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="text" name="r_email" id="r_email" class="form-control" value="<?php if (isset($row['r_email'])) {
          echo $row['r_email'];
      } ?>">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>
      <?php if(isset($msg)){ echo $msg; } ?>
  </form>
</div>
<!-- End 2nd Column -->
<?php
 include('includes/footer.php')
?>