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
			<img src ="C:\Users\Louisa\Documents\3 semester\projekt\neu.png" alt"Studentenveranstaltungsforum"
			width="150" height="135">
				<div style="float:right;">
					<form action="">
		<table>
			<tbody>
							<tr>
							    <th>
							<label for="login">E-Mail:</label>
							   </th>
							        <td> 
							<input id="login" name="login"> 
							        </td>
							</tr>
							<tr>
							<th>
							<label for="pass">Passwort:</label> 
							    </th>
								<td>
							<input id="pass" name="pass" type="password"> 
							    </td>
							</tr>
							<tr>
							<td> 
							</td>
							
							<td>
							<button type="button">Anmelden</button>
						
							<p> <a href="file:///D:/Dokumente%20Studium/3.Semester/Softwareprojekt/Studentenveranstaltungsforum/Registrierung.html">Noch nicht registriert ?</a></p>
							</td>
							</tr>
		
				</body>
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
					<table>
						<tr>
							    <th ALIGN="LEFT">
							<label for="name">Veranstaltungsname:</label>
							   </th>
							        <td> 
							<input id="name" name="name"> 
							        </td>
						
							 
							 
						</tr>
						<tr>
							<th ALIGN="LEFT">
							<form action="select.html">
								<label> Kategorie:
							</th>
							<td>
								<select>
								
									<option>Büchergruppe </option>
									<option>Fest </option>
									<option>Fitness </option>
									<option>Fußball </option>
									<option>Joggen </option>
									<option>Kanutour </option>
									<option>Kino </option>
									<option>Kneipentour </option>
									<option>Lerngruppe </option>
									<option>Minigolf </option>
									<option>Party </option>
									<option>Radtour </option>
									<option>Reisen </option>
									<option>Stadtbesichtigung </option>
									<option>Stadttheater </option>
									<option>Spieleabend </option>
									<option>Treffen </option>
									<option>Volleyball </option>
									<option>Yoga </option>
									<option>Sonstiges </option>
								
								</select>
								</label>
								</form>
							</td>
							</tr>
						
							<tr>
							<th ALIGN="LEFT">
							<form action="/action_page.php">
								Datum:
							</th>
							<td>
							<input type="date" name="vdate" style= "width: 148px;">
							</td>
							</tr>
							
							<tr>
							<th ALIGN="LEFT">
							
							<label> Uhrzeit:
							</th>
							<td>
							<input type="time" name="UhrZeit" placeholder="23:59:59">
							</td>
							</label>
							</tr>
							<tr>
							    <th ALIGN="LEFT">
							<label for="teilnehmerzahl">Teilnehmerzahl:</label>
							   </th>
							        <td> 
							<input id="teilnehmerzahl" name="teilnehmerzahl" type="number"> 
							        </td>
						
							 
							 
						</tr>
							<tr>
							    <th ALIGN="LEFT">
							<label for="name">Beschreibung:</label>
							   </th>
							         <td> 
							<textarea class="textb" cols="80" rows="5" maxlength="280" >Beschreibung schreiben...
							</textarea>
												</td>
						</tr>
						<td>
						</td>
						<tr>
							    <th ALIGN="LEFT">
							<label for="name">Ort:</label>
							   </th>
							        <td> 
							<input id="name" name="name"> 
							        </td>
						<td> <input type="button" value="Ort auf Karte anzeigen"
							onclick="window.location.href='http://maps.google.com/?q'" />
						</td>	 
							 
						</tr>
						<td>
						</td>
						<td>
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div  style="overflow:hidden;height:400px;width:600px;"><div id="map_canvas" style="height:400px;width:600px;"></div><a href="http://www.maps-einbinden.de">google maps für webseite</a></div><script type="text/javascript">window.setTimeout("initGmaps();",300);function initGmaps(){var myOptions = {zoom:15,center:new google.maps.LatLng(51.6712278, 8.340648099999953),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(51.6712278, 8.340648099999953)});infowindow = new google.maps.InfoWindow({content: "<b>Meine Adresse</b><br><br>Lippstadt"});google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}</script>
							 
						</td>	 
						
					
							<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
							<button type="submit" style="clear:right;">Veranstaltung erstellen</button>
							</td>
							</tr>
	</form>
							
</form>
    </select>
  </label>
</form>
							</select>
					
							
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
						<li><a href="#">Fußball</a></li>
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