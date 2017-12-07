<?php
    
SESSION_START();

if(isset($_POST['uitloggen'])) {
    SESSION_UNSET();
    SESSION_DESTROY();
    header("Location: ../home.php?inloggen=TRUE");
    exit();
}