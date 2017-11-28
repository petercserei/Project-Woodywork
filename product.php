<?php
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database
$id = $_GET["id"];

$countsql = $pdo->prepare("SELECT COUNT(productenID) as c FROM plaatjes WHERE productenID = ".$id); //count aantal plaatjes
$countsql->execute();
$countrow = $countsql->fetch();
$count = $countrow["c"]-1; // print een plaatje manual dus -1


//alle plaatjes
$plaatjessql = $pdo->prepare("SELECT * FROM plaatjes WHERE productenID = ".$id." ORDER BY productenID DESC");
$plaatjessql->execute();

//stukje tekst
$tekstsql = $pdo->prepare("SELECT * FROM producten WHERE productenID = ".$id);
$tekstsql->execute();

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
            //print tekst en titel in middelste div
            //print alle plaatjes
             print('<div class="grid_portfolio">');
             $row = $tekstsql->fetch();
             print(       '<div class="p1">'
                        .       '<img src="data:image/jpg;base64,'.base64_encode($row[3] ).'">'
                        . '</div>'
                        . '<div class="p2">'
                        .       '<h2>'.$row[1].'</h2>'
                        .       '<p>'.$row[2].'</p>'
                        . '</div>');
               
             $row = $plaatjessql->fetch();
               print(     '<div class="p3">'
                        .       '<img src="data:image/jpg;base64,'.base64_encode($row[1] ).'">'
                        . '</div>'
                      . '</div>');
            
            
            
            for($i = 0; $i<$count;$i++){
                
                if($i%3==0){
                    print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                }
                
                

                //haal hierplaatje uit de database
                $row = $plaatjessql->fetch();
                //print de inhoud van het divje
                 print('<div class="p'.($i%3+1).'">'
                        . '<img src="data:image/jpg;base64,'.base64_encode($row[1] ).'">'
                        . '</div>');
                
                
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
