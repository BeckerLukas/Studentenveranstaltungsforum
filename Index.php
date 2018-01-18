<?php 
include 'Loginverwaltung.php';
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Studentenveranstaltungsforum; </title>
		<style type="text/css">
		
			body {
				margin:0;
				padding:0;
				font-family: monospace;
				line-height: 1.5em;
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
				<h1>Studentenveranstaltungsforum</h1>
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
							<label for="Begrüßung">Hallo, </label><?php echo begrüßung();?>
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
						<h1>Aktuelle Veranstaltungen</h1>
							
						<p> Wir begrüßen DICH auf dem Veranstaltungsforum von und für Studenten der Hochschule-Hamm-Lippstadt. </p>
						<h2>Aktuelle Meldungen</h2>
						<p> Hier erwarten sie Mitteilungen zu Änderungen des Studentenveranstaltungsforum. </p>
						<table border=4 cellspacing=5 cellpadding=15> 
						<tr>
							<th> Veranstaltungsname </th>
							<th> Datum/Uhrzeit </th>
							<th> Kategorie </th>
							<th> Verfasser </th>
						</tr>
						<tr>
							<td><a href="#" >Fußball in Lippstadt </a> </td>
							<td> 29.11.2017/ 15 Uhr </td>
							<td><a href='#' >Sport</a> </td>
							<td><a href="#" >Lukas Becker</a> </td>
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
