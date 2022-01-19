<?php
$usernameInp="";
if(isset($_POST["login"]) && isset($_POST["username"])){ 

        $usernameInp = $_POST["username"];
        $sql = "Select * from users where username = '".$_POST["username"]."'"; //dynamisch
        $result = $db_obj->query($sql);

    if($result->num_rows == 0){ //if no user found
        $nouserErr = "Es gibt keinen Benutzer mit diesem Benutzernamen. Wenden Sie sich bitte an Ihren Administrator.";
    }
    else{ //if there is a user with th username
        $row = $result->fetch_array(); 
        $hash = $row["password"];
        if (password_verify($_POST["password"], $hash)) {
            $_SESSION["username"] = $row['username'];
            $_SESSION["id"] = $row['id'];
            $_SESSION["role"] = $row['role'];
            header("Location:index.php");
        }
       else{ //wrong password
            if(!isset($_SESSION["username"])) {
                $passwordErr = "Das eingegebene Passwort ist falsch. Sollten Sie Ihr Passwort vergessen haben, wenden Sie sich bitte an Ihren Administrator."; //** */
            }
        }
    }
       
    }

?>

<body>
<div class="container">
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
                <p class="error mt-2"><?php echo $passwordErr?></p>
            <?php  } ?>
        </div>
        <div class="form-group">
         <?php if(isset($nouserErr)){ ?>
            <p class="error"><?php echo $nouserErr?></p>
            <?php  } ?>
            <button type="submit" class="btn btn-primary btn-block mt-2" value="Submit" name="login">Log in</button>
        </div>      
    </form>
</div>
</body>
