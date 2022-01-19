<?php 

  if($_SESSION['role'] != "technician") //only technicians have access to this page
  {
    header("location: index.php");
  }
        if(isset($_POST["save"]) && isset($_POST["opt"]) && isset($_POST["id"])){
            $sql2 = "UPDATE tickets set state =?, reply=? where id=?";
            $stmt = $db_obj->prepare($sql2);

            $reply = $_POST["reply"];
            $state = $_POST["opt"];
            $ticket_id = $_POST["id"];
            
            $stmt->bind_param("ssi",$state ,$reply ,$ticket_id); 
            $stmt->execute();

        }


        if(isset($_POST["replyBtn"]) && isset($_POST["reply"])){
            $sql2 = "UPDATE tickets set reply=? where id=?";
            $stmt = $db_obj->prepare($sql2);

            $reply = $_POST["reply"];
            $ticket_id = $_POST["id"];
            
            $stmt->bind_param("si",$reply ,$ticket_id); 
            $stmt->execute();
        }

        $selected ="alle"; //default value
        if(isset($_POST["optSearch"])){
              $selected = $_POST["optSearch"];
        }
?>

<head>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<body>
    <div class="container">


<h1>Alle Tickets</h1>

<div class="row mb-3">
  <form method="post" enctype="multipart/form-data">
  <div class="col-md-10 col-12">
    <select name="optSearch" class="form-select">
        <option value="alle" <?= $selected == "alle" ? "selected" : ""?>>alle</option>
        <option value="offen" <?= $selected == "offen" ? "selected" : ""?>>offen</option>
        <option value="erfolglos geschlossen" <?= $selected == "erfolglos geschlossen" ? "selected" : ""?> >erfolglos geschlossen</option>
        <option value="erfolgreich geschlossen" <?= $selected == "erfolgreich geschlossen" ? "selected" : ""?> >erfolgreich geschlossen</option>
    </select>
    </div>
    <button class="btn btn-primary  col-md-2 col-12" type="submit" name="search">suchen</button>
  </form>
</div>
                      
                            
<?php
  if(isset($_POST["search"]) && $_POST["optSearch"] != "alle"){
    $sql = "Select * from tickets where state = '".$_POST["optSearch"]."'";
     $selected =  $_POST["optSearch"];
  }
  else{
    $sql = "Select * from tickets";
  }
          $result = $db_obj->query($sql);
          
          if( $result->num_rows == 0){
            echo "<p class='mt-3'>Es sind keine Tickets vorhanden.</p>";
          }

              else { ?>
                <div class="container my-3 d-none d-md-block">
                    <div class="row">
                      <div class="col-sm-3">
                        <h3>Titel</h3>
                      </div>
                      <div class="col-sm-5">
                        <h3>Beschreibung</h3>
                      </div>
                      <div class="col-sm-4">
                        <h3>Status</h3>
                      </div>
                    </div>
                  </div>

              <?php } ?>
          <?php
            while ($row = $result->fetch_array()) { 
            echo '<div class="container">
                  <form method="post" enctype="multipart/form-data">
                    <input name="id" value='.$row['id'].' hidden></input>

                    <div class="row mb-3">
                      <div class="col-sm-3">
                         <h5 class="card-title"> <strong>'.$row['title'].'</strong></h5>
                         <p>'.date("d.m.Y H:i",strtoTime($row['timestamp'])).'</p>
                      </div>
                      <div class="col-sm-5">
                      <p class="card-text">'.substr($row['info'],0,35).'...</p>
                      
                          <input name="id" value='.$row['id'].' hidden></input>

                          <!-- The Modal -->
                         <div> 
                              <button name="opnModal" type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#myModal'.$row['id'].'" >
                              Mehr anzeigen
                            </button>
                            <div class="modal" id="myModal'.$row['id'].'">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                
                                  <div class="modal-header">
                                    <h4 class="modal-title"><strong>'.$row['title'].'</strong></h4>
                                    <button type="button" class="btn close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                  <div class="col-sm-6 p-2">
                                    <img class="card-img-top" src="./uploadGuest/'.$row['image'].'" alt="image"> 
                                </div>
                                                           '.$row['info'].'
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  <!-- The Modal -->
                       </div>  

                      <div class="col-sm-4">
                        <select name="opt" class="form-select">
                            <option value="offen" '.($row['state'] == "offen" ? "selected" : "").'>offen</option>
                            <option value="erfolglos geschlossen" '.($row['state'] == "erfolglos geschlossen" ? "selected" : "").'>erfolglos geschlossen</option>
                            <option value="erfolgreich geschlossen" '.($row['state'] == "erfolgreich geschlossen" ? "selected" : "").'>erfolgreich geschlossen</option>
                            </select>
                            <button class="btn btn-primary mt-1" type="submit" name="save">ändern</button>

                        <div class="form-group">
                            <textarea name="reply" class="form-control rounded-2 mt-1" rows="3" placeholder="Schreiben Sie eine Antwort...">'.$row['reply'].'</textarea>
                            <button name="replyBtn" class="btn btn-secondary mt-1">Antworten</button>
                        </div>

                      </div>

                    </div>
                    </form>
                  </div>';
          }


            print_r($result->fetch_array(MYSQLI_ASSOC));
            print_r($result->fetch_assoc());
            echo "<pre>";

       
       ?>


</div>
</body>
