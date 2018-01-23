<?php
include 'Loginverwaltung.php';
session_start();
$veranstaltungsid=$_GET['page'];
$inhalt = ($_POST["inhalt"]);
if ($inhalt == null || $inhalt=="Beitrag schreiben...") {
    echo "Kein Nachricht vorhanden <a href='Veranstaltung.php?page=$veranstaltungsid'>Zurück</a>";
} else {
    beitragSenden($veranstaltungsid, $inhalt);
}