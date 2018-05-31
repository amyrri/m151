<?php

/*
 * @autor Michael Abplanalp
 * @version Februar 2018
 * Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 * Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 * sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */
session_start();
function connect()
{
    $db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "bilderdatenbank");
    if (! $db)
        die("Verbindungsfehler: " . mysqli_connect_error());
    setValue("cfg_db", $db);
}

function loginSelect($username)
{
    $SQLStatement = "SELECT bid, nickname, passwort FROM benutzer WHERE nickname='" . $username . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'bid' => $row['bid'],
                'nickname' => $row['nickname'],
                'passwort' => $row['passwort']
            ];
        }
        return $return;
    }
    return null;
}

function registryy($username, $email, $passwort)
{
    $SQLStatement = "INSERT INTO benutzer (nickname, email, passwort) VALUES ('" . $username . "', '" . $email . "', '" . $passwort . "')";
    getValue("cfg_db")->query($SQLStatement);
}

function registrycheck($username, $email)
{
    $SQLStatement = "SELECT bid, nickname, email, passwort FROM benutzer WHERE nickname='" . $username . "' OR email='" . $email . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'bid' => $row['bid'],
                'nickname' => $row['nickname'],
                'passwort' => $row['passwort']
            ];
        }
        
        return $return;
    }
    return null;
}

function getGaleries($bid)
{
    $SQLStatement = "SELECT gid, name, beschreibung FROM galerie WHERE bid='" . $bid . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    
    $galeries = array();
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'gid' => $row['gid'],
                'name' => $row['name'],
                'beschreibung' => $row['beschreibung']
            ];
            $count = $count + 1;
            $galeries[$count] = $return;
        }
        return $galeries;
    }
    return null;
}

function addGalerieDB($name, $beschreibung, $bid)
{
    $SQLStatement = "insert into galerie(name, beschreibung, bid) values ('" . $name . "', '" . $beschreibung . "', '" . $bid . "')";
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}

function getUserName($bid)
{
    $SQLStatement = "select nickname from benutzer where bid=" . $bid;
    
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'nickname' => $row['nickname']
            
            ];
        }
        
        return $return;
    }
    return null;
}

function addPicToDB($filename, $name, $beschreibung, $gid, $filePath)
{
   
    $galerie = getGalerie($gid);
    $benutzer = getUserName($_SESSION['sid']);
    foreach ($galerie as $ga) {
        $gname = $ga;
    }
    foreach($benutzer as $be){
        $nickname = $be;
    }

    $path = "../Benutzer/" . $nickname . "/" .$gname . "_" . $gid;
    
    $SQLStatement = "insert into picture(name, filename, bezeichnung, verzeichnis, gid) values ('" . $name . "', '" .$filename."', '" . $beschreibung . "', '".$path."', '" . $gid . "')";
    $result = getValue("cfg_db")->query($SQLStatement) == True;
    
    copy($filePath , $path."/".$filename);
    
}

function getGalerieID($name)
{
    $SQLStatement = "select gid, name from galerie where name='" . $name . "'";
    
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'gid' => $row['gid'],
                
                'name' => $row['name']
            
            ];
        }
        
        return $return;
    }
    return null;
}

function getUserdata($bid)
{
    $SQLStatement = "SELECT bid, nickname, email, passwort FROM benutzer WHERE bid='" . $bid . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'bid' => $row['bid'],
                'nickname' => $row['nickname'],
                'email' => $row['email'],
                'passwort' => $row['passwort']
            ];
        }
        
        return $return;
    }
    return null;
}

function getGalerie($gid)
{
    $SQLStatement = "SELECT gid, name FROM galerie WHERE gid='" . $gid . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'gid' => $row['gid'],
                'name' => $row['name']
            
            ];
        }
        
        return $return;
    }
    return null;
}

function getPictures($gid){
    $SQLStatement = "SELECT pid, name, filename, bezeichnung, verzeichnis, gid FROM picture WHERE gid=" . $gid;
    $result = getValue("cfg_db")->query($SQLStatement);
    
    $pictures = array();
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'pid' => $row['pid'],
                'name' => $row['name'],
                'filename' => $row['filename'],
                'bezeichnung' => $row['bezeichnung'],
                'verzeichnis' => $row['verzeichnis'],
                'gid' => $row['gid']
            ];
            $count = $count + 1;
            $pictures[$count] = $return;
        }
        return $pictures;
    }
    return null;
    
}
?>