<?php
    $userdatahaschanged = 0;
    $sql = "Select * from users where id = ".$_SESSION["id"]." "; //dynamisch
        $result = $db_obj->query($sql);
        $row = $result->fetch_array();

        $email = $row["email"];
        $password = $row["password"]; //to be implemented..
        $user_id = $row["id"];
    
        if(isset($_POST["save"]) && isset($_POST["email"]) && isset($_POST["password"])){
            $sql2 = "UPDATE users set email =?, password =? where id=?";
            $stmt = $db_obj->prepare($sql2);

            $email = $_POST["email"];
            $password = $_POST["password"]; //to be implemented..
            $user_id = $_SESSION["id"];

            $stmt->bind_param("ssi",$email, $password, $user_id); 
            $stmt->execute();

           $userdatahaschanged = 1; //
          //  header("Location:?site=ticketList"); 
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
            <label for="username">Benutzername</label>
            <input id="username" disabled class="form-control" value="<?= $row["username"]?>"></input>    
            
            <label class="mt-3" for="email">E-mail Adresse</label>
            <input id="email" name="email" class="form-control" value="<?= $row["email"]?>"></input>

            <label class="mt-3" for="password">Password:</label>
            <input id="password" name="password"  class="form-control" value="<?= $row["password"]?>"></input>


            <button class="mt-3 btn btn-primary" name="save" type="submit">Änderungen speichern</button>

            
        </form>
          <?php }?>
    </div>
</body>
