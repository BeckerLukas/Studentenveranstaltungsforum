<?php
include 'Loginverwaltung.php';
session_start();
$con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
if(isset($_GET["page"])){
$veranstaltungsid=$_GET['page'];

$sql="SELECT * FROM veranstaltung v
    JOIN kategorie k ON v.Kategorie=KategorieID
    WHERE v.VeranstaltungsID = '$veranstaltungsid'
    LIMIT 1";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result) == 1){
    $veranstaltung= mysqli_fetch_assoc($result);
    $veranstaltungsname=$veranstaltung['Veranstaltungsname'];
    $kategorie=$veranstaltung['Bezeichnung'];
    $datum=$veranstaltung['Datum'];
    $uhrzeit=$veranstaltung['Uhrzeit'];
    $teilnehmer=$veranstaltung['Teilnehmerzahl'];
    $beschreibung=$veranstaltung['Beschreibung'];
    $ort=$veranstaltung["Ort"];
    $ersteller=$veranstaltung['Ersteller'];
}
}

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Studentenveranstaltungsforum; </title>
		<style type="text/css">
		
			body {
				margin:0;
				padding:0;
				font-family: fantasy;
				line-height: 1.5em;
				font-size: large;
			}
			button {
				
			}
			
			table {
				height: auto
				width: auto
			}
			select {
				height: auto
				width: auto
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
			<img src ="neu.png" alt"Studentenveranstaltungsforum"
			width="150" height="135">
				<div style="float:right;">
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
							<label for="Begr√º√üung">Hallo, </label><?php echo begr¸ﬂung();?>
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
						<h1>Veranstaltung</h1>
						<?php if(isset($_GET["page"])){
 ?>
					<table>
						<tr>
							    <th>
							<label for="name">Veranstaltungsname:</label>
							<td>
							<?php echo $veranstaltungsname  ?>
							</td>
							   </th>
						</tr>
						<tr>
							<th ALIGN="LEFT">
							
							Kategorie:
							<td>
							<?php echo $kategorie  ?>
							</td>
							<?php if(logged_in()){
							?>
							<td>
						    <?php if(pr¸feTeilnahme($veranstaltungsid)== true){?>
						    <form action="Veranstaltung.php?page='.$veranstaltungsid.'" method="post">
						   <?php veranstaltungBeitreten($veranstaltungsid); ?>
							<button type="submit" style="clear:right;" ">Teilnehmen</button>
					        </form>
					        <?php }else{ ?>
					        <form action="Veranstaltung.php" method="post">
						   <?php veranstaltungVerlassen($veranstaltungsid);
						   $url="Veranstaltung.php?page=".$veranstaltungsid;
						   if(pr¸feTeilnahme($veranstaltungsid) == true){
						   echo 'Sie wurden nun abgemeldet. <a href="Veranstaltung.php?page='.$veranstaltungsid.'"> zur¸ck zur Startseite </a>';
						   }
						   ?>
							<button type="submit" style="clear:right;" ">Austreten</button>
					        </form>
					        <?php }?>
							</td>
	                       <?php }?>
							</th>
							</tr>
						
							<tr>
							<th ALIGN="LEFT">
							
							Datum:
							<td>
							<?php echo $datum ?>
							</td>
							</th>
							<td>
							
							</td>
							</tr>
							
							<tr>
							<th ALIGN="LEFT">
							
							Uhrzeit:
							<td>
							<?php echo substr($uhrzeit, 0,5) ?>
							</th>
<?php if(logged_in()){ ?>
							<tr>
							<th ALIGN="LEFT">
							Teilnehmerzahl:
							<td>
							<?php echo $teilnehmer ?>
							<td>
							</th>
							</tr>
							<td>
							
							</td>
							</label>
							</tr>
							<tr>
							    <th ALIGN="LEFT">
							Beschreibung:
							<td>
							<?php echo $beschreibung ?>
							   </th>
							    
						</tr>
						<tr>
						<th ALIGN="LEFT">
						
						Teilnehmer: 
						</th>
						<td>
						</td>
							<td>
								<select>
								
									<option>Zuletzt beigetreten </option>
									<option>Nachname </option>
									<option>Vorname </option>
									<option>Geschlecht </option>
							</td>
						</tr>
						
						<td>
						</td>
						<tr>
							    <th ALIGN="LEFT">
							Ort:
							<td>
							<?php echo $ort ?>
							</td>
							   </th>
							        <td> 
							
							        </td>
						<td> 
						</td>	 
							 
						</tr>
						<td>
						</td>
						<td ALIGN="LEFT">
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div  style="overflow:hidden;height:200px;width:300px;"><div id="map_canvas" style="height:400px;width:600px;"></div><a href="http://www.maps-einbinden.de">google maps f√ºr webseite</a></div><script type="text/javascript">window.setTimeout("initGmaps();",300);function initGmaps(){var myOptions = {zoom:15,center:new google.maps.LatLng(51.6712278, 8.340648099999953),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(51.6712278, 8.340648099999953)});infowindow = new google.maps.InfoWindow({content: "<b>Meine Adresse</b><br><br>Lippstadt"});google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}</script>
							 
						</td>	 
						
					
							<tr>
							<td>
							</td>
							<td>
							</td>
<?php if(profilPr¸fung($ersteller)== true){  ?>
							<td>
							<button type="submit" style="clear:right;">Veranstaltung bearbeiten</button>
							</td>
<?php }
?>
							</tr>
					<tr>
							    <th ALIGN="LEFT">
							<label for="text">Beitrag verfassen:</label>
							   </th>
						</tr>
						<tr>
						<td> 
						
						</td>
							        <td> 
							<textarea class="textb" cols="60" rows="7" maxlength="280" >Beitrag schreiben...
							</textarea>
							        </td>
									
						</tr>
						<tr>
							<td>
							<button type="submit" style="clear:right;">Senden</button>
							</td>
						</tr>
	</form>
							
</form>
    </select>
  </label>
</form>
							</select>
					
							
					</table>	
			<table border=1 cellspacing=2 cellpadding=10 class="Tabellenbeitr√§ge"> 
			<h1 ALIGN="LEFT">
				Beitr√§ge:
							   </h1>
			<tr>
			<th ALIGN="LEFT">
			Nutzername:
			</th>
			<th ALIGN="LEFT">
			Beitrag:
			</th>
		
			<th ALIGN="LEFT">
			Erstellt:
			</th>
			</tr>
			<tr>
				<td>
				</td>
				<td> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum 
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>

				</td>
			</tr>
<?php }
?>
			</table>
<?php if(logged_in()){  ?>
				<button>
			mehr..
			</button>
<?php }
?>
<?php }?>
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
