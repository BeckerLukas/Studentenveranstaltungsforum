<?php
include 'Loginverwaltung.php';
session_start();
$veranstaltungsid=$_GET['page'];
veranstaltungVerlassen($veranstaltungsid);

?>