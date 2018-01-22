<?php
include 'Loginverwaltung.php';
session_start();
if (logged_in() == false) {
    echo 'Sie haben keine Berechtigung f√ºr diese Seite<a href="Index.php">zur√ºck zur Startseite</a>';
} else {
    ?>
<?php
    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
    $profilid = $_GET['page'];
    $sql = "SELECT * FROM benutzer
WHERE BenutzerID = '$profilid'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $profil = mysqli_fetch_assoc($result);
        $name = $profil['Name'];
        $vorname = $profil['Vorname'];
        $email = $profil['EMail'];
        $geburtstag = $profil['Geburtstag'];
        $studiengang = $profil['Studiengang'];
    }
    
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
}

button {
	
}

table {
	height: auto;
	width: auto;
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
			<img src="neu.png" alt"Studentenveranstaltungsforum"
    width="150"
				height="135">
			<div style="float: right;">
				<form action="Ausloggen.php" method="post">
					<table>
						<tbody>
							<tr>
								<th><label for="Begr√º√üung">Hallo, </label><?php echo begr¸ﬂung();?>
							   </th>
							</tr>
							<tr>
								<th>
									<button type="submit" id="ausloggen" name="ausloggen"">Abmelden</button>
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
				<h1>Profil</h1>
				<table>
					<tr>
						<th ALIGN="LEFT"><label for="name">Name:</label>
						
						<td>
    <?php echo $name?>
    
						
						</th>
						<td></td>
 <?php if(profilPr¸fung($profilid)==true){ ?>
    <td>
							<button type="button" style="clear: right;">Profil l√∂schen</button>
						</td>
<?php
    
}
    ?>
    </tr>
					<tr>
						<th ALIGN="LEFT"><label for="vname">Vorname:</label>
						
						<td>
    <?php echo $vorname ?></td>
						</th>

					</tr>
					<tr>
						<th ALIGN="LEFT"><label for="name">E-Mail:</label>
						
						<td>
    <?php echo $email ?>
    </td>
						</th>

					</tr>

					<tr>
						<th ALIGN="LEFT">Geburtstag:
						
						<td>
    <?php echo $geburtstag ?>
    </td>
						</th>

					</tr>
					<tr>
						<th ALIGN="LEFT"><label> Studiengang:
								<td>
    <?php echo $studiengang ?>
    </td></th>

					</tr>
 <?php if(profilPr¸fung($profilid)==true){ ?>
    <tr>
    <form action="NeuesPasswort.php" method="post">
						<th ALIGN="LEFT"><label for="pass">altes Passwort:</label></th>
						<td><input id="pass" name="pass_alt" type="password"></td>
					</tr>
					<tr>
						<th ALIGN="LEFT"><label for="pass">neues Passwort:</label></th>
						<td><input id="pass" name="pass_neu" type="password"></td>
					</tr>
					<tr>
						<th ALIGN="LEFT"><label for="pass">Passwort best√§tigen:</label></th>
						<td><input id="pass" name="passwd_neu" type="password">
					
						<button type="submit" style="clear: right;">Passwort ‰ndern</button>
						</td>
	</form>			
					</tr>
					<tr>
						<form action="Profilbild.php" method="post" enctype="multipart/form-data">

							<th ALIGN="LEFT"><label for="pic">Profilbild √§ndern:</label></th>


							<td><input name="datei" size="10px" type="file" size="50"
								accept="img/*"> </label>
								<button type="submit" style="clear: right;" >hochladen</button></td>
					
					</tr>
				
<?php
    
}
    ?>
        


				</table>

			</div>
		</div>
		</main>

		<nav id="nav">
			<div class="innertube">
				<h3>Kultur</h3>
				<ul>
					<li><a href="#">Stadtbesichtigung</a></li>
					<li><a href="#">Kneipentour</a></li>
					<li><a href="#">Stadttheater</a></li>
					<li><a href="https://www.cineplex.de/programm/heute/lippstadt/">Kino</a></li>
					<li><a href="#">Fest</a></li>
				</ul>
				<h3>Sport</h3>
				<ul>
					<li><a href="#">Fu√üball</a></li>
					<li><a href="#">Volleyball</a></li>
					<li><a href="#">Kanutour</a></li>
					<li><a href="#">Joggen</a></li>
					<li><a href="#">Yoga</a></li>
					<li><a href="#">Kraftsport</a></li>
				</ul>
				<h3>Freizeit</h3>
				<ul>
					<li><a href="#">Party</a></li>
					<li><a href="#">Treffen</a></li>
					<li><a href="#">Spieleabend</a></li>

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