<?php 

  if($_SESSION['role'] != "guest") //only guests have access to this page
  {
    header("location: index.php");
  }

     if(isset($_POST["openTicket"]) && isset($_POST["id"])){
            $sql2 = "UPDATE tickets set state='offen' where id=?";
            $stmt = $db_obj->prepare($sql2);

            $ticket_id = $_POST["id"];
            
            $stmt->bind_param("i" ,$ticket_id); 
            $stmt->execute();
        }

?>

<body>
    <div class="container">

<h1>Meine Tickets</h1>

<a type="button" class="btn btn-primary btn-lg" name="newTicket" href="?site=createTicket">Neues Ticket erstellen +</a>

<?php
            $sql = "Select * from tickets where user_id = ".$_SESSION["id"]." "; 
            $result = $db_obj->query($sql);
        
          if( $result->num_rows == 0){ 
            echo "<p class='mt-3'>Sie haben noch keine Tickets erstellt.</p>";
          }

              else { ?>
                <div class="container my-3 d-none d-md-block"> <!-- display if > md -->
                    <div class="row">
                      <div class="col-sm">
                        <h3>Titel</h3>
                      </div>
                      <div class="col-sm mx-auto justify-content-center">
                        <h3>Beschreibung</h3>
                      </div>
                      <div class="col-sm">
                        <h3>Bild</h3>
                      </div>
                      <div class="col-sm">
                        <h3>Status</h3>
                      </div>
                    </div>
                  </div>

              <?php } ?>
          <?php
            while ($row = $result->fetch_array()) {
            echo '<div class="container">
                      <form method="post" enctype="multipart/form-data">

                    <div class="row mt-3">
                      <input name="id" value='.$row['id'].' hidden></input>
                      <div class="col-sm">
                         <h5 class="card-title"><strong>'.$row['title'].'</strong></h5>
                      </div>
                      <div class="col-sm mx-auto justify-content-center">
                      <p class="card-text ">'.$row['info'].'</p>
                      </div>
                      <div class="col-sm p-2">
                        <img class="card-img-top" src="./uploadGuest/'.$row['image'].'" alt="image"> 
                      </div>
                      <div class="col-sm">
                        <p class="card-text">'.$row['state'].'</p>';
                        
                      if($row["state"] == "erfolglos geschlossen") {
                         echo ' <button class="btn btn-danger" name="openTicket">erneut eröffnen &#x21ba;</button>';
                      } 
                        echo '
                            <div class="col-sm">
                        <p class="card-text mt-3">'.$row['reply'].'</p>
                      </div>
                    </div>
                    </form>
                  </div>';


          }


         ?>
</div>
</body>
