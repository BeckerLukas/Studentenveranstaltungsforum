<?php
session_start();
include 'Loginverwaltung.php';

logout();
        if (!logged_in()){
            echo 'Sie wurden nun abgemeldet. <a href="Index.php">zurück zur Startseite</a>';
}else {
    echo 'Fehler! Sie sind weiterhin angemeldet. <a href="Index.php">zurück zur Startseite</a>';
}


?>