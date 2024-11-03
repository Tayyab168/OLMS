<?php
define('TITLE','Sell Report');
define('PAGE','sellreport');
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
<div class="col-sm-9 col-md-10 " style="margin-top: 100px; margin-left:220px">
  <form action="" method="post" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" name="startdate" id="startdate" class="form-control">
      </div> <span>To</span>
      
    <div class="form-group col-md-2">
        <input type="date" name="enddate" id="enddate" class="form-control">
      </div>
      
    <div class="form-group col-md-2">
        <input type="submit" name="searchsubmit" value="Search" class="btn btn-success">
      </div>
    </div>
  </form>
</div>


<?php
  if(isset($_REQUEST['searchsubmit'])){
      $startdate = $_REQUEST['startdate'];
      $enddate = $_REQUEST['enddate'];

      $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
          echo '<h3><p class="bg-info text-white p-2 text-center m-3">Detail</p></h3>';
          echo '<table class="table">';
            echo '<thead>';
              echo '<tr>';
                echo '<th scope="col">Customer ID</th>';
                echo '<th scope="col">Customer Name</th>';
                echo '<th scope="col">Address</th>';
                echo '<th scope="col">Product Name</th>';
                echo '<th scope="col">Quantity</th>';
                echo '<th scope="col">Price</th>';
                echo '<th scope="col">Total Price</th>';
                echo '<th scope="col">Date</th>';
              echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
             while($row = $result->fetch_assoc()){
                 echo '<tr>';
                   echo '<td>'.$row['custid'].'</td>';
                   echo '<td>'.$row['custname'].'</td>';
                   echo '<td>'.$row['custadd'].'</td>';
                   echo '<td>'.$row['cpname'].'</td>';
                   echo '<td>'.$row['cpquantity'].'</td>';
                   echo '<td>'.$row['cpeach'].'</td>';
                   echo '<td>'.$row['cptotal'].'</td>';
                   echo '<td>'.$row['cpdate'].'</td>';
                 echo '</tr>';
             }
             echo '<tr>';
               echo '<td>';
                 echo '<input type = "submit" class = "btn btn-danger d-print-none" value="Print" onClick = "window.print()">';
               echo '</td>';
             echo '</tr>';
            echo '</tbody>';
          echo '</table>';

      } else {
          echo "<div class = 'alert alert-warning col-sm-6 ml-5 mt-2' role = 'alert'> No Records Found</div>";
      }

  }
  ?>
<!-- End 2nd Column -->
<?php
 include('includes/footer.php')
?>