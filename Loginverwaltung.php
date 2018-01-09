<?php
function connect()
{
    $con=mysql_connect('localhost','test','12345678') or die(mysql_error());
    mysql_select_db('SVF',$con) or die(mysql_error());
}

function check_user($name, $pass)
{
    $sql="SELECT Benutzer-ID
    FROM benutzer
    WHERE E-Mail='".$email."' AND Passwort=MD5('".$pass."')
    LIMIT 1";
    $result=mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($result)==1)
    {
        $user=mysql_fetch_assoc($result);
        return $user['Benutzer-ID'];
    }
    else
        return false;
}

function login($userid)
{
    $sql="UPDATE benutzer
    SET Session='".session_id()."'
    WHERE Benutzer-ID=".$userid;
    mysql_query($sql);
}

function logged_in()
{
    $sql="SELECT Benutzer-ID
    FROM benutzer
    WHERE Session='".session_id()."'
    LIMIT 1";
    $result=mysql_query($sql);
    return (mysql_num_rows($result)==1);
}

function logout()
{
    $sql="UPDATE benutzer
    SET Session=NULL
    WHERE Session='".session_id()."'";
    mysql_query($sql);
}

connect();
?>