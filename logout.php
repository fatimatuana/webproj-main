<?php
    session_start();
    //setcookie("testeingeloggt", "false");
    session_unset();
    header("Location:index.php");
?>