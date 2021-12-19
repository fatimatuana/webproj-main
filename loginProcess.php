<?php

 $sql = "Select * from users where username = ".$_SESSION["id"]." "; //dynamisch
            $result = $db_obj->query($sql);
          //  echo "FOUND ". $result->num_rows." tickets from user with id 1"; //dynamisch

          // $result->fetch_array() { //_assoc works, _object not

    if( $result->num_rows == 0){ //schöner darstellen?
        echo "Es gibt keinen Benutzer mit diesem Benutzernamen. Wenden Sie sich bitte an Ihren Administrator.";
    }

    if ($_POST["username"] == "admin" && $_POST["password"] == "123456") {
        $_SESSION["username"] = "admin";
        $_SESSION["id"] = 1; //dynamisch
        $_SESSION["role"] = "guest"; //dynamisch

    }

    /*
    if(isset($_SESSION["username"])) {
        	setcookie("testeingeloggt", "true");
            }
*/

            
    if(!isset($_SESSION["username"])) {
            setcookie("testeingeloggt", "true");
            
        $usernameErr = "UN error";
        $passwordErr = "PW Error";

        include './login.php';
    }

    else{

        header("Location:index.php");

    }



?>