<?php

SESSION_START();
//activeer knop "inloggen"
if(isset($_POST['inloggen'])) {
    include_once 'database-inlogsysteem-inc.php';
    //opslaan ingevoerde gegevens met anti SQL injection
    $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
    
    //check lege velden
    if(empty($gebruikersnaam) || empty($wachtwoord)) {
        header("Location: ../inloggen.php?inloggen=veldleeg");
        exit();
    } else {
        //check of gebruikersnaam overeen komt met een rij in de database
        $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam' OR email = '$email'";
        $resultaat = mysqli_query($conn, $sql);
        $resultaatRows = mysqli_num_rows($resultaat);
        if($resultaatRows < 1) {
            header("Location: ../inloggen.php?inloggen=error");
            exit();
        } else {
            $row = mysqli_fetch_assoc($resultaat);
            //hash omzetten in wachtwoord
            $hashWachtwoordCheck = password_verify($wachtwoord, $row['wachtwoord']);                
            if(!$hashWachtwoordCheck) {
                header("Location: ../inloggen.php?inloggen=error");
                exit();
            } elseif($hashWachtwoordCheck) {
                //inloggen en ga naar home_pagina
                $_SESSION['acc_id'] = $row['klant_id'];
                $_SESSION['acc_email'] = $row['email'];
                $_SESSION['acc_gebruikersnaam'] = $row['gebruikersnaam'];
                $_SESSION['acc_wachtwoord'] = $row['wachtwoord'];
                header("Location: ../home.php?inloggen=TRUE");
                exit();
            }
        }
    }
} else {
    header("Location: ../inloggen.php");
    exit();
}