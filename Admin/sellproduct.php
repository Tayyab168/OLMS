<?php
define('TITLE','Sell Product');
define('PAGE','assets');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
 
if (isset($_REQUEST['psubmit'])) {
    if (($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "") || ($_REQUEST['pname'] == "") ||
        ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['totalcost'] == "") ||
        ($_REQUEST['selldate'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
 } else {
     $pid = $_REQUEST['pid'];
     $pavail = $_REQUEST['pavail'];
     $pavail = $_REQUEST['pavail'] - $_REQUEST['pquantity'];

     $custname = $_REQUEST['cname'];
     $custadd = $_REQUEST['cadd'];
     $cpname = $_REQUEST['pname'];
     $cpquantity = $_REQUEST['pquantity'];
     $cpeach = $_REQUEST['psellingcost'];
     $cptotal = $_REQUEST['totalcost'];
     $cpdate = $_REQUEST['selldate'];

     $sql = "INSERT INTO customer_tb (custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate) VALUES
      ('$custname','$custadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')";

    if ($conn->query($sql) == TRUE) {
      $genid =  mysqli_insert_id($conn);
      $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Request Successfully Submitted </div>";
      session_start();
      $_SESSION['myid'] = $genid;
      echo  "<script> location.href='productsellsuccess.php';</script>";
    }else{
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'> Request Not Submitted </div>";  
  }

    $sqlup = "UPDATE assets_tb SET pavail = '$pavail' WHERE pid = '$pid'";

    $conn->query($sqlup);
 }
}

?>

<!-- Strat 2nd Column -->
<div class="col-sm-6 jumbotron center" style="margin-left:350px; margin-top: 80px; ">
  <h3 class="text-center">Customer Bill</h3>
  <?php 
    if (isset($_REQUEST['issue'])) {
    $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

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
      <label for="cname">Customer Name</label>
      <input type="text" class="form-control" id="cname" name="cname">
    </div>

    <div class="form-group">
      <label for="cadd">Customer Address</label>
      <input type="text" class="form-control" id="cadd" name="cadd">
    </div>
    
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) {
          echo $row['pname'];
      } ?>" readonly>
    </div>

    <div class="form-group">
      <label for="pavail">Available Stock</label>
      <input type="text" class="form-control" id="pavail" name="pavail" onkeypress="isInputNumber(event)" value="<?php if (isset($row['pavail'])) {
          echo $row['pavail'];
      } ?>" readonly>
    </div>
    
    <div class="form-group">
      <label for="pquantity">No. Of Product</label>
      <input type="text" class="form-control" id="pquantity" name="pquantity" value="<?php if (isset($row['pquantity'])) {
          echo $row['pquantity'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="psellingcost">Product Price</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if (isset($row['psellingcost'])) {
          echo $row['psellingcost'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
      <label for="totalcost">Total Price</label>
      <input type="text" class="form-control" id="totalcost" name="totalcost" value="<?php if (isset($row['totalcost'])) {
          echo $row['totalcost'];
      } ?>" onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group col-md-4">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="selldate" value="<?php if (isset($row['inputDate'])) {
          echo $row['inputDate'];
      } ?>">
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