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

if(isset($_REQUEST['empsubmit'])){
    if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") ||
     ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $eName = $_REQUEST['empName'];
        $eCity = $_REQUEST['empCity'];
        $eMobile = $_REQUEST['empMobile'];
        $eEmail = $_REQUEST['empEmail'];
        $sql = "INSERT INTO technician_tb (empName,empCity,empMobile,empEmail) VALUES ('$eName','$eCity','$eMobile','$eEmail')";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">New Worker Added</div>';
        } else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Worker Not Submit</div>';
        }
    }
}
?>
<!-- Strat 2nd Column -->
<div class="col-sm-6 jumbotron center" style="margin-left:350px; margin-top: 150px; ">
  <h3 class="text-center">Add New Worker</h3>
  <form action="" method="POST">
    
    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName">
    </div>

    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="empCity">
    </div>

    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="empMobile">
    </div>
    
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="text" class="form-control" id="empEmail" name="empEmail">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
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