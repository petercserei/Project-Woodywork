<?php

SESSION_START();
//activeer knop "registreren"
if(isset($_POST['registreren'])) {
    include_once 'database-inlogsysteem-inc.php';
    //opslaan ingevoerde gegevens met anti SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
    $wachtwoord2 = mysqli_real_escape_string($conn, $_POST['wachtwoord2']);
    //check lege velden
    if(empty($email) || empty($gebruikersnaam) || empty($wachtwoord)) {
        header("Location: ../registreren.php?registreren=veldleeg");
        exit();
    } else {
        //check geldige email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../registreren.php?registreren=email-ongeldig");
            exit();
        } else {
            //check of email beschikbaar is
            $sql = "SELECT * FROM gebruiker WHERE email = '$email'";
            $resultaat = mysqli_query($conn, $sql);
            $resultaatRows = mysqli_num_rows($resultaat);
            if($resultaatRows > 0) {
                header("Location: ../registreren.php?registreren=emailnietbeschikbaar");
                exit();
            } else {
                //check of gebruikersnaam beschikbaar is
                $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
                $resultaat = mysqli_query($conn, $sql);
                $resultaatRows = mysqli_num_rows($resultaat);
                if($resultaatRows > 0) {
                    header("Location: ../registreren.php?registreren=naamnietbeschikbaar");
                    exit();
                } else {
                    //check of wachtwoord overeen komt met wachtwoord2
                    if($wachtwoord != $wachtwoord2) {            
                        $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
                        header("Location: ../registreren.php?registreren=wachtwoord-fout");
                        exit();
                    } else {
                        //wachtwoord omzetten in hash
                        $hashWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
                        //gebruiker aanmaken in database en ga naar inloggen_pagina
                        $sql = "INSERT INTO gebruiker (email, gebruikersnaam, wachtwoord) VALUES ('$email', '$gebruikersnaam', '$hashWachtwoord');";
                        mysqli_query($conn, $sql);
                        header("Location: ../inloggen.php?registreren=TRUE");
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../registreren.php");
    exit();
}