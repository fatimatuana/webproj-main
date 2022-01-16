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
require_once ('dbaccess.php'); //to retrieve connection details

$sql = "SELECT * FROM guests";
$result = $db_obj->query($sql);


echo "<h2>Gäste</h2>";
echo "<table class='table table-stripe'>";
echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Anrede</th>";
        echo "<th>Vorname</th>";
        echo "<th>Nachname</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>Edit</th>";
    echo "</tr>";

while ($row = $result->fetch_assoc()) { //_assoc works, _object not

    
    echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "<td>" . $row['Firstname'] . "</td>";
        echo "<td>" . $row['Lastname'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td><a href=\"userEdit.php?id=". $row['ID'] ."\" >Bearbeiten</a></td>";
    echo "</tr>";
    
    }
    echo "</table>";
?>
 </div>
</body>
</html>

