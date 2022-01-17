<?php
    $userdatahaschanged = 0;
    $sql = "Select * from users where id = ".$_SESSION["id"]." "; //dynamisch
        $result = $db_obj->query($sql);
        $row = $result->fetch_array();

        $email = $row["email"];
        $hash = $row["password"]; 
        $user_id = $row["id"];
    

        $err = "";
        if(isset($_POST["email"])){

            if(isset($_POST["password"]) && isset($_POST["newpassword"]) && isset($_POST["newpassword2"])){
                $newpassword = $_POST["newpassword"];
                $newpassword2 = $_POST["newpassword2"];

                if($newpassword == $newpassword2){
                    if (password_verify($_POST["password"], $hash)) {
                        $newpasswordAuth = password_hash($newpassword2, PASSWORD_DEFAULT);
                            $sql2 = "UPDATE users set email =?, password =? where id=?";

                            $stmt = $db_obj->prepare($sql2);
                            $email = $_POST["email"];
                            $user_id = $_SESSION["id"];

                            $stmt->bind_param("ssi",$email, $newpasswordAuth, $user_id); 
                            $stmt->execute();
                    }
                    else{
                        $err = "Ihr altes Passwort stimmt nicht.";
                    }
                }
                else if($newpassword != $newpassword2){
                    $err = "Die eingegebenen Passwörter stimmen nicht überein.";
                }
            }

            else{
                $sql2 = "UPDATE users set email =? where id=?";
                $stmt = $db_obj->prepare($sql2);

                $email = $_POST["email"];
                $user_id = $_SESSION["id"];

                $stmt->bind_param("si",$email, $user_id); 
                $stmt->execute();
            }

           $userdatahaschanged = 1; 
          header("refresh:2;url=?site=ticketList" ); //redirect after 2 sec
        }
?>

<body>
    <div class="container">

                <?php if( $userdatahaschanged  == 1){ ?>
            <div class=" mt-3 alert alert-success pb-1" role="alert">
                <h4 class="alert-heading">Ihre Daten wurden erfolgreich geändert! </h4>
                <hr> 
                <p class="mb-0">Sie werden in Kürze weitergeleitet!</p>
            </div>
            <?php } else{?>

        <h1>Meine Daten</h1>

        <form method="post" >
        <p><?= $err ?></p>
            <label for="username">Benutzername</label>
            <input id="username" disabled class="form-control" value="<?= $row["username"]?>"></input>    
            
            <label class="mt-3" for="email">E-mail Adresse</label>
            <input id="email" name="email" type="email" class="form-control" value="<?= $row["email"]?>"></input>

            <label class="mt-3" for="password">Altes Passwort:</label>
            <input id="password" name="password"  class="form-control" type="password"></input>

            <label class="mt-3" for="password">Neues Passwort:</label>
            <input id="password" name="newpassword" type="password" class="form-control"></input>

            <label class="mt-3" for="password">Neues Passwort wiederholen:</label>
            <input id="password" name="newpassword2" type="password" class="form-control"></input>

            <button class="mt-3 btn btn-primary" name="save" type="submit" >Änderungen speichern</button>
            
        </form>
          <?php }?>
    </div>
</body>
