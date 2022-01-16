<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gäste-Registration</title>
  <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body>
  <div class ="container">
<form action="insert_into_db.php" method="post">
  <h2>Neuen Gast anlegen</h2>

<input type="radio" name="gender"  id="male" value="male"> 
<label for="gender">Herr</label></br>

<input type="radio" name="gender"  id="female" value="female">
<label for="gender">Frau</label></br>

<label for="firstname">Vorname</label>
<input type="text" name="firstname"  class="form-control" id="firstname" required></br>

<label for="lastname">Nachname</label>
<input type="text" name="lastname" class="form-control" id="lastname" required></br>

<label for="username">Username</label>
<input type="text" name="username" class="form-control" id="username" required></br>

<label class="mt-3" for="email">Email</label>
<input type="email" name="email" class="form-control"  id="email" required></br>

<label class="mt-3"for="password">Passwort</label>
<input type="password" name="password" class="form-control" id="password" required></br>
<div class="form-group">

<input type="submit" class="mt-3 btn btn-primary" name="create" value="Registrieren">
</div>

</div>
</body>
</html>
