<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>

<body>
    <div class = "container">
    <?php

include_once "dbaccess.php";
$id = $_SESSION['id'];

if(isset($_POST['update'])) // when click on Update button
{
    $gender = $_POST["gender"]; //in der DB steht bei gender "on"?
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $uname = $_POST["username"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $mail = $_POST["email"];
    
     

    $sql = "UPDATE users SET gender='$gender', firstname='$fname', lastname='$lname', username='$uname', email='$mail', password='$pass' WHERE id=$id";
    
    
	
    if($db_obj->query($sql))
    {
    
        mysqli_close($db_obj); // Close connection
        header("location:userAdministration.php");
        
    }
    else
    {
        echo mysqli_error();
    }    	
}
else{




$sql = "SELECT * FROM users where id = '$id'";
$result = $db_obj->query($sql);
$userData = $result->fetch_assoc();
}

    ?>
     <h1>User bearbeiten</h1>

<form method="POST">
<input type="radio" name="gender"  id="male" value = "<?php echo $userData['gender']?>">
<label for="gender">Herr</label></br>
<input type="radio" name="gender"  id="female" value = "<?php echo $userData['gender']?>">
<label for="gender">Frau</label></br>
<label for="firstname">First name</label>
<input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $userData['firstname']?>" required></br>
<label for="lastname">Last name</label>
<input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $userData['lastname']?>" required></br>
<label for="username">Username</label>
<input type="text" name="username" class="form-control" id="username"  value="<?php echo $userData['username']?>" required></br>
<label for="email">Email</label>
<input type="email" name="email" class="form-control" id="email"  value="<?php echo $userData['email']?>" required></br>
<label for="password">Password</label>
<input type="password" name="password" class="form-control" id="password"  value="<?php echo $userData['password']?>" required></br>
<div class="form-group">
<input type="submit" class="mt-3 btn btn-primary" name="update" value="Update">
</div>
</form>

</div>
</body>
</html>