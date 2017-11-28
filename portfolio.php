<?php
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database


$countsql = $pdo->prepare("SELECT COUNT(productenID) as c FROM producten"); //count amount of items in portofolio
$countsql->execute();
$countrow = $countsql->fetch();
$count = $countrow["c"]; 


//inhoud van portofolio
$stmt = $pdo->prepare("SELECT * FROM producten ORDER BY productenID DESC");
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>portfolio_page</title>
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
                <li><a class="current_page" href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
             <?php
            //maak een variable voor het aantal producten
            //loop door de producten en schrijf voor elk product div + class h2 en p
            //voeg voor elke vijf een container div eromheen toe
            
            
            
            
            //aantal producten uit de database:
            
            
            for($i = 0; $i<$count;$i++){
                
                if($i%3==0){
                    print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                }
                
                

                //haal hier spul uit de database
                $row = $stmt->fetch();
                //print de inhoud van het divje
                print('<div class="p'.($i%3+1).'"><a href="product.php?id='.$row[0].'">'
                        . '<h2>'.$row[1].'</h2>'
                        . '<img src="data:image/jpg;base64,'.base64_encode($row[3] ).'">'
                        . '</a></div>');
                
                
                if($i%3==2||$i==$count-1){ // sluit container div af na vijf divjes of na de laatste div
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
