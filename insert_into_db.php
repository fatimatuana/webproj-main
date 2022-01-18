<?php
require_once ('dbaccess.php');


if(isset($_POST["gender"]) && !empty($_POST["gender"])
&& isset($_POST["firstname"]) && !empty($_POST["firstname"]) 
&& isset($_POST["lastname"]) && !empty($_POST["lastname"])
&& isset($_POST["username"]) && !empty($_POST["username"])
&& isset($_POST["password"]) && !empty($_POST["password"])
&& isset($_POST["email"]) && !empty($_POST["email"])) {
$_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);


//create $db_obj, create sql statement, prepare it and bind the variables to it
$gender = $_POST["gender"]; 
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$uname = $_POST["username"];
$pass = $_POST["password"];
$mail = $_POST["email"];

 
$select = mysqli_query($db_obj, "SELECT * FROM users WHERE username = '".$_POST['username']."'"); //checks if username already exists
if(mysqli_num_rows($select)) {
    exit('This username already exists');
}
  
else {
$stmt = $db_obj->prepare ("INSERT INTO users (gender, firstname, lastname, username, email, password, role) VALUES(?, ?, ?, ?, ?, ?, 'guest')");
$stmt->bind_param("ssssss", $gender, $fname, $lname, $uname, $mail, $pass);



if ($stmt->execute()) { echo "New user created"; } else { echo "Error"; }
$stmt->close(); $db_obj->close();

}
}
?>
<a href='index.php'> Back</a>

