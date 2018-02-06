<?php
$con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());

function check_user($email, $pass)
{
    $con = mysqli_connect("localhost", "test", "12345678", "SVF") or die("Es konnte Keine Verbindung zur Datenbank aufgenommen werden");
    $email = strtolower($email);
    $pass = md5($pass);
    $sql = "SELECT BenutzerID FROM benutzer WHERE EMail = '$email' AND Passwort = '$pass'  LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Es konnte keine Verbindung hergestellt werden");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        return $user['BenutzerID'];
    } else {
        return false;
    }
}

function login($userid)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "UPDATE benutzer
    SET Session='$session'
    WHERE BenutzerID='$userid'";
    mysqli_query($con, $sql);
}

function logged_in()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
    FROM benutzer
    WHERE Session = '$session'
    LIMIT 1";
    $result = mysqli_query($con, $sql);
    return (mysqli_num_rows($result) == 1);
}

function logout()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "UPDATE benutzer
    SET Session=NULL
    WHERE Session='$session'";
    mysqli_query($con, $sql);
}

function begrüßung()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT Vorname
    FROM benutzer
    WHERE Session = '$session'
    LIMIT 1";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        return $user['Vorname'];
    } else {
        return false;
    }
}

function profilPrüfung($profilid)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID 
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
    }
    if ($profilid == $userid)
        return true;
    else
        return false;
}

function veranstaltungBeitreten($veranstaltungsid)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
    }
    
    $beitreten = "INSERT INTO beitreten
              (Teilnehmer, Veranstaltung)
              
              VALUES
             ('$userid', '$veranstaltungsid')";
    $eintragen = mysqli_query($con, $beitreten);
    echo "Sie sind erfolgreich beigetreten! <a href='Veranstaltung.php?page=$veranstaltungsid'>Zur&uuml;ck</a>";
}

function prüfeTeilnahme($veranstaltungsid)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
    }
    $prüfung = "SELECT * 
              FROM beitreten
              WHERE Teilnehmer='$userid' AND Veranstaltung='$veranstaltungsid'";
    $prüfen = mysqli_query($con, $prüfung);
    if (mysqli_num_rows($prüfen) == 1) {
        return false;
    } else {
        return true;
    }
}

function veranstaltungVerlassen($veranstaltungsid)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
    }
    
    $verlassen = "DELETE FROM beitreten WHERE Teilnehmer = '$userid' AND Veranstaltung ='$veranstaltungsid'";
    $löschen = mysqli_query($con, $verlassen);
    echo "Sie haben die Veranstaltung erfolgreich verlassen! <a href='Veranstaltung.php?page=$veranstaltungsid'>Zur&uuml;ck</a>";
}

function beitragSenden($veranstaltungsid, $inhalt)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
    }
    $senden = "INSERT INTO beitrag
              (Verfasser, Veranstaltung, Inhalt)   
              VALUES
             ('$userid', '$veranstaltungsid', '$inhalt')";
    $beitragSenden = mysqli_query($con, $senden);
    echo "Sie haben die Nachricht erfolgreich gesendet! <a href='Veranstaltung.php?page=$veranstaltungsid'>Zur&uuml;ck</a>";
}

function neuesPasswort($pw_alt, $pw_neu)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT Passwort
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userPW = $user['Passwort'];
    }
    $pw_alt = md5($pw_alt);
    if ($userPW == $pw_alt) {
        $pw_neu = md5($pw_neu);
        $neuesPW = "UPDATE benutzer
           SET Passwort='$pw_neu'
           WHERE Session='$session'";
        mysqli_query($con, $neuesPW);
        echo "Passwort erfolgreich geändert!";
    } else {
        echo "Passwort falsch";
    }
}

function profil()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql = "SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['BenutzerID'];
        return $userid;
    }
}

function tabelleAlleVeranstaltungen()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $sql = "SELECT a.VeranstaltungsID, a.Veranstaltungsname, a.Datum, a.Uhrzeit, b.BenutzerID, b.Vorname, b.Name, c.KategorieID, c.Bezeichnung
             FROM veranstaltung AS a
             LEFT JOIN benutzer AS b  ON (a.Ersteller = b.BenutzerID)
             LEFT JOIN kategorie AS c ON (a.Kategorie = c.KategorieID)";
    $result = mysqli_query($con, $sql);
    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td><a href='Veranstaltung.php?page=" . $zeile['VeranstaltungsID'] . "'>" . $zeile['Veranstaltungsname'] . "</a> </td>";
        echo "<td>" . $zeile['Datum'] . " / " . substr($zeile['Uhrzeit'], 0, 5) . "</td>";
        echo "<td><a href='Index.php?page=" . $zeile['KategorieID'] . "'>" . $zeile['Bezeichnung'] . "</a> </td>";
        echo "<td><a href='Profil.php?page=" . $zeile['BenutzerID'] . "'>" . $zeile['Vorname'] . " " . $zeile['Name'] . "</a> </td>";
        echo "</tr>";
    }
}

function tabelleKategorieVeranstaltungen($kategorie)
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $sql = "SELECT a.VeranstaltungsID, a.Veranstaltungsname, a.Datum, a.Uhrzeit, b.BenutzerID, b.Vorname, b.Name, c.KategorieID, c.Bezeichnung
             FROM veranstaltung AS a
             LEFT JOIN benutzer AS b  ON (a.Ersteller = b.BenutzerID)
             LEFT JOIN kategorie AS c ON (a.Kategorie = c.KategorieID)
             WHERE c.KategorieID = '$kategorie'";
    $result = mysqli_query($con, $sql);
    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td><a href='Veranstaltung.php?page=" . $zeile['VeranstaltungsID'] . "'>" . $zeile['Veranstaltungsname'] . "</a> </td>";
        echo "<td>" . $zeile['Datum'] . " / " . substr($zeile['Uhrzeit'], 0, 5) . "</td>";
        echo "<td><a href='Index.php?page=" . $zeile['KategorieID'] . "'>" . $zeile['Bezeichnung'] . "</a> </td>";
        echo "<td><a href='Profil.php?page=" . $zeile['BenutzerID'] . "'>" . $zeile['Vorname'] . " " . $zeile['Name'] . "</a> </td>";
        echo "</tr>";
    }
}

function veranstaltungenUpdate()
{
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $sql = "DELETE FROM veranstaltung
            WHERE Datum < Current_Date()";
    $result = mysqli_query($con, $sql);
}
function prüfeNachricht($inhalt){
    $teile = explode(" ", $inhalt);
    for ($i = 0;$i < count($teile) ; $i++) {
        if (strlen($teile[$i]) > 60) {
            return false;
        }
    }
       return true;
       
    
}
?>