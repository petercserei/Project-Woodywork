<<<<<<< HEAD
<?php

SESSION_START();
?>
=======
<?php include('contactverwerken.php');
?>

>>>>>>> 4d6f9ce9c409bfbf31b2efff7ac6cfc88bf66bc9
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>contact_page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="login_nav">
            <div class="center_nav">
<<<<<<< HEAD
                <?php
                    if(isset($_SESSION['acc_id'])) {
                    print '<div class="login_nav">
                            <div class="center_nav">
                                <form class=uitloggen-form action="includes/uitloggen-inc.php" method="POST">' ?>
                                    <?php print "<a href=" . "#" . "><p>" . $_SESSION['acc_gebruikersnaam'] . "</p></a>"?>
                                    <?php print '<a href="besteld.php" class="button_hide"><p>mijn bestellingen</p></a>'?>
                                    <?php print '<button onclick="fUitloggen()" class="button_hide" id="button_p" type="submit" name="uitloggen">uitloggen</button>
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
=======
                <li><a href="inloggen.php"><p>inloggen</p></a></li>
                <li><p>|</p></li>
                <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
>>>>>>> 4d6f9ce9c409bfbf31b2efff7ac6cfc88bf66bc9
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
                <li><a class="current_page" href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>

        <div class="container">
            <div class="grid_contact">
                <div class="contacttext">
                    <div class="formulieren">
                        <h3>Contact formulier</h3>
                        <br>
                        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" id="simpleform">
                            <div>
                                <label for="name">Naam:</label>
                                <input placeholder="Naam" type="text" name="name" id="name" value="<?= $name ?>">
                                <span class="error"><?= $name_error ?></span>
                            </div>
                            <div>
                                <label for="email">Email adres:</label>
                                <input placeholder="Email adres" type="text" name="email" id="email" value="<?= $email ?>" >
                                <span class="error"><?= $email_error ?></span>
                            </div>
                            <div>
                                <label for="message">Uw bericht:</label>
                                <textarea placeholder="Typ uw bericht hier..." name="message" id="message" rows="7" cols="40" value="<?= $message ?>"></textarea>
                            </div>
                            <div class="theSubmit">
                                <input type="submit" name="verzend" value="  Verzend  " style="height: 20px; width: 180px;">
                            </div>
                        </form>
                    </div>
                    <div class="adresgegevens"><h3>Adres gegevens</h3>
                        <ul id="adrescontact">
                            <li>WoodyWork</li>
                            <li>Zandhuisweg 33</li>
                            <li>8077 TC, Hulshorst</li>
                            <li>Tel. (0321)  -  (06) - 42642339</li>
                            <li>woodyworkdesign@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div id="map"></div>
                <script>
                    var map;
                    function initMap() {
                        var location = {lat: 52.360862, lng: 5.733572};
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: location,
                            zoom: 13
                        });
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMKXhI18EdJhqRvrXre9skCPpW3wjEsJg&callback=initMap" async defer></script>



            </div>
        </div>

        <footer>
            <div class="grid_footer">
                <div class="f1">

                </div>
            </div>


        </footer>
    </body>
</html>
