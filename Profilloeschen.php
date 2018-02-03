<?php
include 'Loginverwaltung.php';
session_start();
$profil = profil();
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
			<a href='Index.php'><img src="neu.png" alt="Studentenveranstaltungsforum"width="150" height="135"></a>
			<div style="float: right;">
				<?php
				
				if (logged_in() == false) {
				    ?>
	<form action="Login.php" method="post">
					<table>
						<tbody>
							<tr>
								<th><label for="email">E-Mail</label></th>
								<td><input id="email" name="email"></td>
							</tr>
							<tr>
								<th><label for="pass">Passwort</label></th>
								<td><input id="pass" name="pass" type="password"></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button type="submit" id="login" name="login" value="Einloggen">Anmelden</button>

									<p>
										<a href="Registrierung.php">Noch nicht registriert ?</a>
									</p>
								</td>
							</tr>

						</tbody>
					</table>
				</form>
	
<?php
} else {
    ?>
       <form action="Ausloggen.php" method="post">
					<table>
						<tbody>
							<tr>
								<th><label for="BegrÃ¼ÃŸung">Hallo, </label><?php
    $greeting = begrüßung();
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


<?php
}
?>		

			</div>


		</div>
	</header>

	<div id="wrapper">

		<main>
		<div id="content">
			<div class="innertube">
				<h1>Profil löschen</h1>
<?php 
	if (logged_in() == false) {
    echo 'Sie haben keine Berechtigung fÃ¼r diese Seite <a href="Index.php">zurÃ¼ck zur Startseite</a>';
} else {
    ?>
<?php
    
if (! isset($_GET["page"])) {
        ?>
				<form action="Profilloeschen.php?page=2" method="post">
					<table>
					
						<tr>
							<th ALIGN="LEFT"><label for="Passwort">Passwort:</label>
							</th>
							<td><input id="passwort" name="passwort" type="password"></td>



						</tr>
						

						<tr>
							<th ALIGN="LEFT"><label for="passwortwd">Passwort wiederholen:</label></th>
							<td><input id="passwortwd" name="passwortwd" type="password"></td>
							

						</tr>
						<td></td>
						


						<tr>
							<td></td>
							
							<td>
								<button type="submit" style="clear: right;">Profil löschen</button>
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
            $pass = ($_POST["passwort"]);
            $passwd = ($_POST["passwortwd"]);
            
            
            if ($pass != $passwd){
                echo "<br>Passwörter stimmen nicht überein. Bitte wiederhole deine Eingabe...<a href=Profilloeschen.php>zurück</a>";
            } else {
                $verbindung = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
                $session = session_id();
                $pass= md5($pass);
                $verlassen = "DELETE FROM benutzer WHERE BenutzerID = '$profil' AND Passwort ='$pass'";
                $loeschen= mysqli_query($verbindung, $verlassen);
                    
            }
            if( $loeschen == true){
                $veranstaltungen = "DELETE FROM veranstaltung WHERE Ersteller = '$profil'";
                $veranstaltungenloeschen= mysqli_query($verbindung, $veranstaltungen);
                echo "Sie haben Ihr Profil erfolgreich gelöscht! <a href=\"Index.php\">Zurück zur Startseite</a>";
                } else {
                    echo "<br>Fehler. Bitte versuchen Sie es später erneut! <a href=\"Index.php\">Zurück zur Startseite</a>";
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
					<li><a href="Index.php?page=4">FuÃŸball</a></li>
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
					<li><a href="Index.php?page=1">Büchergruppe</a></li>
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
