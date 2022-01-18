<?php
    //setcookie("testcookie", "wert");
    session_start();
    include_once "dbaccess.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>



</head>
<header>

        <?php
        $pages = [ "home" => "./home.php",
                    "news" => "./news.php",
                    "imprint" => "./imprint.php",
                    "help" => "./help.php",
                    "login" => "./login.php",
                    "loginProcess" => "./loginProcess.php",
                    "createTicket" => "./createTicket.php",
                    "ticketList" => "./ticketList.php",
                    "loginTest" => "./loginTest.php",
                    "settings" => "./settings.php",
                    "allTickets" => "./allTickets.php",                   
                    "signUpGuest" => "./signUpGuest.php",
                    "userAdministration" => "./userAdministration.php",
                    "createNews" => "./createNews.php",
                    "editNews" => "./editNews.php",
                    "editNewsFormular" => "./editNewsFormular.php",
                    "userAdministration" => "./userAdministration.php",
                    "userEdit" => "./userEdit.php"];
        $site = "home";
        if (isset($_GET["site"])) {
            $site = $_GET["site"];
        }

    ?>
<?php
    include 'nav.php';
?>

</header>
<body>

  <main style="min-height: 100vh">
        <?php
        //  include "sites/" . $site . ".php";
            if (isset($pages[$site])) {
                include $pages[$site];
            } else {
                echo "404 site not found";
            }

        ?>  

    </main>

</body>

<footer class="my-0">
    <div class="bg-light my-0 pb-0" > 
        <div >
                <p class="m-0">Footer</p>
        </div>
    </div>

</footer>

</html>
