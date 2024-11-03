<?php
define('PAGE', 'CheckStatus');
define('TITLE', 'Request Status');
include('includes/header.php'); 
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='Requesterlogin.php'</script>";
}

?>

<!-- Start 2nd Column -->
<div>
 <div class= "col-sm-9 col-md-6 mt-5" style="margin-left:380px;">
  <form action="" method="post">
   <div class="form-group">
    <label for="checkid" class="d-print-none mt-5">Enter Request ID: </label>
    <input type="text" name="checkid" class="form-control d-print-none" name="checkid" id="checkid"  onkeypress="isInputNumber(event)">
   </div>
   <div class="text-center">
  <button type="submit" class="btn btn-danger d-print-none">Search</button>
  </div>
  </div>
 </form>

 <?php
  if(isset($_REQUEST['checkid'])){
   if($_REQUEST['checkid'] == ""){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields </div>';
   } else{
    
    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
  
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  if(($row['request_id'] == $_REQUEST['checkid'])){

?>

<div class="col-sm-12 col-md-9 text-center" style="margin-left:200px;">
<h3 class="text-center mt-5">Assigned Labor Details</h3>
<table class= "table table-bordered">
 <tbody>
  <tr>
   <td>Request ID</td>
   <td><?php if(isset($row['request_id'])) { echo $row['request_id']; } ?></td>
  </tr>

  <tr>
   <td>Request Info</td>
   <td><?php if(isset($row['request_info'])) { echo $row['request_info']; } ?></td>
  </tr>

  <tr>
   <td>Request Description</td>
   <td><?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?></td>
  </tr>

  <tr>
   <td>Name</td>
   <td><?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?></td>
  </tr>

  <tr>
   <td>Address Line 1</td>
   <td><?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?></td>
  </tr>
  
  <tr>
   <td>Address Line 2</td>
   <td><?php if(isset($row['requester_add2'])) { echo $row['requester_add2']; } ?></td>
  </tr>
  
  <tr>
   <td>City</td>
   <td><?php if(isset($row['requester_city'])) { echo $row['requester_city']; } ?></td>
  </tr>
  
  <tr>
   <td>Area</td>
   <td><?php if(isset($row['requester_area'])) { echo $row['requester_area']; } ?></td>
  </tr>
  
  <tr>
   <td>Area Code</td>
   <td><?php if(isset($row['requesterarea_code'])) { echo $row['requesterarea_code']; } ?></td>
  </tr>
  
  <tr>
   <td>Email</td>
   <td><?php if(isset($row['requester_email'])) { echo $row['requester_email']; } ?></td>
  </tr>
  
  <tr>
   <td>Mobile</td>
   <td><?php if(isset($row['requester_mobile'])) { echo $row['requester_mobile']; } ?></td>
  </tr>
  
  <tr>
   <td>Assign Date</td>
   <td><?php if(isset($row['assign_date'])) { echo $row['assign_date']; } ?></td>
  </tr>
  
  <tr>
   <td>Worker Name</td>
   <td><?php if(isset($row['assign_tech'])) { echo $row['assign_tech']; } ?></td>
  </tr>
  
  <tr>
   <td>Customer Signature</td>
   <td> </td>
  </tr>
  
  <tr>
   <td>Worker Signature</td>
   <td> </td>
  </tr>
 </tbody>
</table>
</div>
 <div class="text-center">
  <form action="" class="mb-3 d-print-none">
   <input type="submit" value="Print" class="btn btn-danger" onClick="window.print()">
   <input type="submit" value="Close" class="btn btn-secondary  ">
  </form>
 </div>
 <?php } else {
     echo '<div class="alert alert-info mt-4">Request Pending </div>';
 } 
 }
   }
     
  ?>
  <?php if(isset($msg)) { echo $msg; } ?>
</div>
<!-- End 2nd Column -->

<script>
    function isInputNumber(evt) {
        var ch = string.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
 
 
 </script>


<?php
include('includes/footer.php'); 
?>
