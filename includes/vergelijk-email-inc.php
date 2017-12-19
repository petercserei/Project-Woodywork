<?php

include_once 'database-inlogsysteem-inc.php';

$email = $_GET["email"];
$sql = ("SELECT email FROM gebruiker");

$resultaat = mysqli_query($conn, $sql);

$resultaatRows = mysqli_num_rows($resultaat);
$beschikbaar = true;
if($resultaatRows > 0) {
    while($row = mysqli_fetch_assoc($resultaat)) {
        if(strcasecmp($email, $row["email"]) == 0) {
            $beschikbaar = false;
            break;
        }
    }
}

print $beschikbaar;