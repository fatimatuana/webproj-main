<body>
  <div class="container">
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
