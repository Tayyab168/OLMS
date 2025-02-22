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
<!-- Start 2nd Colunm -->
<div class="col-sm-9 col-md-12 mt-5 p-3">
<?php

$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo '<table class="table mt-5">';
     echo '<thead>';
      echo '<tr>';
       echo '<th scope="col"> Request ID</th>';
       echo '<th scope="col"> Request Info</th>';
       echo '<th scope="col"> name</th>';
       echo '<th scope="col"> Address</th>';
       echo '<th scope="col"> City</th>';
       echo '<th scope="col"> Mobile</th>';
       echo '<th scope="col"> Worker</th>';
       echo '<th scope="col"> Assigned Date</th>';
       echo '<th scope="col"> Action</th>';
      echo '</tr>';
     echo '</thead>';

     echo '<tbody>';
      while ($row = $result->fetch_assoc()){
          echo '<tr>';
           echo '<td>'.$row['request_id'].'</td>';
           echo '<td>'.$row['request_info'].'</td>';
           echo '<td>'.$row['requester_name'].'</td>';
           echo '<td>'.$row['requester_add2'].'</td>';
           echo '<td>'.$row['requester_city'].'</td>';
           echo '<td>'.$row['requester_mobile'].'</td>';
           echo '<td>'.$row['assign_tech'].'</td>';
           echo '<td>'.$row['assign_date'].'</td>';
           echo '<td>';
            
           echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
             echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="view" value="View" type="submit">
             <i class="far fa-eye"></i></button>';
            echo '</form>';

            echo '<form action="" method="POST" class="d-inline">';
             echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit">
             <i class="far fa-trash-alt"></i></button>';
            echo '</form>';

           echo '</td>';
          echo '</tr>';
      }
     echo '</tbody>';
    echo '</table>';
}else{
echo 'No Work';
}

if(isset($_REQUEST['delete'])){
$sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
} else {
    echo "Unable to Delete";
}
}
?>
</div>
<!-- End 2nd Colunm -->
<?php
 include('includes/footer.php');
?>