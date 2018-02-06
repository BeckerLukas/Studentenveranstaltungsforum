<?php
include 'Loginverwaltung.php';
session_start();
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
			<a href='Index.php'><img src="neu.png" alt="Studentenveranstaltungsforum"width="150" height="135"></a>
			<div style="float: right;">
				<?php if(logged_in() == false)
{
?>
	<form action="Login.php" method="post">
		<table>
			<tbody>
							<tr>
							    <th>
							<label for="email">E-Mail</label>
							   </th>
							        <td> 
							<input id="email" name="email"> 
							        </td>
							</tr>
							<tr>
							<th>
							<label for="pass">Passwort</label> 
							    </th>
								<td>
							<input id="pass" name="pass" type="password"> 
							    </td>
							</tr>
							<tr>
							<td> </td>
							<td>
							<button type="submit" id="login" name="login" value="Einloggen">Anmelden</button>
						
							<p> <a href="Registrierung.php">Noch nicht registriert ?</a></p>
							</td>
							</tr>
		            
				</tbody>
			</table>	
	 </form>
	
<?php 
}else{
?>
       <form action="Ausloggen.php" method="post">
		<table>
			<tbody>
							<tr>
							    <th>
							<label for="BegrÃ¼ÃŸung">Hallo, </label><?php 
							$greeting=begrüßung();
							$userid=profil();
							echo "<a href='Profil.php?page=$userid'>$greeting</a>"; ?>
							   </th>
							</tr>
							<tr>
							<th>
							<button type="submit" id="ausloggen" name="ausloggen" ">Abmelden</button>
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
				<h1>Profil</h1>
				
<?php
if (logged_in() == false) {
    echo 'Sie haben keine Berechtigung f&uuml;r diese Seite <a href="Index.php">zur&uuml;ck zur Startseite</a>';
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
        $profilbild = $profil['Profilbild'];
    }
    
    ?>
				<table>
					<tr>
						<th ALIGN="LEFT"><label for="vname">Profilbild:</label>
						
						<td>
    <?php   echo "<img src ='$profilbild' alt'Profilbild' width='150' height='150'>"; ?>
    				</td>
						</th>

					</tr>
					<tr>
						<th ALIGN="LEFT"><label for="name">Name:</label>
						
						<td>
    <?php echo $name?>
    
						
						
						
						</th>
						<td></td>
 <?php if(profilPrüfung($profilid)==true){ ?>
    <td>
							<input type='button' value='Profil l&ouml;schen' onclick=window.location.href='Profilloeschen.php' />
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
 <?php if(profilPrüfung($profilid)==true){ ?>
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
						<th ALIGN="LEFT"><label for="pass">Passwort best&auml;tigen:</label></th>
						<td><input id="pass" name="passwd_neu" type="password">

							<button type="submit" style="clear: right;">Passwort &auml;ndern</button>
						</td>
						</form>
					</tr>
					<tr>
						<form action="Profilbild.php" method="post"enctype="multipart/form-data">

							<th ALIGN="LEFT"><label for="pic">Profilbild &auml;ndern:</label></th>


							<td><input name="datei" size="10px" type="file" size="50"
								accept="img/*"> 
								<button type="submit" style="clear: right;">hochladen</button></td>
					</form>
					</tr>
				
<?php
    }
    ?>
        


				</table>
<?php
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
					<li><a href="Index.php?page=4">Fu&szlig;ball</a></li>
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
					<li><a href="Index.php?page=1">B&uuml;chergruppe</a></li>
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
