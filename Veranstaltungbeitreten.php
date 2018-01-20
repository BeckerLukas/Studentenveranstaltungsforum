<?php
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
    
 ?>
