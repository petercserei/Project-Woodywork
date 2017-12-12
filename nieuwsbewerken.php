<?php

SESSION_START();
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database

if(TRUE){//check if admin
        if(isset($_POST["update"])){
            $nieuws = $pdo->prepare('UPDATE nieuws SET titel = ?, tekst = ?, datum = ? WHERE nieuwsID=?');
            $nieuws->execute(array($_POST["titel"],$_POST["tekst"],$_POST["datum"],$_GET["id"]));
            header( "Location: archief.php" );
        }
        if(isset($_POST["insert"])){
            $nieuws = $pdo->prepare("INSERT INTO nieuws (titel, tekst, datum)VALUES (?,?,?)");
            $nieuws->execute(array($_POST["titel"],$_POST["tekst"],$_POST["datum"]));
            header( "Location: archief.php" );
        }
        if(isset($_POST["delete"])){
            $nieuws = $pdo->prepare('DELETE FROM nieuws WHERE nieuwsID=?');
            $nieuws->execute(array($_GET["id"]));
            header( "Location: archief.php" );
        }
}

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
            <div class="nieuwsbewerkengrid">
                <div class="nb0">
            <?php
                if(isset($_SESSION['acc_id'])){ // check if admin
                    if($_GET["id"]=="nieuw"){ //check nieuw of bewerken
                        print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<label for="titel">titel:</label><input type="text"  id="titel" name="titel"><br>'
                            . '<label for="tekst">tekst:</label><textarea name="tekst"  id="tekst">Enter text here...</textarea><br>'
                            . '<label for="datum">datum:</label><input type="text" name="datum"  id="datum" value="'.date('d').'-'.date('m').'-'.date('y').'"><br>'  
                            . '<label></label><input type="submit" name="insert" value="opslaan">'  
                            . '</form>');
                        } else {
                            $nieuws = $pdo->prepare("SELECT * FROM nieuws WHERE nieuwsID =".$_GET["id"]);
                            $nieuws->execute();
                            $row=$nieuws->fetch();

                            print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<label for="titel">titel:</label><input type="text"  id="titel" name="titel" value="'.$row[1].'"><br>'
                            . '<label for="tekst">tekst:</label><textarea name="tekst"  id="tekst">'.$row[2].'</textarea><br>'
                            . '<label for="datum">datum:</label><input type="text" name="datum"  id="datum"  value="'.$row[3].'"><br>'  
                            . '<label></label><input type="submit" name="update" value="opslaan">'  
                            . '<input type="submit" name="delete" value="verwijderen"  onclick="return confirm(\'Weet je zeker dat je dit item wilt verwijderen?\');">' 
                            . '</form>');
                        }
                    } else {
                    print('<p>je moet eerst inloggen</p>');
                    }
            
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
