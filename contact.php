
<?php

SESSION_START();
?>

<?php include('contactverwerken.php');
?>
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
                <div class="formulier">
                    <h3>Contact formulier</h3>
                    <br>
                    <!--Zorgt ervoor dat de actie naar zijn eigen pagina verwijst-->
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" class="simpleform">

                        <label for="name">Naam:</label>
                        <input placeholder="Naam" type="text" id="name" value="<?= $name ?>" ><!--Onthoud de naam wanneer goed ingevuld-->
                        <span class="error"><?= $name_error ?></span><!--Geeft een error als de naam leeg is-->


                        <label for="email">Email adres:</label>
                        <input placeholder="Email adres" type="text" id="email" value="<?= $email ?>" ><!--Onthoud de email wanneer goed ingevuld-->
                        <span class="error"><?= $email_error ?></span><!--Geeft een error als de email niet goed is opgebouwd-->


                        <label for="message">Uw bericht:</label>
                        <textarea placeholder="Typ uw bericht hier..." id="message" rows="7" cols="40" value="<?= $message ?>"></textarea><!--Kijkt of het bericht leeg is en als de andere dingen fout zijn moet het bericht onthouden worden-->


                        <input class="thesubmit" type="submit" name="verzend" value="Verzend" style="height: 20px; width: 180px;">
                        <span><?= $success ?></span>

                    </form>
                </div>
                <div class="gegevens"><h3>Adres gegevens</h3>
                    <ul>
                        <li>WoodyWork</li>
                        <li>Zandhuisweg 33</li>
                        <li>8077 TC, Hulshorst</li>
                        <li>Tel. (0321)  -  (06) - 42642339</li>
                        <li>woodyworkdesign@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div id="map">
                <script>
                    //Je maakt een map aan//
                    var map;
                    //Functie om de map te laden//
                    function initMap() {
                        var location = {lat: 52.360862, lng: 5.733572}; //Locatie van Jeltes huis//
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: location,
                            zoom: 13
                        });
                        var marker = new google.maps.Marker({//pointer op de map
                            position: location, //pointer gaat op jeltes huis
                            map: map
                        });
                        google.maps.event.addDomListener(window, "resize", function () {//detecteert de breedte van de window
                            var center = map.getCenter();//pakt het midden van de map
                            google.maps.event.trigger(map, "resize");//zorgt ervoor dat de map meeschaalt
                            map.setCenter(center);//zorgt ervoor dat het midden in het midden blijft ongeacht vanaf welke kan je het scherm kleiner maakt.
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
