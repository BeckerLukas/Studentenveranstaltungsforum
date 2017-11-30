function checkEmail(){
var emailToCheck = document.getElementById("email").value;

if(emailToCheck.match(!"@stud.hshl.de")){
document.getElementById ("email").innerHTML = "Email nicht korrekt";
document.getElementById ("email").style.color = "#ff0000";
}
else if(emailToCheck.IndexOf = ""){
	document.getElementById("email").innerHTML="Keine E-Mail eingegeben!"
}

}

function checkPasswort(){
	var passwortToCheck = document.getElementById("passwort").value;
	var passwort2ToCheck = document.getElementById("passwortwd").value
	if (passwortToCheck.IndexOf = ""){
		document.getElementById("passwort"){
			document.getElementById("passwort").innerHTML="Kein Passwort eingegeben!";
		}
	}
	else if(passwortToCheck.IndexOf != passwort2ToCheck.IndexOf){
		document.getElementById("passwort").innerHTML="Passwörter stimmen nicht überein!";
		
	}
	else if(passwortToCheck..match(/[\\,\[,\],\{,\},\",\',ö,ä,ü,Ö,Ä,Ü,ß]/)){
		document.getElementById("passwort").innerHTML="Passwort darf keine Sonderzeichen enthalten!"
	}
}