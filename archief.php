<?php
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database

$countsql = $pdo->prepare("SELECT COUNT(nieuwsID) as c FROM nieuws"); //count amount of items in portofolio
$countsql->execute();
$countrow = $countsql->fetch();
$count = $countrow["c"]; 


$nieuws = $pdo->prepare("SELECT * FROM nieuws ORDER BY nieuwsID DESC ");
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
                <li><a href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <?php
            for($i = 0; $i<$count;$i++){
                
                if($i%2==0){
                    print('<div class="archief">'); //container div voor elke drie divjes
                }
                
                

                //haal hier spul uit de database
                $row = $nieuws->fetch();
                //print de inhoud van het divje
                print(
                            '<div class="n'.($i%2).'">'
                                . '<h3>'.$row[1].'</h3>'
                                . '<p>'.$row[2].'</p>'
                                . '<p>'.$row[3].'</p>'
                            . '</div>'
                        );
                        
                if($i%2==1||$i==$count-1){ // sluit container div af na vijf divjes of na de laatste div
                    print('</div>');
                }
                
                
            }
            ?>
        </div>
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
    </body>
</html>
