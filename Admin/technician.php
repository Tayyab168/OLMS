<?php
define('TITLE','Labour');
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

<!-- Start 2nd column -->

<div class="col-sm-9 col-md-12 mt-5 text-center p-5">
  <p class="bg-info text-white p-2">List of Workers</p>

   <?php 
    $sql = "SELECT * FROM technician_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table">';
         echo '<thead>';
           echo '<tr>';
             echo '<th scope="col">Labour ID<th>';
             echo '<th scope="col">Name<th>';
             echo '<th scope="col">City<th>';
             echo '<th scope="col">Mobile<th>';
             echo '<th scope="col">Email<th>';
             echo '<th scope="col">Action<th>';
           echo '</tr>';
         echo '</thead>';

         echo '<tbody>';
          while ($row = $result->fetch_assoc()) {
              echo '<tr>';
               echo '<td>'.$row["empid"].'</td>';
               echo '<td></td>';
               echo '<td>'.$row["empName"].'</td>';
               echo '<td></td>';
               echo '<td>'.$row["empCity"].'</td>';
               echo '<td></td>';
               echo '<td>'.$row["empMobile"].'</td>';
               echo '<td></td>';
               echo '<td>'.$row["empEmail"].'</td>';
               echo '<td></td>';
               echo '<td>';
                 
               echo '<form action="editemp.php" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row["empid"].'>
                   <button type="submit" class="btn btn-info  mr-3" name= "edit" value ="Edit"><i class="fas fa-pen"></i></button>';
                 echo '</form>';

                 
                 echo '<form action="" method="POST" class="d-inline">';
                   echo '<input type="hidden" name="id" value='.$row["empid"].'>
                   <button type="submit" class="btn btn-danger  mr-3" name= "delete" value ="Delete"><i class="fas fa-trash-alt"></i></button>';
                 echo '</form>';

               echo '</td>';
              echo '</tr>';
          }
         echo '<tbody>';
        echo '</table>';
    }else{
        echo 'NO Worker Avail At This Time';
    }
   ?>

</div>
<!-- End 2nd column -->
<?php
 if (isset($_REQUEST['delete'])) {
 $sql = "DELETE FROM technician_tb Where empid = {$_REQUEST['id'] }";
 if ($conn->query($sql) == TRUE) {
     echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else{
     echo 'Unable To Dlete';
 }
 }
?>
<div class="float-right"><a href="insertemp.php" class="btn btn-info m-3"><i class="fas fa-plus fa-2x"></i></a></div>


<?php
 include('includes/footer.php')
?>