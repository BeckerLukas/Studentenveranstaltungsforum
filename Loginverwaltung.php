<?php

$con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());


function check_user($email, $pass)
{
  
    $con=mysqli_connect("localhost","test","12345678", "SVF") 
    or die("Es konnte Keine Verbindung zur Datenbank aufgenommen werden");
    $email=strtolower($email);
    $pass=md5($pass);
    $sql = "SELECT BenutzerID FROM benutzer WHERE EMail = '$email' AND Passwort = '$pass'  LIMIT 1";
    $result= mysqli_query($con, $sql) or die("Es konnte keine Verbindung hergestellt werden");
    if(mysqli_num_rows($result) == 1){
        $user= mysqli_fetch_assoc($result);
        return $user['BenutzerID'];
    }
    else{
        return false;
    }
}

function login($userid)
{
    $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql="UPDATE benutzer
    SET Session='$session'
    WHERE BenutzerID='$userid'";
    mysqli_query($con, $sql);
}

function logged_in()
{
    $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
    $session=session_id();
    $sql="SELECT BenutzerID
    FROM benutzer
    WHERE Session = '$session'
    LIMIT 1";
    $result=mysqli_query($con, $sql);
    return (mysqli_num_rows($result)==1);
}

function logout()
{
    $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql="UPDATE benutzer
    SET Session=NULL
    WHERE Session='$session'";
    mysqli_query($con, $sql);
}
function begr��ung(){
    $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
    $session=session_id();
    $sql="SELECT Vorname
    FROM benutzer
    WHERE Session = '$session'
    LIMIT 1";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        $user= mysqli_fetch_assoc($result);
        return $user['Vorname'];
    }
    else{
        return false;
    }
}
function profilPr�fung($profilid)
    {
        $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
        $session = session_id();
        $sql="SELECT BenutzerID 
        FROM benutzer
        WHERE Session='$session'";
        $result=mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1){
            $user= mysqli_fetch_assoc($result);
            $userid=$user['BenutzerID'];
        }
        if($profilid == $userid)
            return true;
        else 
            return false;        
}
function veranstaltungBeitreten($veranstaltungsid){
$con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
$session = session_id();
$sql="SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result) == 1){
    $user= mysqli_fetch_assoc($result);
    $userid=$user['BenutzerID'];
}

$beitreten="INSERT INTO beitreten
              (Teilnehmer, Veranstaltung)
              
              VALUES
             ('$userid', '$veranstaltungsid')";
$eintragen = mysqli_query($con, $beitreten);
}

function pr�feTeilnahme($veranstaltungsid){
    $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
    $session = session_id();
    $sql="SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        $user= mysqli_fetch_assoc($result);
        $userid=$user['BenutzerID'];
    }
    $pr�fung="SELECT * 
              FROM beitreten
              WHERE Teilnehmer='$userid' AND Veranstaltung='$veranstaltungsid'";
    $pr�fen=mysqli_query($con, $pr�fung);
    if(mysqli_num_rows($pr�fen) == 1){
        return false;
    }else{
            return true;
        }
    
    }
    function veranstaltungVerlassen($veranstaltungsid){
        $con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
        $session = session_id();
        $sql="SELECT BenutzerID
        FROM benutzer
        WHERE Session='$session'";
        $result=mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1){
            $user= mysqli_fetch_assoc($result);
            $userid=$user['BenutzerID'];
        }
        
        $verlassen="DELETE * FROM beitreten WHERE Teilnehmer = '$userid' AND Veranstaltung='$veranstaltungsid";
        $l�schen = mysqli_query($con, $verlassen);
        
        
    }
    
?>