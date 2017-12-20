<?php
SESSION_START();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>registreren_pagina</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="login_nav">
            <div class="center_nav">
                <?php
                    if(isset($_SESSION['acc_id'])) {
                    print '<div class="login_nav">
                            <div class="center_nav">
                                <form class=uitloggen-form action="includes/uitloggen-inc.php" method="POST">' ?>
                                    <?php print "<a href=" . "#" . "><p>" . $_SESSION['acc_gebruikersnaam'] . "</p></a>"?>
                                    <?php print '<a href="besteld.php" class="button_hide"><p>mijn bestellingen</p></a>'?>
                                    <?php print '<a href="besteld.php" class="button_hide"><p>mijn bestellingen</p></a>'?>
                                    <?php print '<a href="besteld.php" class="button_hide"><p>mijn bestellingen</p></a>'?>
                                    <?php print '<button class="button_hide" id="button_p" type="submit" name="uitloggen">uitloggen</button>
                                </form>
                            <li><p>|</p></li>
                            <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
                            </div>
                        </div>';
                        
                    } else {
                        print '<div class="login_nav">
                            <div class="center_nav">
                            <li><a href="inloggen.php"><p>inloggen</p></a></li>
                            <li><p>|</p></li>
                            <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
        <div class="picture_header">
            
        </div>
        <nav class="shadow">
            <ul>
                <li><a href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="grid_registreren">
                <form class="registreren-form" action="includes/registreren-inc.php" method="POST">
                    <div class="container-item"><input onblur="onValidateEmail()" id="email" class="reg-item" type="email" name="email" placeholder="Email">
                        <i id="checkmark-email" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-email" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text_beschikbaar" class="error2">email is niet beschikbaar</div>
                        <div id="error_text_leeg" class="error2">email is niet geldig</div>
                    <div class="container-item"><input onblur="onValidateGebruikersnaam()" id="gebruikersnaam" class="reg-item" type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">
                        <i id="checkmark-gebruikersnaam" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-gebruikersnaam" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text_beschikbaar2" class="error2">gebruikersnaam is niet beschikbaar</div>
                        <div id="error_text_alfanr" class="error3">gebruikersnaam mag geen niet-alfanumerieke tekens bevatten</div>
                        <div id="error_text_length" class="error3">gebruikersnaam moet minimaal 3 karakters bevatten</div>
                        <div id="error_text_maxlength" class="error3">gebruikersnaam mag maximaal 20 karakters bevatten</div>
                    <div class="container-item"><input onblur="onValidateWachtwoord()" id="wachtwoord" class="reg-item" type="password" name="wachtwoord" placeholder="Wachtwoord">
                        <i id="checkmark-wachtwoord" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-wachtwoord" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text" class="error2">wachtwoord moet minimaal 7 karakters bevatten</div>
                        <div id="error_text2" class="error3">wachtwoord moet minimaal 1 niet-alfanumeriek teken bevatten</div>
                    <div class="container-item"><input onblur="onValidateWachtwoord2()" id="wachtwoord2" class="reg-item" type="password" name="wachtwoord2" placeholder="Herhaal wachtwoord">
                        <i id="checkmark-wachtwoord2" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-wachtwoord2" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text3" class="error2">wachtwoord moet minimaal 7 karakters bevatten</div>
                        <div id="error_text4" class="error3">wachtwoord moet minimaal 1 niet-alfanumeriek teken bevatten</div>
                        <div id="error_text_equal2" class="error3">wachtwoorden zijn niet gelijk</div>
                    <button class="reg-item" onclick="fRegistreren()" type="submit" name="registreren">Account aanmaken</button>
                </form>
            </div>
        </div>
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
        <script src="scripts/checkmarks-inc.js"></script>
    </body>
</html>