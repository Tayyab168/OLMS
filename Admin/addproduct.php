<?php
define('TITLE','Add Product');
define('PAGE','assets');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['psubmit'])){
    if (($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") ||
     ($_REQUEST['pavail'] == "") || ($_REQUEST['ptotal'] == "") ||
     ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pavail = $_REQUEST['pavail'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];

        $sql = "INSERT INTO assets_tb (pname,pdop,pavail,ptotal,poriginalcost,psellingcost) VALUES 
        ('$pname','$pdop','$pavail','$ptotal','$poriginalcost','$psellingcost')";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">New Product Added</div>';
        } else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Product Not Add</div>';
        }
    }
}
?>
<!-- Strat 2nd Column -->
<div class="col-sm-6 jumbotron center" style="margin-left:350px; margin-top: 80px; ">
  <h3 class="text-center">Add New Product</h3>
  <form action="" method="POST">
    
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>

    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop">
    </div>

    <div class="form-group">
      <label for="pavail">Available Stock</label>
      <input type="text" class="form-control" id="pavail" name="pavail" onkeypress="isInputNumber(event)">
    </div>
    
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="poriginalcost">Product Original Price</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="psellingcost">Product Selling Price</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
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