<body>

<div style="position: relative; color: white;">
    <img width="100%" src="./images/hotel-home.jpg"/> <!-- usage of style attribute bc: design is only for that element -->
    <div style=" position: absolute; top: 50%;left: 25%;transform: translate(-50%, -50%); text-shadow: 5px 5px 6px #000000;">

             <?php
        if(isset($_SESSION["username"])) {
        ?>
        <h1 class="display-1">Hallo <?php echo $_SESSION["username"]; ?>!</h1> <!-- username from logged in user is displayed -->
        <?php
        }else echo "<h1 class='display-1'>Hallo lieber Gast!</h1>";
        ?>


</div>
</div>

    <div class="container text-center">
        <h3 class="my-5">Herzlich willkommen!</h3>
        <p>Charme, Gastfreundschaft, Komfort, Küche, Kunstsinnigkeit sowie modernste Zimmer und pures City-Vergnügen
             sind typische Kennzeichen der Wiener Seele im Hotel X Vienna am Hauptbahnhof. Für uns ist X 
             nicht nur ein Begriff. X ist ein Lebensmotto, nach dem wir handeln: Zu 100 % privat geführt und zu 100 % 
             aus Leidenschaft – mit Menschlichkeit und Servicequalität als obersten Geboten, im Zusammenspiel mit Verantwortung 
             gegenüber heimischen Produzenten und unserer Umwelt.<br> Planen Sie Ihre Übernachtung in Wien im Hotel X.</p>

        <div class="container mt-5">
            <div class="row">
                <img class="col-4" src="./images/hotel-fotos-1.jpg">
                <img class="col-4" src="./images/hotel-fotos-2.jpg">
                <img class="col-4" src="./images/hotel-fotos-3.jpg">
            </div>
        </div>

        <p class="my-5">Unsere stilvollen Zimmer und Suiten sind der ideale Ort zum Batterienaufladen. 
            Hier kannst du dich zurückziehen, relaxen und neue Kräfte sammeln. <br>Morgens stärkst du dich für deinen abwechslungsreichen Urlaubstag in den Bergen 
             an unserem umfangreichen Frühstücksbuffet mit saisonalen und regionalen Köstlichkeiten heimischer Produzenten.</p>
    </div>

</body>

