<?php

SESSION_START();
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database



if(isset($_GET["id"])){
       
    $naamplaat = $pdo->prepare("SELECT * FROM naamplaat WHERE id=".$_GET["id"]);
    $naamplaat->execute();

}
if(isset($_POST["verzenden"])){
    $verzenden = $pdo->prepare("INSERT INTO");// insert nieuwe naamplaat
    $verzenden->execute();
    
    $idhalen = $pdo->prepare("SELECT MAX(naamplaat_id) M FROM naamplaat"); // haal de niewste id op
    $idhalen->execute();
    $row = $idhalen->fetch();
    $id = $row["M"];
    
    
    
    mail( "jelte@mail.nl" , "naamplaat van " , ("naamplaat.php?id=".$id));
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
                <li><a  class="current_page"  href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
    <p> 
    <?php
       function tekst_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
   }
    
   $tekst = $hoogte = $hout = $tkleur = $pkleur = "";
   $teksterr = $hoogteerr = $houterr = $tkleurerr = $pkleurerr = "";
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["tekst"])) {
            $teksterr = "Tekst is required";       
   }else{
       $tekst = tekst_input($_POST["tekst"]);
       if(!preg_match("/^[a-zA-Z ]*$/",$tekst)){
           $teksterr = "Alleen letters en spaties toegestaan";
       }
   }    
   }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["hoogte"])) {
            $hoogteerr = "Hoogte is required";       
   }
    }
    
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["hout"])) {
            $houterr = "Hout is required";       
   }
    }
   
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["tkleur"])) {
            $tkleurerr = "Tekst kleur is required";       
   }
    }
    
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["pkleur"])) {
            $pkleurerr = "Plaat kleur is required";       
   }
    }

   
    
    
    
    ?>   
    
    <div  class="grid_naamplaat">
        <div class="n2">
                    <?php
              echo "<h2>Your Input:</h2>";
              echo $tekst;
              echo "<br>";
              echo $afmeting;
              echo "<br>";
              echo $materiaal;
              echo "<br>";
              echo $tkleur;
              echo "<br>";
              echo $pkleur;
              ?>
        </div>
        <div class="n3">
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table style="width:100%">
                   
                   <tr>
                     <td>Tekst:</td>
                     <td><input type="text" name="tekst" value="<?php echo $tekst;?>"></td>
                   </tr>
                   <tr>
                     <td>Hout:</td>
                     <td><input list="hout" name="hout" value="<?php echo $tekst;?>"></td>
                   </tr>
                   <tr>
                     <td>Lettertype:</td>
                     <td><input type="text" name="tekst" value="<?php echo $tekst;?>"></td>
                   </tr>
                   <tr>
                     <td>Tekstkleur:</td>
                     <td><input list="kleur" name="tkleur" value="<?php echo $tekst;?>"></td>
                   </tr>
                   <tr>
                     <td>Achtergrondkleur:</td>
                     <td><input list="kleur" name="pkleur" value="<?php echo $tekst;?>"></td>
                   </tr>
                   <tr>
                       <th>Afmetingen:</th>
                       <th></th>
                   </tr>
                   <tr>
                     <td>Hoogte:</td>
                     <td><input class="nummer" type="number" name="hoogte" value="<?php echo $tekst;?>">cm</td>
                   </tr>
                   <tr>
                     <td>Breedte:</td>
                     <td><input class="nummer" type="number" name="breedte" value="<?php echo $tekst;?>">cm</td>
                   </tr>
                   <tr>
                     <td>Lengte:</td>
                     <td><input class="nummer" type="number" name="lengte" value="<?php echo $tekst;?>">cm</td>
                   </tr>
                   <tr>
                     <td></td>
                     <td><input type="submit" name="submit" value="cool"></td>
                   </tr>
               </table> 
            </form>
            <datalist id="hout">
                <option value="Hout 1">
                <option value="Hout 2">
                <option value="Hout 3">
                <option value="Hout 4">
                <option value="Hout 5">
            </datalist>
            <datalist id="kleur">
                <option value="Rood">
                <option value="Groen">
                <option value="Blauw">
                <option value="Geel">
                <option value="Zwart">
            </datalist>
            
            
            
            
            </div>
        
    </div></div>
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
    </body>
</html>
