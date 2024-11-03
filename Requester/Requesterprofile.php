<?php 
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='Requesterlogin.php'</script>";
}
$sql = "SELECT r_name, r_email FROM requsterlogin_tb WHERE r_email ='$rEmail' ";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();      
    $rName = $row['r_name'];
}
if (isset($_REQUEST['nameupdate'])) {
    if($_REQUEST['rName'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role=" alert">Fill All Fields </div>';
    }else {
        $rName = $_REQUEST['rName'];
        $sql = "UPDATE requsterlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
        if($conn->query($sql) == TRUE){
            $passmsg = '<div class= "alert alert-success col-sm-6 ml-5 mt-2" role="alert">Seccessfully Updated</div>';
        }else{
            $passmsg = '<div class= "alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}

?>

        <!-- SideBar End 1st Column -->
        <div class="col-sm-6 col-md-4" style="margin-top:200px; margin-left:400px;">
        <!-- Profile Area Start 2nd Column-->

            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email </label>
                    <input class="form-control" type="rEmail" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="rName"> Name</label>
                    <input class="form-control" type="rName" name="rName" id="rName" value="<?php echo $rName  ?>" >
                </div>
                <div class="text-center">
                <button type="Submit" class="btn btn-danger" name="nameupdate">Update</button>
                <?php if(isset($passmsg)){echo $passmsg;} ?>
                </div>
            </form>
        </div>
        <!-- Profile Area End 2nd Column-->
      
      


 <?php
include('includes/footer.php'); 
?>

