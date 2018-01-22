<?php
include 'LoginVerwaltung.php';
session_start();
$profil = profil();
$url="Profil.php?page=".$profil;
$pass_alt = ($_POST["pass_alt"]);
$pass_neu = ($_POST["pass_neu"]);
$passwd_neu = ($_POST["passwd_neu"]);
if($pass_neu != $passwd_neu)
    echo "<br>Ihre Passwî’šter stimmen nicht Überein.Bitte wiederhole deine Eingabe...<a href=.$url.>zurï¿½k</a>";
    else if (strlen($pass_neu) > 20 or strlen($pass_neu) < 8 )
        echo "<br>Ihr Passwort muss zwischen 8 und 20 Zeichen lang sein.Bitte wiederhole deine Eingabe...<a href=.$url.>zurï¿½k</a>";
        else{
            neuesPasswort($pass_alt, $pass_neu);
        }
        ?>