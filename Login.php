<?php
session_start();
include 'Loginverwaltung.php';
if (isset($_POST['login']))
{
    $userid=check_user($_POST['email'], $_POST['passwort']);
    if ($userid!=false)
        login($userid);
        else
            echo 'Ihre Anmeldedaten waren nicht korrekt!';
}
if (!logged_in())
    echo '<form method="post" action="login.php">
        <label>Benutzername:</label><input name="username" type="text"><br>
        <label>Passwort: </label><input name="userpass" type="password" id="userpass"><br>
        <input name="login" type="submit" id="login" value="Einloggen">
    </form>';
    else
        echo '<a href="logout.php">Ausloggen</a>';
        echo '<p /><a href="logged_in.php">Check</a>';
?>
