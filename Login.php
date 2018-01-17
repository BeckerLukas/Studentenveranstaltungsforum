<?php
session_start();
include 'Loginverwaltung.php';
if (isset($_POST['login']))
{
    $userid=check_user($_POST['email'], $_POST['pass']);
    if ($userid != false)
        login($userid);
        else
            echo 'Ihre Anmeldedaten waren nicht korrekt!';
}

