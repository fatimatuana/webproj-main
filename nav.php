<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-inverse">
      <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Hotel X</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-dark" id="navbarNav">
                <ul class="nav navbar-nav">
                  <li class="m-2"><a class="<?= ($site == "news" ? "active" : "") ?>" href=".?site=news">Aktuelles</a></li>
                  <li class="m-2"><a class="<?= ($site == "help" ? "active" : "") ?>" href="?site=help">Anleitung</a></li>
                  <li class="m-2"><a class="<?= ($site == "imprint" ? "active" : "") ?>" href="?site=imprint">Impressum</a></li>

                    <?php
                    if(!isset($_SESSION["username"])) { //if there is an user
                    ?>
                      <li class="m-2"><a class="<?= ($site == "login" ? "active" : "") ?>" href="?site=login">Login</a></li>
                      <!-- links for login &  sign up are only displayed if there is no user logged in -->
                     <?php } else {?>
                          <?php if($_SESSION["role"] == "guest") {?>
                                  <li class="m-2"><a class="<?= ($site == "ticketList" ? "active" : "") ?>" href="?site=ticketList">Meine Tickets</a></li>                    
                              <li class="dropdown">
                                  <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <?= $_SESSION["username"] ?>
                                  </a>
                                  <ul class="dropdown-menu dropdown-menu-dark">
                                    <a class="<?= ($site == "settings" ? "active" : "") ?> dropdown-item" href="?site=settings">Einstellungen</a>                   
                                      <a class="<?= ($site == "logout" ? "active" : "") ?> dropdown-item" href="./logout.php">Logout</a>
                                  </ul>
                                </li>

                               <?php } else {?>

                                <?php if($_SESSION["role"] == "technician") {?> <!-- if user is a technician -->
                                   <li class="m-2"><a class="<?= ($site == "allTickets" ? "active" : "") ?>" href="?site=allTickets">Tickets</a></li>
                                    <li class="m-2"><a class="<?= ($site == "logout" ? "active" : "") ?>" href="./logout.php">Logout</a></li>
                                    <?php } ?>
                                 <?php }?>
                      
                      <?php if($_SESSION["role"] == "admin") {?> <!-- if user is an admin -->
                                   <li class="dropdown">
                                  <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <?= $_SESSION["username"] ?>
                                  </a>
                                  <ul class="dropdown-menu dropdown-menu-dark">
                                  <a class="<?=($site == "signUpGuest.php" ? "active" : "") ?> dropdown-item" href="?site=signUpGuest">Gast registrieren</a>
                                  <a class="<?=($site == "userAdministration" ? "active" : "") ?> dropdown-item" href="?site=userAdministration">User verwalten</a>
                                    <a class="<?= ($site == "settings" ? "active" : "") ?> dropdown-item" href="?site=settings">Einstellungen</a>                   
                                      <a class="<?= ($site == "logout" ? "active" : "") ?> dropdown-item" href="./logout.php">Logout</a>
                                    </ul>
                                <?php } ?>

                    <?php }?>

                </ul>
            </div>
        </div>
        </nav>
