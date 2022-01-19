<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body>
 <div class="container">
<?php
require_once('dbaccess.php');    //Verbinden mit der Datenbank
 
$id = $_GET['id'];     //Speichern der id des News-Beitrages in einer Variablen.
 
$sql = "SELECT * FROM news WHERE id = '".$id."' LIMIT 1";  //Übersetzt: Nimm alles von news, wo id gleich $id ist, maximal 1
$ergebnis = mysqli_query($db_obj, $sql);
 
$row = mysqli_fetch_object($ergebnis);
 
?>
<html>
    <head>
        <title>Beitrag bearbeiten</title>
    </head>
    <body>
        <h1>Beitrag bearbeiten</h1>


        <div class="form-group">
        <form action="editNews.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            Titel: <input class="form-control" type="text" name="title" value="<?php echo $row->title; ?>" /><br />
            
            Beitrag: <textarea class="form-control" name="content" cols="38" rows="10" ><?php echo $row->content; ?></textarea><br />

            Autor: <input class = "form-control" type="text" name="author" value="<?php echo $row->author; ?>"  /><br />

          <!-- Image upload -->
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
</div>
</div>
</div>
</body>
</html>
