<!DOCTYPE html>
<html lang="en">
<body>

    <div class = "container">
    <h1>Hotel X - News</h1>
<?php


require_once('dbaccess.php'); //Verbindung mit der DB

if(!isset($seite))     //Falls keine Seite angegeben ist,
        {
            $seite = 1;         //Wird Seite 1 aufgerufen.
        }
 
        $eintraege_pro_seite = 10;     //Einträge pro Seite
 
        $start = $seite * $eintraege_pro_seite - $eintraege_pro_seite;     //Ausrechnen, von wo die Abfrage beginnen soll

        $abfrage = "SELECT * FROM news ORDER BY id DESC LIMIT $start, $eintraege_pro_seite";     //Übersetzt: Nimm alles aus news, ordne nach id, absteigend von $start bis $eintraege_pro_seite
        $ergebnis = mysqli_query($db_obj,$abfrage);     //Senden des Querys an MySQL
        while($row = mysqli_fetch_object($ergebnis))     //Jede Zeile mittels mysql_fetch_object() auslesen.
        {
            $id = $row->id;     //$id deklarieren
            $date = date("d.m.Y H:i", $row->dateTime);    //Da das Datum als Timestamp gespeichert ist, muss es formatiert werden; dies geht mit date()   
            $title = $row->title;
            $author=$row->author;    //$titel deklarieren
            $content = $row->content;     //$beitrag deklarieren
            $image = $row->image;

            //Ausgeben der Beiträge in einer Tabelle
        
           echo "
           
           <table border='0' cellspacing='0' cellpadding='5'>
               
            <tr>
                <td>
                    
                    <b>$title</b>
                   </td>
               </tr>
               <tr>
                   <td>
                       $content
                   </td>
               </tr>
               <tr>
                   <td>
                   <img class='card-img-top' src='./uploadImage/".$image."' alt='image' width=300 height=300>
                   </td>
               </tr>
               <tr>
               <td>
                   Von $author --- $date    <a href='editNewsFormular.php?id=$id'>Bearbeiten</a></button>
                   <hr>
               </td>
           </tr>  
              
               </table>";
               
           }
 
 
        $result = mysqli_query($db_obj,"SELECT id FROM news");     //Übersetzt: Nimm id von news
        $menge = mysqli_num_rows($result);     //Zählen der Datensätze
 
 
        $wieviel_seiten = $menge / $eintraege_pro_seite;     //Errechnen der Seiten
 
        echo '<br /><br />';
        echo "<b>Seite:</b> ";
 
 
 
        for($a=0; $a < $wieviel_seiten; $a++)     //Schleife, um für jede Seite eine Ziffer mit Link zu erstellen.
        {     //Übersetzt: $a ist gleich 0. Solange $a kleiner als $wieviel_seiten ist, wird die Schleife ausgeführt und bei jedem Durchlauf wird $a um eins erhöht.
            $b = $a + 1;
 
            if($seite == $b)
            {
                echo "  <b>$b</b> ";     //Aktuelle Seite fett darstellen
            }
            else
            {
               echo "  Test ";     //Alle anderen Seiten verlinken.
            }
        }

       /* if($_SESSION['role'] != "admin") {       //only admins can create news
        echo "<a href='?site=createNews'>Neuen Beitrag erstellen</a>";
        }*/

        ?>

        <a href='?site=createNews'>Neuen Beitrag erstellen</a>
   

    </div>
</body>
</html>
