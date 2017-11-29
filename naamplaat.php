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
        <div class="p2">
            <div class="p11">
                <p>Hout:</p>
                <p>Kleur:</p>
                <p>Naam: </p>
                <h3>Afmeting:</h3>
            </div>
            
            <div class="p12">
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input list="browsers" name="Hout">
                              <datalist id="browsers">
                                <option value="Hout 1">
                                <option value="Hout 2">
                                <option value="Hout 3">
                                <option value="Hout 4">
                                <option value="Hout 5">
                              </datalist><br>
                 <span class="error"> <?php echo $teksterr;?></span>   
                <input type="text" name="tekst" value="<?php echo $tekst;?>"><br>
                 <?php echo $tekst;?>
                 <span class="error"> <?php echo $hoogteerr;?></span>

                 <input type="hoogte" name="hoogte" value="<?php echo $hoogte;?>"><br>

            </div>
            <div class="p13">
                <p>hoogte:</p>
                <p>breedte:</p>
                <p>lengte:</p>

            </div>
            <div class="p14">

                 

                 <input list="browsers" name="tkleur">
                              <datalist id="browsers">
                                <option value="Rood">
                                <option value="Groen">
                                <option value="Blauw">
                                <option value="Geel">
                                <option value="Zwart">
                              </datalist><br>

                 <span class="error"> <?php echo $pkleurerr;?></span>
                 <input list="browsers" name="pkleur">
                              <datalist id="browsers">
                                <option value="Rood">
                                <option value="Groen">
                                <option value="Blauw">
                                <option value="Geel">
                                <option value="Zwart">
                              </datalist><br>




                  <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    <div class="p1">
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
        </p></div></div></div>
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
    </body>
</html>
