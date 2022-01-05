<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Guest</title>
</head>
<body>
<form action="insert_into_db.php" method="post">
<input type="radio" name="gender"  id="male" > 
<label for="gender">Herr</label></br>
<input type="radio" name="gender"  id="female">
<label for="gender">Frau</label></br>
<label for="firstname">First name</label>
<input type="text" name="firstname" id="firstname" required></br>
<label for="lastname">Last name</label>
<input type="text" name="lastname" id="lastname" required></br>
<label for="username">Username</label>
<input type="text" name="username" id="username" required></br>
<label for="email">Email</label>
<input type="email" name="email"  id="email" required></br>
<label for="password">Password</label>
<input type="password" name="password" id="password" required></br>
<div class="form-group">
<input type="submit" name="create" value="Registrieren">
</div>
</body>
</html>

