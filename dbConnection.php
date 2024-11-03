<?php
$db_host = "localhost" ;
$db_user = "root" ;
$db_password = "" ;
$db_name = "osms_db" ;
//$db_port = "3306" ;

// creat Connection

$conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

// Checking Connection
if($conn->connect_error){
    die( "Connection Failed" );
}
//else
//{
  //  echo "Connection Successful"; 
//}
?>