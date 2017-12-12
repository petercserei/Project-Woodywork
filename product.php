<?php

SESSION_START();
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database
if(isset($_SESSION['acc_id'])){
    if(isset($_POST["insert"])){
        $sql = $pdo->prepare("INSERT INTO product (titel, beschrijving) VALUES (?,?)");
        $sql->execute(array($_POST["titel"],$_POST["tekst"]));
    }elseif(isset($_POST["update"])){
        $sql = $pdo->prepare("UPDATE product SET titel=?, beschrijving=? WHERE pruductID=?");
        $sql->execute(array($_POST["titel"],$_POST["tekst"],$_GET["id"]));
        
        
        if(isset( $_FILES["plaatje"])){
            $sql = $pdo->prepare("SELECT max(plaatjeID) max FROM plaatjes");
            $sql->execute();
            $row = $sql->fetch();
            $max = $row["max"]+1;
            
            $sql = $pdo->prepare("SELECT plaatjeID FROM product WHERE productID=".$_GET["id"]);
            $sql->execute();
            $row = $sql->fetch();
            $plaatjeID = $row["plaatjeID"];

            $array = explode(".", $_FILES["plaatje"]["name"]);
            $path= "img/portofolio/$max.". $array[sizeof($array) - 1];
            $file= $max.".". $array[sizeof($array) - 1];
            
            if($plaatjeID == null){
                $sql = $pdo->prepare("UPDATE product SET plaatjeID=? WHERE productID=?");
                $sql->execute(array($max,$_GET["id"]));
            }

            $sql = $pdo->prepare("INSERT INTO plaatjes (productID, plaatje, plaatjeID) VALUES (?,?,?)");
            if(move_uploaded_file ( $_FILES["plaatje"]["tmp_name"] ,  $path )){
                $sql->execute(array($_GET["id"],$file,($max)));
            }
        }
        if(isset($_POST["port"])){
            
            $sql = $pdo->prepare("UPDATE product SET plaatjeID=? WHERE productID=?");
            $sql->execute(array($_POST["port"],$_GET["id"]));
        }
    }
}



if(isset($_GET["id"])){
    $id = $_GET["id"];
} 
else {
    $maxsql = $pdo->prepare("SELECT max(productID) as c FROM product"); //count aantal plaatjes
    $maxsql->execute();
    $maxrow = $maxsql->fetch();
    $id = $maxrow["c"]; 
}
    $countsql = $pdo->prepare("SELECT COUNT(productID) as c FROM plaatjes WHERE productID = ".$id); //count aantal plaatjes
    $countsql->execute();
    $countrow = $countsql->fetch();
    $count = $countrow["c"];
    


if($id!="nieuw"){
    //alle plaatjes
    $plaatjessql = $pdo->prepare("SELECT * FROM plaatjes WHERE productID = ".$id);
    $plaatjessql->execute();

    //stukje tekst
    $tekstsql = $pdo->prepare("SELECT titel, beschrijving, plaatjeID FROM product WHERE productID = ".$id);
    $tekstsql->execute();
}
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
                <li><a class="current_page" href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
        <div class="container">
            <?php
                //print alle plaatjes
                
                 
                 if(isset($_SESSION['acc_id'])){//check if admin
                     if($id=="nieuw"){
                         ?><form action="product.php" method="post">
                                <div class="grid_portfolio">
                              <div class="p1">
                                      <label for="titel">Titel:</label><input type="text" id="titel" name="titel">
                                     <label for="tekst">Tekst:</label><textarea id="tekst" name="tekst"></textarea>
                                     <input type="submit" name="insert" value="opslaan">
                              </div></div>
                                  <?php
                     }else{
                         
                        $tekstrow = $tekstsql->fetch();
                       ?> <form action="product.php?id=<?php print($id);?>" method="post" enctype="multipart/form-data">
                             <div class="grid_portfolio">  
                                <div class="p1">
                                    <label for="titel">Titel:</label><input type="text" id="titel" name="titel" value="<?php print($tekstrow["titel"]);?>">
                                      <label for="tekst">Tekst:</label><textarea id="tekst" name="tekst"><?php print($tekstrow["beschrijving"]);?></textarea>
                                      <input type="submit" name="update" value="opslaan">
                              </div>
                                  <?php
                     }
                     
                 } else {
                     
                    $tekstrow = $tekstsql->fetch();
                     ?>
                                 <div class="grid_portfolio">  
                                <div class="p1">
                               <h2><?php print($tekstrow["titel"]); ?></h2>
                               <p><?php print($tekstrow["beschrijving"]); ?></p>
                               </div>
                     <?php
                 }
                 
                if($id!="nieuw"){
                    $x=1;
                    if(isset($_SESSION['acc_id'])){
                        ?>
            <div class="p2">
                    <input type="file" multiple name="plaatje">
            </div>
                        <?php
                    $x=2;
                    }
                    
                    
                    
                    
                    for($i = 0; $i<$count;$i++){

                        if(($i+$x)%3==0){
                            print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                        }



                        //haal hierplaatje uit de database
                        $row = $plaatjessql->fetch();
                        //print de inhoud van het divje
                         ?><div class="p<?php print(($i+$x)%3+1); ?> ">
                             <img src="img/portofolio/<?php print($row["plaatje"])?>">
                             <?php if(isset($_SESSION['acc_id'])){ ?>
                             
                             
                             <input type="radio" name="port" value="<?php print($row["plaatjeID"]); ?>"<?php
                             if($tekstrow["plaatjeID"]==$row["plaatjeID"]){
                                 ?> checked <?php
                             }
                             
                             ?>>
                             <?php } ?>
                           </div>

                          <?php
                        if((($i+$x)%3==2)||$i==$count-1){ // sluit container div af na drie divjes of na de laatste div
                            ?></div><?php
                        }
                    }
                }
            ?>
            
        </div>
                           
        <?php if(isset($_SESSION['acc_id'])){ ?></form><?php } ?>             
                           
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
    </body>
</html>
