<?php
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
            <div class="nieuwsbewerkengrid">
                <div class="nb0">
            <?php
                if(TRUE){ // check if admin
                    if($_GET["id"]=="nieuw"){ //check nieuw of bewerken
                        print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<label>titel:</label><input type="text" name="titel"><br>'
                            . '<label>tekst:</label><textarea name="tekst">Enter text here...</textarea><br>'
                            . '<label>datum:</label><input type="text" name="datum" value="'.date('d').'-'.date('m').'-'.date('y').'"><br>'  
                            . '<label></label><input type="submit" name="insert" value="opslaan">'  
                            . '</form>');
                        } else {
                            $nieuws = $pdo->prepare("SELECT * FROM nieuws WHERE nieuwsID =".$_GET["id"]);
                            $nieuws->execute();
                            $row=$nieuws->fetch();

                            print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<input type="text" name="titel" value="'.$row[1].'">'
                            . '<textarea name="tekst">'.$row[2].'</textarea>'
                            . '<input type="text" name="datum" value="'.$row[3].'">'  
                            . '<input type="submit" name="update" value="opslaan">'  
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
