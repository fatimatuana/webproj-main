<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
 
 require_once('dbaccess.php');     //Verbinden mit der Datenbank
  
 $id = $_GET['id'];                 // | $id aus dem Link auslesen
 $title = $_POST['title'];            // |
 $author = $_POST['author'];          // | Werte aus dem Formular in
 $contenet = $_POST['content'];          // | Variablen speichern.
 
 
 /* --- Felder prüfen --- */
 if(empty($title)){echo 'Das Feld "Title" muss ausgef&uuml;llt sein! <a href="createNewsFormular.php">Zur&uuml;ck</a><br />';}        // | Prüfen ob die Felder aus-
 if(empty($author)){echo 'Das Feld "Author" muss ausgef&uuml;llt sein! <a href="createNewsFormular.php"">Zur&uuml;ck</a><br />';}     // | gefuellt wurden.
 if(empty($content)){echo 'Das Feld "Content" muss ausgef&uuml;llt sein! <a href="createNewsFormular.php"">Zur&uuml;ck</a><br />';}      // | Falls nicht, wird eine
                                                                                                                              // | Fehlermeldung ausgegeben.
  
 if(!empty($title) && !empty($content) && !empty($author))   //Falls alle nötigen Felder NICHT leer sind,
 {
     $sql = "UPDATE news SET title = '$title', author = '$author', content = '$content' WHERE id = '".$id."'";
     $update = mysql_query($sql);        //Übersetzt: Aktualisiere news setze .... wo id = $id ist
  
     if($update == true)  //Wenn alles gutgegangen ist
     {
         echo 'Der Beitrag wurde erfolgreich ge&auml;ndert. <a href="index.php">Startseite</a>';
     }
     else   //ansonsten
     {
         echo 'Fehler beim &Auml;ndern des Beitrages. <a href="bearbeiten_formular.php?id='.$id.'">Zur&uuml;ck</a>';
     }
 }
 ?>
</body>
</html>