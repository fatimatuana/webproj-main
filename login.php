<?php

$usernameInp="";
//$usernameInp = "admin";
if(isset($_POST["login"]) && isset($_POST["username"])){ //+

        $usernameInp = $_POST["username"];
        $sql = "Select * from users where username = '".$_POST["username"]."'"; //dynamisch
        $result = $db_obj->query($sql);
          //  echo "FOUND ". $result->num_rows." tickets from user with id 1"; //dynamisch

          // $result->fetch_array //_assoc works, _object not

    if($result->num_rows == 0){ //schöner darstellen?
        echo "Es gibt keinen Benutzer mit diesem Benutzernamen. Wenden Sie sich bitte an Ihren Administrator.";
    }
    else{ //wenn es einen user gibt

         $row = $result->fetch_array(); //_assoc works, _object not

        $password = "123456"; //verify mit der db //fehlt: erst nach der Registrierung
        //echo "Das eingegebene Passwort ist falsch.";

        if ($_POST["password"] == "123456") {
            $_SESSION["username"] = $row['username'];
            $_SESSION["id"] = $row['id']; //dynamisch
            $_SESSION["role"] = $row['role']; //dynamisch
            header("Location:index.php");

        }

       else{

        if(!isset($_SESSION["username"])) {
            //setcookie("testeingeloggt", "true");     
            $usernameErr = "UN error";
            $passwordErr = "Das eingegebene Passwort ist falsch."; //** */
        }

     }

} //+++
       

    }



?>

<body>
<div class="container">
    <!-- <form  method="post" action="index.php?site=loginProcess"> -->
        <form  method="post" >

        <h1 class="text-center">Log in</h2>       
        <div class="">
            <input type="text" class="form-control mt-2" name="username" placeholder="Benutzername" required="required" autocomplete="off" value="<?= $usernameInp ?>">
            <?php if(isset($usernameErr)){ ?>
                <p class="error"><?php echo $usernameErr?></p>
            <?php  } ?>
        </div>
        <div class="form-group">
            <input type="password" autocomplete="off" class="form-control mt-2" placeholder="Passwort" name="password" required="required">
            <?php if(isset($passwordErr)){ ?>
                <p class="error"><?php echo $passwordErr?></p>
            <?php  } ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block mt-2" value="Submit" name="login">Log in</button>
        </div>      
    </form>
</div>
</body>



<!-- <body>
<div class="container">
        <form  method="post" action="index.php?site=loginProcess">

        <h1 class="text-center">Log in</h2>       
        <div class="">
            <input type="text" class="form-control mt-2" name="username" placeholder="Benutzername" required="required" autocomplete="off" value="<?php if(isset($_POST["username"])) echo $_POST["username"] ?>">
            <?php if(isset($usernameErr)){ ?>
                <p class="error"><?php echo $usernameErr?></p>
            <?php  } ?>
        </div>
        <div class="form-group">
            <input type="password" autocomplete="off" class="form-control mt-2" placeholder="Passwort" name="password" required="required">
            <?php if(isset($passwordErr)){ ?>
                <p class="error"><?php echo $passwordErr?></p>
            <?php  } ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block mt-2" value="Submit" name="login">Log in</button>
        </div>      
    </form>
</div>
</body> -->