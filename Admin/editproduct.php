<?php
define('TITLE','Update Product');
define('PAGE','assets');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}


?>
<!-- Strat 2nd Column -->
<div class="col-sm-6 jumbotron center" style="margin-left:350px; margin-top: 80px; ">
  <h3 class="text-center">Update Product</h3>
  <?php 
    if (isset($_REQUEST['edit'])) {
    $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    }
    if(isset($_REQUEST['pupdate'])){
        if (($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pavail'] == "") ||
         ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $pid = $_REQUEST['pid'];
            $pname = $_REQUEST['pname'];
            $pdop = $_REQUEST['pdop'];
            $pavail = $_REQUEST['pavail'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalcost = $_REQUEST['poriginalcost'];
            $psellingcost = $_REQUEST['psellingcost'];
    
             $sql = "UPDATE assets_tb SET pname = '$pname', pdop = '$pdop', pavail = '$pavail', ptotal = '$ptotal',
              poriginalcost = '$poriginalcost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
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
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) {
          echo $row['pid'];
      } ?>" readonly>
     </div>
    
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) {
          echo $row['pname'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if (isset($row['pdop'])) {
          echo $row['pdop'];
      } ?>">
    </div>

    <div class="form-group">
      <label for="pavail">Available Stock</label>
      <input type="text" class="form-control" id="pavail" name="pavail" onkeypress="isInputNumber(event)" value="<?php if (isset($row['pavail'])) {
          echo $row['pavail'];
      } ?>">
    </div>
    
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if (isset($row['ptotal'])) {
          echo $row['ptotal'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="poriginalcost">Product Original Price</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if (isset($row['poriginalcost'])) {
          echo $row['poriginalcost'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="psellingcost">Product Selling Price</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if (isset($row['psellingcost'])) {
          echo $row['psellingcost'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
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