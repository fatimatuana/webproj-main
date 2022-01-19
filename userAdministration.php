<body>
    <div class = "container">
<?php
require_once ('dbaccess.php'); //to retrieve connection details

$sql = "SELECT * FROM users";
$result = $db_obj->query($sql);


echo "<h2>Gäste</h2>";
echo "<table class='table table-stripe'>";
echo "<tr>";
        
        echo "<th>Anrede</th>";
        echo "<th>Vorname</th>";
        echo "<th>Nachname</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>Status</th>";
        echo "<th>Edit</th>";
        
    echo "</tr>";

    

while ($row = $result->fetch_assoc()) { //_assoc works, _object not

    $currState = $row['state'];

    if($currState=='0') {
        $currState = "aktiv";
    } elseif($currState=='1') {
        $currState = "inaktiv";
    }
    
    echo "<tr>";
       
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" .  $currState . "</td>";
        echo "<td><a href=\"userEdit.php?id=". $row['id'] ."\" >Bearbeiten</a></td>";
    echo "</tr>";
    
    }
    echo "</table>";
?>
 </div>
</body>
