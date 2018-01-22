<?php
include 'Loginverwaltung.php';
session_start();
$profil = profil();
$url="Profil.php?page=".$profil;
$upload_folder = 'PB/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


//�berpr�fung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
    die("Ung�ltige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}

//�berpr�fung der Dateigr��e
$max_size = 250*1024; //250 KB
if($_FILES['datei']['size'] > $max_size) {
    die("Bitte keine Dateien gr��er 250kb hochladen");
}

//�berpr�fung dass das Bild keine Fehler enth�lt
if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
    $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMG_JPG);
    $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
    if(!in_array($detected_type, $allowed_types)) {
        die("Nur der Upload von Bilddateien ist gestattet");
    }
}

//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;

//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, h�nge eine Zahl an den Dateinamen
    $id = 1;
    do {
        $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
        $id++;
    } while(file_exists($new_path));
}

//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
echo "Bild erfolgreich hochgeladen.<a href='$url''>zur�ck</a>"; 
$con=mysqli_connect('localhost','test','12345678', 'SVF') or die(mysql_error());
$session = session_id();

    $neuesPB="UPDATE benutzer
           SET Profilbild='$new_path'
           WHERE Session='$session'";
    mysqli_query($con, $neuesPB);
  



?>