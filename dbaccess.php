<?php 
$host = "localhost";
$user = "admin";
$password ="admin";
$database = "webproj";

$db_obj = new mysqli($host, $user, $password, $database);
if($db_obj->connect_error){
    echo "Error connecting to database: ". $db_obj->connect_error;
    exit;
}
else{
   // echo "successfully connected to database";
}

?>