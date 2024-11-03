<?php
define('TITLE','Update Worker');
define('PAGE','technician');
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
 <h3 class="text-center">Update Worker Detail</h3>
  <?php 
    if (isset($_REQUEST['edit'])) {
    $sql = "SELECT * FROM technician_tb WHERE empid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    }
    if(isset($_REQUEST['empupdate'])){
        if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $eId = $_REQUEST['empId'];
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];
             $sql = "UPDATE technician_tb SET empName = '$eName', empCity = '$eCity', empMobile = '$eMobile', empEmail = '$eEmail' WHERE empid = '$eId'";
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
      <label for="empId">Worker ID</label>
      <input type="text" name="empId" id="empId" class="form-control" value="<?php if (isset($row['empid'])) {
          echo $row['empid'];
      } ?>" readonly>
    </div>

    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" name="empName" id="empName" class="form-control" value="<?php if (isset($row['empName'])) {
          echo $row['empName'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" name="empCity" id="ampCity" class="form-control" value="<?php if (isset($row['empCity'])) {
          echo $row['empCity'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" name="empMobile" id="empMobile" class="form-control" value="<?php if (isset($row['empMobile'])) {
          echo $row['empMobile'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="text" name="empEmail" id="empEmail" class="form-control" value="<?php if (isset($row['empEmail'])) {
          echo $row['empEmail'];
      } ?>">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
      <?php if(isset($msg)){ echo $msg; } ?>
  </form>
</div>
<!-- End 2nd Column -->

<script>
  funcation isInputNumber(eve){
      var ch = String.formCharCode(eve.which);
        if(!(/[0-9]/.test(ch))){
            eve.preventDefault();
        }
  }

</script>
<?php
 include('includes/footer.php')
?>