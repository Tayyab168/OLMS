<?php
define('TITLE', 'Submit Request');
define('PAGE', 'submitRequest');
include('includes/header.php'); 
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='Requesterlogin.php'</script>";
}
if (isset($_REQUEST['submitrequest'])) {
    //checking for Empty Fields
    if(($_REQUEST['requestinfo'] =="") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requesterCity'] == "") || ($_REQUEST['requesterArea'] == "") || ($_REQUEST['requesterAreaCode'] == "")  || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requesterDate'] == "")){
      $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'> Fill All Required Fields</div>";
    }
    else{
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requesterCity'];
        $rarea = $_REQUEST['requesterArea'];
        $rareacode = $_REQUEST['requesterAreaCode'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requesterDate'];

        $sql = "INSERT INTO submitrequest_tb (request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_area,requesterarea_code,requester_email,requester_mobile,request_date) VALUES ('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rarea','$rareacode','$remail','$rmobile','$rdate')";

        if($conn->query($sql) == TRUE) {
            $genid = mysqli_insert_id($conn);
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Request Successfully Submitted </div>";
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='submitrequestsuccess.php'</script>";
        }         
        else{
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'> Request Not Submitted </div>";  
        }
    }
}
?>
<!-- Start service request form 2nd Column -->
<div class="col-sm-9 col-md-10" style="margin-left:100px">
   
    <form action="" method="post" class="p-5 mx-5" >
       <div class="form-group">
            <label for="inputRequestInfo">Request Information</label>
            <input type="text" name="requestinfo" id="inputRequestInfo" class="form-control" placeholder="Request Info">
       </div>
       <div class="form-group">
            <label for="inputRequestDescription">Description</label>
            <input type="text" name="requestdesc" id="inputRequestDescription" class="form-control" placeholder="Write Description">
      
       </div>
       <div class="form-group" >
            <label for="inputName">Name</label>
            <input type="text" name="requestername" id="inputName" class="form-control" placeholder="Write Your Name ">
       </div>
       <div class="form-row">
           <div class="form-group col-md-6">
           <label for="inputAddress">Address Line 1</label>
           <input type="text" class="form-control" name="requesteradd1" id="inputAddress" placeholder="Enter Your Colony Address">
           </div>
           <div class="form-group col-md-6" >
           <label for="inputAddress2">Address Line 2</label>
           <input type="text" class="form-control" name="requesteradd2" id="inputAddress2" placeholder="Enter Your Street & House Number">
           </div>
       </div>
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" name="requesterCity" id="inputCity" placeholder="Enter Your City Name">
            </div>
            <div class="form-group col-md-4">
            <label for="inputArea">City Area</label>
            <input type="text" class="form-control" name="requesterArea" id="inputArea" placeholder="Enter Your City Area">
            </div>
            <div class="form-group col-md-2">
            <label for="inputAreaCode">Area Code</label>
            <input placeholder="Enter Area Code" type="text" class="form-control" name="requesterAreaCode" id="inputAreaCode" onkeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="requesteremail" placeholder="user@gmail.com">
            </div>
            <div class="form-group col-md-3">
            <label for="inputMobile">Mobile</label>
            <input type="text" placeholder="+923123456789" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)" >
            </div>
            <div class="form-group col-md-3">
            <label for="inputDate">Date</label>
            <input type="Date" class="form-control" id="inputDate" name="requesterDate" >
            </div>
            
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-danger mx-1" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form> 
    

  
<?php
if (isset($msg)) {
    echo $msg;
}
?>

</div> 
 <!-- End service request form 2nd Column -->
 
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
