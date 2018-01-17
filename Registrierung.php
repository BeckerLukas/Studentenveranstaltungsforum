                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="checkRegistrierung.js"> </script>
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
				margin-bottom: -9960px;
				float: left;
				width: 190px;
				margin-left: -100%;
				background: #eee;
			}
			
			#footer {
				clear: left;
				width: 100%;
				background: #fecc00;
				text-align: left;
				padding: 5px 0;
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
	
	<body background="bgimg.jpg" >		

		<header id="header"  > 
			<div class="innertube"> 
			<img src ="neu.png" alt"Studentenveranstaltungsforum"
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
							<td> </td>
							<td>
							<button type="button">Anmelden</button>
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
						<h1>Registrierung</h1>
<?php if(!isset($_GET["page"])){
 ?>
				<form action="Registrierung.php?page=2" method="post" enctype="multipart/form-data"> 
					<table>
						<tr>
							    <th ALIGN="LEFT">
							<label for="name">Name:</label>
							   </th>
							        <td> 
							<input id="name" name="name" > 
							        </td>
						</tr>
							<tr>
							    <th ALIGN="LEFT">
							<label for="vname">Vorname:</label>
							   </th>
							        <td> 
							<input id="vname" name="vname"> 
							        </td>
							</tr>
							<tr>
							    <th ALIGN="LEFT">
							<label for="name">E-Mail:</label>
							   </th>
							        <td> 
							<input id="email" name="email" onkeyup="checkEmail()">@stud.hshl.de
							        </td>
							        <td>
							<type="text" id="emailtext">
							        </td>
						</tr>
						<tr>
						<th ALIGN="LEFT">
							<label>Geschlecht:
						</th>	
							<td>
								<input type="radio" name="geschlecht" value="male"/> m
								<input type="radio" name="geschlecht" value="female"/> w
							</td>
							</tr>
							<tr>
							<th ALIGN="LEFT">
							<form action="/action_page.php">
								Geburtstag:
							</th>
							<td>
							<input type="date" name="bday" style= "width: 148px;">
							</td>
							</tr>
							<tr>
							<th ALIGN="LEFT">
							<form action="select.html">
								<label> Studiengang:
							</th>
							<td>
								<select name="studiengang" c>
									<option value="Angewandte Biomedizintechnik">Angewandte Biomedizintechnik </option>
									<option value="Betriebswirtschaftslehre">Betriebswirtschaftslehre </option>
									<option value="Biomedizinisches Management und Marketing">Biomedizinisches Management und Marketing </option>
									<option value="Biomedizinische Technologie">Biomedizinische Technologie </option>
									<option value="Business and Systems Engineering">Business and Systems Engineering </option>
									<option value="Computervisualistik und Design">Computervisualistik und Design </option>
									<option value="Energietechnik und Ressourcenoptimierung">Energietechnik und Ressourcenoptimierung </option>
									<option value="Intelligent Systems Design">Intelligent Systems Design </option>
									<option value="Interaktionstechnik und Design">Interaktionstechnik und Design </option>
									<option value="Interkulturelle Wirtschaftspsychologie">Interkulturelle Wirtschaftspsychologie </option>
									<option value="Materialdesign - Bionik und Photonik">Materialdesign - Bionik und Photonik </option>
									<option value="Mechatronik">Mechatronik </option>
									<option value="Product and Asset Management">Product and Asset Management </option>
									<option value="Soziale Medien und Kommunikationsinformatik">Soziale Medien und Kommunikationsinformatik </option>
									<option value="Sport- und Gesundheitstechnik">Sport- und Gesundheitstechnik </option>
									<option value="Technical Consulting und Management">Technical Consulting und Management </option>
									<option value="Technical Entrepreneurship and Innovation">Technical Entrepreneurship and Innovation </option>
									<option value="Technisches Management und Marketing">Technisches Management und Marketing </option>
									<option value="Umweltmonitoring und Forensische Chemie">Umweltmonitoring und Forensische Chemie </option>
									<option value="Wirtschaftsingenieurwesen">Wirtschaftsingenieurwesen </option>	
								</select>
								</label>
								</form>
							</td>
							</tr>
							<tr>
							<th ALIGN="LEFT">
							<label for="passr">Passwort:</label> 
							    </th>
								<td>
							<input id="passr" name="passr" type="password" onkeyup="checkPasswort()"> 
							    </td>
							</tr>
							<tr>
							<th ALIGN="LEFT">
							<label for="passwd">Passwort bestÃ¤tigen:</label> 
							    </th>
								<td>
							<input id="passwd" name="passwd" type="password" onkeyup="checkPasswort()"> 
							    </td>
							    <td>
							    <type="text" id="passtext">
							    </td>
							</tr>
				   	<tr>
							
							<th ALIGN="LEFT">
			
							</td>
							</tr> 
							<tr>
							
							<td>
							</td>
							<td>
							<button type="submit" style="clear:right;" name="upload" value="Upload">Anmelden</button>
							</td>
							</tr>
	</form>
							
</form>
    </select>
  </label>
</form>
							</select>
					
							
					</table>	
			</form>
<?php 
}
?>
<?php 
if(isset($_GET["page"])){
    if($_GET["page"]=="2"){
        $email = strtolower($_POST["email"]);
        $passwortr = ($_POST["passr"]);
        $passwortwd = ($_POST["passwd"]);
        $name = ($_POST["name"]);
        $vname = ($_POST["vname"]);
        $geschlecht = ($_POST["geschlecht"]);
        $studiengang = ($_POST["studiengang"]);
        $bday = ($_POST["bday"]);
        
      if($passwortr != $passwortwd)
          echo "<br>Ihre Passwörter stimmen nicht überein. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if (strlen($passwortr) > 20 or strlen($passwortr) < 8 )
          echo "<br>Ihr Passwort muss zwischen 8 und 20 Zeichen lang sein. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(strlen($email) < 1)
          echo "<br>Bitte geben Sie Ihre HSHL E-Mail Adresse ein. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(strlen($name)< 1)
          echo "<br>Bitte geben Sie Ihren Namen ein. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(strlen($vname) <1)
          echo "<br>Bitte geben Sie Ihren Vornamen ein. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(!isset($geschlecht))
          echo "<br>Bitte geben Sie Ihr Geschlecht an.  Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(strlen($studiengang) <1)
          echo "<br>Bitte wählen Sie Ihren Studiengang aus.  Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
      else if(!isset($bday)){
          echo"<br>Bitte geben Sie Ihr Geburtsdatum an. Bitte wiederhole deine Eingabe...<a href=http://localhost/SVF/applications.html/Registrierung.php>zurück</a>";
         
      }else {
          $passwortr=md5($passwortr);
          $email=$email."@stud.hshl.de";
          $verbindung = mysqli_connect("localhost", "test", "12345678", "SVF")
          or die ("Verbindung zur Datenbank konnte nicht hergestellt werden");
         
          $control=0;
          $abfrage ="SELECT 'EMail' FROM `benutzer` WHERE 'EMail' = '$email'";
          $ergebnis = mysqli_query($verbindung, $abfrage);
          while($row = mysqli_fetch_object($ergebnis)){
              $control++;
          }
          if($control != 0){
              echo "E-Mail wurde bereits verwendet... <a href=\"http://localhost/SVF/applications.html/Registrierung.php\>zurück</a>";
          }else {
              $eintrag = "INSERT INTO benutzer
              (EMail, Passwort, Name, Vorname, Geschlecht, Studiengang, Geburtstag)

              VALUES
             ('$email', '$passwortr', '$name','$vname', '$geschlecht', '$studiengang', '$bday')";
          $eintragen = mysqli_query($verbindung, $eintrag);
          }if ($eintragen== true){
              echo "Vielen Dank. Sie haben sich nun registriert..<a href=\"Vorlage Website.html\">Jetzt anmelden</a>";
          }else{
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
						<li><a href="#">Stadtbesichtigung</a></li>
						<li><a href="#">Kneipentour</a></li>
						<li><a href="#">Stadttheater</a></li>
						<li><a href="https://www.cineplex.de/programm/heute/lippstadt/">Kino</a></li>
						<li><a href="#">Fest</a></li>
					</ul>
					<h3>Sport</h3>
					<ul>
						<li><a href="#">FuÃŸball</a></li>
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

