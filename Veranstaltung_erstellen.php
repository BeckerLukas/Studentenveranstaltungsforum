<?php
include 'Loginverwaltung.php';
session_start();
if (logged_in() == false) {
    echo 'Sie haben keine Berechtigung für diese Seite<a href="Index.php">zurück zur Startseite</a>';
} else {
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Studentenveranstaltungsforum;</title>
<style type="text/css">
body {
	margin: 0;
	padding: 0;
	font-family: fantasy;
	line-height: 1.5em;
	font-size: large;
}

button {
	
}

table {
	height: auto width: auto
}

select {
	height: auto width: auto
}

#header {
	background: #fecc00;
	height: 125px;
}

#header h1 {
	margin: 0;
	padding-top: 15px;
}

main {
	padding-bottom: 10010px;
	margin-bottom: -10000px;
	float: left;
	width: 100%;
}

#nav {
	padding-bottom: 10010px;
	margin-bottom: -10000px;
	float: left;
	width: 170px;
	margin-left: -100%;
	background: #eee;
}

#footer {
	clear: left;
	width: 100%;
	background: #fecc00;
	text-align: left;
	padding: 4px 0;
}

#wrapper {
	overflow: hidden;
}

#content {
	margin-left: 230px; /* Same as 'nav' width */
}

.innertube {
	margin: 15px; /* Padding for content */
	margin-top: 0;
}

p {
	color: #555;
}

nav ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

nav ul a {
	color: darkgreen;
	text-decoration: none;
}
</style>

<script type="text/javascript">
			
		</script>

</head>

<body>

	<header id="header">
		<div class="innertube">
			<img src="neu.png" alt="Studentenveranstaltungsforum"
			width="150"
				height="135">
			<div style="float: right;">
				<form action="Ausloggen.php" method="post">
					<table>
						<tbody>
							<tr>
								<th><label for="Begrüßung">Hallo, </label><?php
    $greeting = begr��ung();
    $userid = profil();
    echo "<a href='Profil.php?page=$userid'>$greeting</a>";
    ?>
							   </th>
							</tr>
							<tr>
								<th>
									<button type="submit" id="ausloggen" name="ausloggen">Abmelden</button>
								</th>
							</tr>



						</tbody>
					</table>
				</form>

			</div>


		</div>
	</header>

	<div id="wrapper">

		<main>
		<div id="content">
			<div class="innertube">
				<h1>Veranstaltung erstellen</h1>
<?php
    
if (! isset($_GET["page"])) {
        ?>
				<form action="Veranstaltung_erstellen.php?page=2" method="post">
					<table>
						<tr>
							<th ALIGN="LEFT"><label for="vname">Veranstaltungsname:</label></th>
							<td><input id="vname" name="vname"></td>



						</tr>
						<tr>
							<th ALIGN="LEFT">
								<form action="select.html">
									<label> Kategorie: </label>
							
							</th>
							<td><select name="kategorie">

									<option value="1">BÃ¼chergruppe</option>
									<option value="2">Fest</option>
									<option value="3">Fitness</option>
									<option value="4">FuÃŸball</option>
									<option value="5">Joggen</option>
									<option value="6">Kanutour</option>
									<option Value="7">Kino</option>
									<option value="8">Kneipentour</option>
									<option value="9">Lerngruppe</option>
									<option value="10">Minigolf</option>
									<option value="11">Party</option>
									<option value="12">Radtour</option>
									<option value="13">Reisen</option>
									<option value="14">Stadtbesichtigung</option>
									<option value="15">Stadttheater</option>
									<option value="16">Spieleabend</option>
									<option value="17">Treffen</option>
									<option value="18">Volleyball</option>
									<option value="19">Yoga</option>
									<option value="20">Sonstiges</option>

							</select></td>
						</tr>

						<tr>
							<th ALIGN="LEFT">Datum:</th>
							<td><input type="date" name="vdate" style="width: 148px;"></td>
						</tr>

						<tr>
							<th ALIGN="LEFT"><label> Uhrzeit: </label></th>
							<td><input type="time" name="uhrzeit" placeholder="23:59:59"></td>
						</tr>
						<tr>
							<th ALIGN="LEFT"><label for="teilnehmerzahl">Teilnehmerzahl:</label>
							</th>
							<td><input id="teilnehmerzahl" name="teilnehmerzahl"
								type="number"></td>



						</tr>
						<tr>
							<th ALIGN="LEFT"><label for="name">Beschreibung:</label></th>
							<td><textarea class="textb" cols="80" rows="5" maxlength="280"
									name="beschreibung">Beschreibung schreiben...
							</textarea></td>
						</tr>

						<tr>
							<th ALIGN="LEFT"><label for="name">Ort:</label></th>
							<td><input id="name" name="ort"></td>
							<td><input type="button" value="Ort auf Karte anzeigen"
								onclick="window.location.href='http://maps.google.com/?q'" /></td>

						</tr>
						<td></td>
						<td><script type="text/javascript"
								src="http://maps.google.com/maps/api/js?sensor=false"></script>
							<div style="overflow: hidden; height: 400px; width: 600px;">
								<div id="map_canvas" style="height: 400px; width: 600px;"></div>
								<a href="http://www.maps-einbinden.de">google maps fÃ¼r
									webseite</a>
							</div>
							<script type="text/javascript">window.setTimeout("initGmaps();",300);function initGmaps(){var myOptions = {zoom:15,center:new google.maps.LatLng(51.6712278, 8.340648099999953),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(51.6712278, 8.340648099999953)});infowindow = new google.maps.InfoWindow({content: "<b>Meine Adresse</b><br><br>Lippstadt"});google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}</script>

						</td>


						<tr>
							<td></td>
							<td></td>
							<td>
								<button type="submit" style="clear: right;">Veranstaltung
									erstellen</button>
							</td>
						</tr>
					</table>
				</form>
<?php
    }
    ?>
<?php
    if (isset($_GET["page"])) {
        if ($_GET["page"] == "2") {
            $veranstaltungsname = ($_POST["vname"]);
            $kategorie = ($_POST["kategorie"]);
            $datum = ($_POST["vdate"]);
            $uhrzeit = ($_POST["uhrzeit"]);
            $teilnehmerzahl = ($_POST["teilnehmerzahl"]);
            $beschreibung = ($_POST["beschreibung"]);
            $ort = ($_POST["ort"]);
            date_default_timezone_set("Europe/Berlin");
            $timestamp = time();
            $datum_aktuell = date("Y-m-d", $timestamp);
            
            if (strlen($veranstaltungsname) < 1)
                echo "<br>Bitte geben Sie den Namen Ihrer Veranstaltung an. Bitte wiederhole deine Eingabe...<a href=Veranstaltung_erstellen.php>zurück</a>";
            else if ($teilnehmerzahl < 1) {
                print $teilnehmerzahl;
                echo "<br>Bitte geben Sie Ihr Ihre maximale Teilnehmeranzahl an.  Bitte wiederhole deine Eingabe...<a href=Veranstaltung_erstellen.php>zurück</a>";
            } else if (strlen($beschreibung) < 1)
                echo "<br>Bitte beschreiben Sie Ihr Veranstaltung.  Bitte wiederhole deine Eingabe...<a href=Veranstaltung_erstellen.php>zurück</a>";
            else if (! isset($datum))
                echo "<br>Bitte wählen Sie ein Datum für Ihre Veranstaltung aus. Bitte wiederhole deine Eingabe...<a href=Veranstaltung_erstellen.php>zurück</a>";
            else if (strlen($ort) < 1)
                echo "<br>Bitte geben Sie den gewünschten Ort der Veranstaltung an! <a href=Veranstaltung_erstellen.php>zurück</a>";
            else if ($datum < $datum_aktuell) {
                echo "<br>Bitte geben Sie ein aktuelles Datum an! <a href=Veranstaltung_erstellen.php>zurück</a>";
            } else {
                $verbindung = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
                $session = session_id();
                $sql = "SELECT BenutzerID
          FROM benutzer
          WHERE Session = '$session'
          LIMIT 1";
                $result = mysqli_query($verbindung, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $ersteller = mysqli_fetch_assoc($result);
                    $ersteller = $ersteller['BenutzerID'];
                    $eintrag = "INSERT INTO veranstaltung
              (Ersteller, Kategorie, Veranstaltungsname, Datum, Uhrzeit, Beschreibung, Teilnehmerzahl, Ort)

              VALUES
             ('$ersteller', '$kategorie', '$veranstaltungsname','$datum', '$uhrzeit', '$beschreibung', '$teilnehmerzahl', '$ort')";
                    $eintragen = mysqli_query($verbindung, $eintrag);
                }
                if ($eintragen == true) {
                    echo "Sie haben die Veranstaltung erstellt <a href=\"Index.php\">Zurück zur Startseite</a>";
                } else {
                    echo "<br>Fehler. Bitte versuchen Sie es später erneut!";
                }
            }
        }
    }
    ?>
					</div>
		</div>
		</main>

		<nav id="nav">
			<div class="innertube">
				<h3>Kultur</h3>
				<ul>
					<li><a href="Index.php?page=14">Stadtbesichtigung</a></li>
					<li><a href="Index.php?page=8">Kneipentour</a></li>
					<li><a href="Index.php?page=15">Stadttheater</a></li>
					<li><a href="Index.php?page=7">Kino</a></li>
					<li><a href="Index.php?page=2">Fest</a></li>
					<li><a href="Index.php?page=13">Reisen</a></li>
				</ul>
				<h3>Sport</h3>
				<ul>
					<li><a href="Index.php?page=4">Fußball</a></li>
					<li><a href="Index.php?page=18">Volleyball</a></li>
					<li><a href="Index.php?page=6">Kanutour</a></li>
					<li><a href="Index.php?page=5">Joggen</a></li>
					<li><a href="Index.php?page=19">Yoga</a></li>
					<li><a href="Index.php?page=12">Radtour</a></li>
					<li><a href="Index.php?page=10">Minigolf</a></li>
					<li><a href="Index.php?page=12">Fitness</a></li>
				</ul>
				<h3>Freizeit</h3>
				<ul>
					<li><a href="Index.php?page=11">Party</a></li>
					<li><a href="Index.php?page=17">Treffen</a></li>
					<li><a href="Index.php?page=16">Spieleabend</a></li>
					<li><a href="Index.php?page=1">B�chergruppe</a></li>
					<li><a href="Index.php?page=9">Lerngruppe</a></li>
					<li><a href="Index.php?page=20">Sonstiges</a></li>

				</ul>
			</div>
		</nav>

	</div>

	<footer id="footer">
		<div class="innertube">
			<p>Impressum</p>
		</div>
	</footer>

</body>
</html>
<?php
}
?>
