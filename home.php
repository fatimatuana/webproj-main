<body>
    <div class="container">
        <h1>Startseite folgt..</h1>


         <?php
        if(isset($_SESSION["username"])) {
        ?>
        Hallo <?php echo $_SESSION["username"]; ?>!. Klicke <a href="logout.php" tite="Logout">hier</a> um dich auszuloggen.
        <?php
        }else echo "<h3>Sie sind nicht eingeloggt.</h3>";
        ?>
    </div>
</body>

