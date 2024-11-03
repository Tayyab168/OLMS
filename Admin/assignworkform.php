<?php

if(session_id() == ''){
    session_start();
}
if($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    }else{
        echo "Not Deleted";
    }
}
if(isset($_REQUEST['assign'])){
    if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "")
     || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "")
     || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterarea'] == "") 
     || ($_REQUEST['requesterareacode'] == "") || ($_REQUEST['requesteremail'] == "") 
     || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
         
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Required All Fields</div>';
    }else{
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['address1'];
        $radd2 = $_REQUEST['address2'];
        $rcity = $_REQUEST['requestercity'];
        $rarea = $_REQUEST['requesterarea'];
        $rareacode = $_REQUEST['requesterareacode'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rassigntech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputdate'];

        $sql = "INSERT INTO assignwork_tb (request_id,
        request_info,request_desc,requester_name,requester_add1,requester_add2,
        requester_city,requester_area,requesterarea_code,requester_email,
        requester_mobile,assign_tech,assign_date) VALUES ('$rid','$rinfo','$rdesc','$rname',
        '$radd1','$radd2','$rcity','$rarea','$rareacode','$remail','$rmobile','$rassigntech','$rdate')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Succeccfully Assigned</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Work Not Assigned</div>';

        }
    }
}

?>
<!-- Start 3rd Column -->
<div class="col-sm-6 col-md-6 m-5 jumbotron float-right container">
   
    <form action="" method="POST">
     <h5 class="text-center">Assign Labour</h5>

       <div class="form-group">
            <label for="request_id">Request ID</label>
            <input type="text" name="request_id" id="request_id" class="form-control"
             value="<?php if(isset($row['request_id'])) echo $row['request_id']; ?>" readonly>
       </div>
       <div class="form-group">
            <label for="request_info">Request Info</label>
            <input type="text" name="request_info" id="request_info" class="form-control"
            value="<?php if(isset($row['request_info'])) echo $row['request_info']; ?>">
      
       </div>
       <div class="form-group" >
            <label for="requestdesc">Description</label>
            <input type="text" name="requestdesc" id="requestdesc" class="form-control"
            value="<?php if(isset($row['request_desc'])) echo $row['request_desc']; ?>">
       </div>
      
           <div class="form-group">
           <label for="requestername">Name</label>
           <input type="text" class="form-control" name="requestername" id="requestername"
           value="<?php if(isset($row['requester_name'])) echo $row['requester_name']; ?>">
           </div>
        <div class="form-row">
           <div class="form-group col-md-6" >
           <label for="address1">Address Line 1</label>
           <input type="text" class="form-control" name="address1" id="address1"
           value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1']; ?>">
           </div>
            <div class="form-group col-md-6">
            <label for="address2">Address Line 2</label>
            <input type="text" class="form-control" name="address2" id="address2"
            value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="requestercity">City</label>
            <input type="text" class="form-control" name="requestercity" id="requestercity"
            value="<?php if(isset($row['requester_city'])) echo $row['requester_city']; ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="requestcityearea">City Area</label>
            <input type="text" class="form-control" name="requesterarea" id="requesterarea"
            value="<?php if(isset($row['requester_area'])) echo $row['requester_area']; ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="requesterareacode">Requester Area Code</label>
            <input type="text" class="form-control" name="requesterareacode"
            value="<?php if(isset($row['requesterarea_code'])) echo $row['requesterarea_code']; ?>" id="requesterareacode" onkeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="requesteremail">Email</label>
            <input type="email" class="form-control" id="requesteremail" name="requesteremail"
            value="<?php if(isset($row['requester_email'])) echo $row['requester_email']; ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="requestermobile">Mobile</label>
            <input type="text" class="form-control" id="requestermobile"
            value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile']; ?>" name="requestermobile" onkeypress="isInputNumber(event)" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="assigntech">Assign Labour</label>
            <input type="text" class="form-control" id="assigntech" name="assigntech" >
            </div>
            <div class="form-group col-md-6">
            <label for="inputdate">Date</label>
            <input type="Date" class="form-control" id="inputdate" name="inputdate" >
            </div>
            
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-success" name="assign">Assign</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

    </form> 
    <?php if(isset($msg)){echo $msg; } ?>
</div>    
<!-- End 3rd Column -->


<script>
    function isInputNumber(evt) {
        var ch = string.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
 
 
 </script>
