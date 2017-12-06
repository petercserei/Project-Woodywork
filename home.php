<?php
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database





//inhoud van portofolio
$port = $pdo->prepare("SELECT * FROM producten ORDER BY productenID DESC LIMIT 2");
$port->execute();

//inhoud van nieuws
$nieuws = $pdo->prepare("SELECT * FROM nieuws ORDER BY nieuwsID DESC LIMIT 2");
$nieuws->execute();

?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>home_page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="login_nav">
            <div class="center_nav">
            <li><a href="inloggen.php"><p>inloggen</p></a></li>
            <li><p>|</p></li>
            <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
            </div>
        </div>
        <div class="picture_header">
            
        </div>
        <nav class="shadow">
            <ul>
                <li><a class="current_page" href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
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
                    <!--<a href="archief.php">-->
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
                    print('<a href="product.php?id='.$row[0].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row[1].'</h2>'
                                . '<p>'.$row[2].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="data:image/jpg;base64,'.base64_encode($row[3] ).'">'
                            . '</div>'
                        . '</a>');
                    ?>
                </div>
                <div class="h4">
                    <?php
                    $row = $port->fetch();
                    print('<a href="product.php?id='.$row[0].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row[1].'</h2>'
                                . '<p>'.$row[2].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="data:image/jpg;base64,'.base64_encode($row[3] ).'">'
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
    </body>
</html>
