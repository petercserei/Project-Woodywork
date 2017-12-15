<?php

SESSION_START();

$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database





//inhoud van portofolio
$port = $pdo->prepare("SELECT pr.productID, titel, beschrijving, plaatje FROM product pr LEFT JOIN plaatjes pl ON pr.productID = pl.productID AND pr.plaatjeID = PL.plaatjeID ORDER BY pr.productID DESC LIMIT 2");
$port->execute();

//inhoud van nieuws
$nieuws = $pdo->prepare("SELECT * FROM nieuws ORDER BY nieuwsID DESC LIMIT 2");
$nieuws->execute();


?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>home_pagina</title>
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
                <li><a class="current_page" href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a>
                    <ul>
                        <li><a href="#.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                        <li><a href="#.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                    </ul>
                </li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="grid_home">
                <div class="h1"><a href="bedrijf.php">
                    <div class="bedrijf_text"><h1>Hoi!</h1><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><br><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p></div>
                    <div class="bedrijf_img"></div></a>
                </div>
                
                <div class="h2">
                    <a href="archief.php">
                        <div>
                            <?php
                            $row = $nieuws->fetch();
                            print(
                                          '<h3>'.$row[1].'</h3>'
                                        . '<p>'.$row[2].'</p>'
                                    . '<p>'.$row[3].'</p>'
                                    );
                            ?>
                        </div>
                        <div>
                            <?php
                            $row = $nieuws->fetch();
                            print(
                                          '<h3>'.$row[1].'</h3>'
                                        . '<p>'.$row[2].'</p>'
                                    . '<p>'.$row[3].'</p>'
                                    );
                            ?>
                        </div>
                    </a>
                </div>
                    
                <div class="h3">
                    <?php
                    $row = $port->fetch();
                    print('<a href="product.php?id='.$row["productID"].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row["titel"].'</h2>'
                                . '<p>'.$row["beschrijving"].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="img/portofolio/'.$row["plaatje"].'">'
                            . '</div>'
                        . '</a>');
                    ?>
                </div>
                <div class="h4">
                    <?php
                    $row = $port->fetch();
                    print('<a href="product.php?id='.$row["productID"].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row["titel"].'</h2>'
                                . '<p>'.$row["beschrijving"].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="img/portofolio/'.$row["plaatje"].'">'
                            . '</div>'
                        . '</a>');
                    ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
        <script src="scripts/uitloggen-inc.js"></script>
    </body>
</html>
