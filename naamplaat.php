<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="picture_header">
            
        </div>
        <nav class="shadow">
            <ul>
                <li><a class="current_page" href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="grid_home">
<!--                <div class="h1">
                </div>-->
<div class="h2"><h2>Naamplaat maker</h2>
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
    <div class="container">
        <p><span class="error">* required field.</span></p>
        <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <span class="error">* <?php echo $teksterr;?></span>   
         Tekst: <input type="text" name="tekst" value="<?php echo $tekst;?>"><br>
         <?php echo $tekst;?>
         <span class="error">* <?php echo $hoogteerr;?></span>
         Afmeting:<br>
         hoogte:
         <input type="hoogte" name="hoogte" value="<?php echo $hoogte;?>"><br>
         breedtje
         lengte
         
         
         
         <span class="error">* <?php echo $houterr;?></span>
         Hout: <input list="browsers" name="Hout">
                      <datalist id="browsers">
                        <option value="Hout 1">
                        <option value="Hout 2">
                        <option value="Hout 3">
                        <option value="Hout 4">
                        <option value="Hout 5">
                      </datalist><br>
         
         <span class="error">* <?php echo $tkleurerr;?></span>
         Tekst kleur:  <input list="browsers" name="tkleur">
                      <datalist id="browsers">
                        <option value="Rood">
                        <option value="Groen">
                        <option value="Blauw">
                        <option value="Geel">
                        <option value="Zwart">
                      </datalist><br>
         
         <span class="error">* <?php echo $pkleurerr;?></span>
         Plaat kleur: <input list="browsers" name="pkleur">
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
    </p></div>
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
