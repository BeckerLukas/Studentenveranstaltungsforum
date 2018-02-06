<?php
include 'Loginverwaltung.php';
session_start();
$con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
if (isset($_GET["page"])) {
    $veranstaltungsid = $_GET['page'];
    
    $sql = "SELECT * FROM veranstaltung v
    JOIN kategorie k ON v.Kategorie=KategorieID
    WHERE v.VeranstaltungsID = '$veranstaltungsid'
    LIMIT 1";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $veranstaltung = mysqli_fetch_assoc($result);
        $veranstaltungsname = $veranstaltung['Veranstaltungsname'];
        $kategorie = $veranstaltung['Bezeichnung'];
        $datum = $veranstaltung['Datum'];
        $uhrzeit = $veranstaltung['Uhrzeit'];
        $teilnehmer = $veranstaltung['Teilnehmerzahl'];
        $beschreibung = $veranstaltung['Beschreibung'];
        $ort = $veranstaltung["Ort"];
        $ersteller = $veranstaltung['Ersteller'];
    }
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
	font-size: large;
	
}

button {
	
}

table {
	height: auto; 
	width: auto;
}

select {
	height: auto;
	 width: auto;
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
			<a href='Index.php'><img src="neu.png"
				alt="Studentenveranstaltungsforum" width="150" height="135"></a>
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
				<h1>Veranstaltung</h1>
						<?php
    
    if (isset($_GET["page"])) {
        ?>
					<table>
					<tr>
						<th><label for="name">Veranstaltungsname:</label>
						
						<td>
							<?php echo $veranstaltungsname  ?>
							</td>
						</th>
					</tr>
					<tr>
						<th ALIGN="LEFT">Kategorie:
						
						<td>
							<?php echo $kategorie  ?>
							</td>
							<?php
        
        if (logged_in()) {
            ?>
							<td>
						    <?php
            
            if (prüfeTeilnahme($veranstaltungsid)) {
                
                echo "<form action='Veranstaltungbeitreten.php?page=$veranstaltungsid' method='post'>";
                
                echo "<button type='submit' style='clear:right;'  >Teilnehmen</button>";
                
                echo "</form>";
                ?>
					        <?php
            } else {
                echo "<form action='Veranstaltungverlassen.php?page=$veranstaltungsid' method='post'>";
                
                echo "<button type='submit' style='clear:right;' >Austreten</button>";
                
                echo "</form>";
            }
            ?>
							</td>
	                       <?php }?>
							</th>
					</tr>

					<tr>
						<th ALIGN="LEFT">Datum:
						
						<td>
							<?php echo $datum ?>
							</td>
						</th>
						<td></td>
					</tr>

					<tr>
						<th ALIGN="LEFT">Uhrzeit:
						
						<td>
							<?php echo substr($uhrzeit, 0,5) ?>
							
						
						
						
						
						
						
						
						</th>
<?php if(logged_in()){ ?>
							
					
					
					
					
					
					
					
					
					
					
					
					<tr>
						<th ALIGN="LEFT">Teilnehmerzahl:
						
						<td>
							<?php echo $teilnehmer ?>
							
						
						
						
						
						
						
						
						<td>
						
						</th>
					</tr>
					<td></td>
					</tr>
					<tr>
						<th ALIGN="LEFT">Beschreibung:
						
						<td width="500px">
							<?php echo $beschreibung ?>
							   
						
						
						
						
						
						
						
						</th>

					</tr>
					<tr>
						<th ALIGN="LEFT">Teilnehmer:</th>
						<td> 
						<?php
            if (! isset($_POST['Filter'])) {
                $filter = "Zeit";
            } else {
                $filter = $_POST['Filter'];
            }
            $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
            $sql = "SELECT b.BenutzerID, b.Vorname, b.Name, c.Zeit
			  FROM beitreten AS c
			  LEFT JOIN benutzer AS b  ON (c.Teilnehmer = b.BenutzerID)
			  WHERE c.Veranstaltung = '$veranstaltungsid'
              ORDER BY `$filter` DESC";
            $result = mysqli_query($con, $sql);
            $br= 5;
            $count=0;
            while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $count+=1;
                echo "<a href='Profil.php?page=" . $zeile['BenutzerID'] . "'>" . $zeile['Vorname'] . " " . $zeile['Name'] . "</a> &nbsp &nbsp";
                if($count >= $br){
                    echo "<br>";
                    $br+= 5;
                }
            }
            ?>
						 </td>
						<td>
							<form method='post' action=''>
								<select name="Filter">
									<option value="Zeit">Zuletzt beigetreten</option>
									<option value="Name">Nachname</option>
									<option value="Vorname">Vorname</option>
									<option value="Geschlecht">Geschlecht</option>
								</select>
								<button type="submit" style="clear: right;">Filter</button>
							</form>
						</td>


					</tr>

					<td></td>
					<tr>
						<th ALIGN="LEFT">Ort:
						
						<td>
							<?php echo $ort ?>
							</td>
						</th>
						<td></td>
						<td></td>

					</tr>
					<td></td>



					<tr>
						<td></td>
						<td></td>
<?php if(profilPrüfung($ersteller)== true){  ?>
							<td>
						<?php 	echo "<input type='button' value='Veranstaltung l&ouml;schen' onclick=window.location.href='Veranstaltung_loeschen.php?id=$veranstaltungsid' />" ?>
						</td>
<?php
            }
            ?>
							</tr>
<?php if (!prüfeTeilnahme($veranstaltungsid)) {?>
					<tr>
						<th ALIGN="LEFT"><label for="text">Beitrag verfassen:</label></th>
					</tr>
					<tr>
						<td></td>

						<td>
						<?php
                
                echo "<form action='Nachrichtgesendet.php?page=$veranstaltungsid' method='post'>";
                echo "<textarea cols='60' rows='7' maxlength='280' name='inhalt'>Beitrag schreiben...</textarea>";
                
                echo "<br>
								<button type='submit' style='clear: right;'>Senden</button>
							</form>";
                ?>
						</td>
					</tr>
					<tr>
						<td></td>
					</tr>
<?php }
            }
?>


				</table>
				
				<?php if(logged_in()){
				    if(!prüfeTeilnahme($veranstaltungsid)){
				        
				?>
				<table border=1 cellspacing=2 cellpadding=10
					class="TabellenbeitrÃ¤ge">
					<h1 ALIGN="LEFT">BeitrÃ¤ge:</h1>
					<tr>
						<th ALIGN="LEFT">Nutzername:</th>
						<th ALIGN="LEFT" width="500px">Beitrag:</th>

						<th ALIGN="LEFT">Erstellt:</th>
					</tr>
					<tr>
	<?php
                if (! isset($_GET['button'])) {
                    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
                    $sql = "SELECT b.BenutzerID, b.Vorname, b.Name, c.Inhalt, c.Zeit
             FROM beitrag AS c
             LEFT JOIN benutzer AS b  ON (c.Verfasser = b.BenutzerID)
             WHERE c.Veranstaltung = '$veranstaltungsid' 
             ORDER BY `Zeit` DESC LIMIT 5";
                    $result = mysqli_query($con, $sql);
                    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td><a href='Profil.php?page=" . $zeile['BenutzerID'] . "'>" . $zeile['Vorname'] . " " . $zeile['Name'] . "</a> </td>";
                        echo "<td width='500px'>" . $zeile['Inhalt'] . "</td>";
                        echo "<td>" . $zeile['Zeit'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    $con = mysqli_connect('localhost', 'test', '12345678', 'SVF') or die(mysql_error());
                    $sql = "SELECT b.BenutzerID, b.Vorname, b.Name, c.Inhalt, c.Zeit
             FROM beitrag AS c
             LEFT JOIN benutzer AS b  ON (c.Verfasser = b.BenutzerID)
             WHERE c.Veranstaltung = '$veranstaltungsid'
             ORDER BY `Zeit` DESC";
                    $result = mysqli_query($con, $sql);
                    while ($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td><a href='Profil.php?page=" . $zeile['BenutzerID'] . "'>" . $zeile['Vorname'] . " " . $zeile['Name'] . "</a> </td>";
                        echo "<td width='500px'>" . $zeile['Inhalt'] . "</td>";
                        echo "<td>" . $zeile['Zeit'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            
            ?>
			
				
				
				
				
				
				
				
				</table>
<?php
            if (! prüfeTeilnahme($veranstaltungsid)) {
                if (logged_in()) {
                    if (! isset($_GET['button'])) {
                        echo "<form>";
                        echo "<input type='button' value='mehr..' onclick=window.location.href='Veranstaltung.php?page=$veranstaltungsid&button=1' />";
                        echo "</form>";
                    }
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
