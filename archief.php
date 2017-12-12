<?php

SESSION_START();
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
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <?php
            $x=0;
            if(isset($_SESSION['acc_id'])){ // check if admin
                print('<div class="archief">'
                    . '<div class="n0">'
                    .  '<a href="nieuwsbewerken.php?id=nieuw">'  
                    . 'nieuw'  
                    . '</a>'
                    . '</div>');
                $count++;
                $x=1;
            }
            for($i = $x; $i<$count;$i++){
                
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
                                . '<p>'.$row[3].'</p>');
                if(isset($_SESSION['acc_id'])){//check if admin
                    print(
                             '<a href="nieuwsbewerken.php?id='.$row[0].'">'  
                            . 'bewerken'  
                            . '</a>');
                }
                
                print('</div>');
                if($i%2==1||$i==$count-1){ // sluit container div af na twee divjes of na de laatste div
                    
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
