function checkEmail(){
var emailToCheck = document.getElementById("email").value;

     if(emailToCheck.length == 0){
	document.getElementById("emailtext").textContent="Keine E-Mail eingegeben!";
	document.getElementById ("emailtext").style.color = "#ff0000";
     }
     else if(emailToCheck.indexOf(".")==-1){
		 document.getElementById("emailtext").textContent="Email nicht korrekt!"
		document.getElementById ("emailtext").style.color = "#ff0000";
}
else{
	document.getElementById("emailtext").textContent="Email korrekt!"
	document.getElementById ("emailtext").style.color = "#008000";
}
}

function checkPasswort(){
	var passwortToCheck = document.getElementById("passr").value;
	var passwort2ToCheck = document.getElementById("passwd").value;
	if (passwortToCheck.length == 0){
			document.getElementById("passtext").textContent="Kein Passwort eingegeben!";
			document.getElementById ("passtext").style.color = "#ff0000";
		}
	else if(passwortToCheck != passwort2ToCheck){
		document.getElementById("passtext").textContent="Passwörter stimmen nicht überein!";
		document.getElementById ("passtext").style.color = "#ff0000";
		
	}
	else if(passwortToCheck.match(/[\\,\[,\],\{,\},\",\',ö,ä,ü,Ö,Ä,Ü,ß]/)){
		document.getElementById("passtext").textContent="Passwort darf keine Sonderzeichen enthalten!";
		document.getElementById ("passtext").style.color = "#ff0000";
	}
	else if (passwortToCheck.length < 8 || passwortToCheck.length >20){
	    document.getElementById("passtext").textContent="Passwortlänge stimmt nicht!";
	    document.getElementById ("passtext").style.color = "#ff0000";
		}
	else if(passwortToCheck.match(/[A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z]/)==null){ 
		document.getElementById("passtext").textContent="Enthält keinen Großbuchstaben!";
	    document.getElementById ("passtext").style.color = "#ff0000";
		}
			
	else {
			document.getElementById("passtext").textContent="Passwort ist richtig";
			document.getElementById ("passtext").style.color = "#008000";
			}
		}
	
