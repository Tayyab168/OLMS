<?php
define('TITLE','Work Order');
define('PAGE','work');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

?>
<!-- Start 2nd column -->
<div class="col-sm-9 col-md-12 mt-5 p-5">
 <h3 class="text-center"> Assign Work Detail</h3>

  <?php
     if(isset($_REQUEST['view'])){
        
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); ?>

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
 <div class="text-center">
  
  <form action="" class="mb-3 d-print-none d-inline">
   <input type="submit" value="Print" class="btn btn-danger" onClick="window.print()">
   </form>
   <form action="work.php" class="mb-3 d-print-none d-inline">
   <input type="submit" value="Close" class="btn btn-secondary  ">
  </form>
 </div>

 <?php    }  ?>
  
</div>
<!-- Start 2nd column -->
<?php
 include('includes/footer.php');
?>