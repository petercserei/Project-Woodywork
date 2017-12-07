<?php

$name_error = $email_error = "";
$name = $email = $message = "";
// zet de variabelen op 0
// gebeurt wanneer de submit knop word in gedrukt en checkt alle lege velden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Naam is verplicht";
    } else {
        $name = test_input($_POST["name"]);
        // checkt of de naam letters of spaties heeft
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Alleen letters en spaties";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is verplicht";
    } else {
        $email = test_input($_POST["email"]);
        // checkt of het email adres geldig is geformatteerd
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Ongeldige email";
        }
    }

    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["message"]);
    }

    if ($name_error == '' and $email_error == '') {
        $message_body = '';
        unset($_POST['verzend']);
        foreach ($_POST as $key => $value) {
            $message_body .= "$key: $value\n";
        }

        $to = 'wesley_dekking@hotmail.nl';
        $subject = 'Contact vraag';
        if (mail($to, $subject, $message)) {
            $success = "Bericht verzonden, bedankt voor het contact opnemen!";
            $name = $email = $phone = $message = $url = '';
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
