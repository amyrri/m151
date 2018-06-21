<?php

/*
 * @autor Michael Abplanalp
 * @version Februar 2018
 * Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 * Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 * sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

function getAllGaleries()
{
    $SQLStatement = "SELECT gid, name, beschreibung FROM galerie WHERE isPublic=1";
    $result = getValue("cfg_db")->query($SQLStatement);
    
    $galeries = array();
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'gid' => $row['gid'],
                'name' => htmlspecialchars($row['name']),
                'beschreibung' => htmlspecialchars($row['beschreibung'])
            ];
            $count = $count + 1;
            $galeries[$count] = $return;
        }
        return $galeries;
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
                'name' => htmlspecialchars($row['name']),
                'beschreibung' => htmlspecialchars($row['beschreibung'])
            ];
            $count = $count + 1;
            $galeries[$count] = $return;
        }
        return $galeries;
    }
    return null;
}

function addGalerieDB($name, $beschreibung, $bid, $isP)
{
    $SQLStatement = "insert into galerie(name, beschreibung, bid, isPublic) values ('" . $name . "', '" . $beschreibung . "', " . $bid . ", ".$isP." )";
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}

function getUserName($bid)
{
    $SQLStatement = "select nickname from benutzer where bid=" . $bid;
    
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'nickname' => htmlspecialchars($row['nickname'])
            
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
    
    foreach ($benutzer as $be) {
        $nickname = $be;
    }
    
    $path = "../Benutzer/" . $benutzer['nickname'] . "/" . $galerie['name'] . "_" . $gid;
    $SQLStatement = "insert into picture(name, filename, bezeichnung, verzeichnis, gid) values ('" . $name . "', '" . $filename . "', '" . $beschreibung . "', '" . $path . "', '" . $gid . "')";
    $result = getValue("cfg_db")->query($SQLStatement) == True;
    
    copy($filePath, $path . "/" . $filename);
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
                'nickname' => htmlspecialchars($row['nickname']),
                'email' => htmlspecialchars($row['email']),
                'passwort' => htmlspecialchars($row['passwort'])
            ];
        }
        
        return $return;
    }
    return null;
}

function updateUserO($bid, $email){
    $SQLStatement = "UPDATE benutzer SET email='" . $email . "' WHERE bid= " . $bid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}
function updateUserW($bid, $email, $pw){
    $SQLStatement = "UPDATE benutzer SET email='" . $email . "', passwort='" . $pw . "' WHERE bid= " . $bid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}

function getGalerie($gid)
{
    $SQLStatement = "SELECT gid, name, beschreibung, isPublic FROM galerie WHERE gid='" . $gid . "'";
    $result = getValue("cfg_db")->query($SQLStatement);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'gid' => $row['gid'],
                'name' => $row['name'],
                'beschreibung' => $row['beschreibung'],
                'isPublic' => $row['isPublic']
            
            ];
        }
        
        return $return;
    }
    return null;
}

function getPictures($gid)
{
    $SQLStatement = "SELECT pid, name, filename, bezeichnung, verzeichnis, gid FROM picture WHERE gid=" . $gid;
    $result = getValue("cfg_db")->query($SQLStatement);
    
    $pictures = array();
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'pid' => $row['pid'],
                'name' => htmlspecialchars($row['name']),
                'filename' => $row['filename'],
                'bezeichnung' => htmlspecialchars($row['bezeichnung']),
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

function getPicture($pid)
{
    $SQLStatement = "SELECT pid, name, filename, bezeichnung, verzeichnis, gid FROM picture WHERE pid=" . $pid;
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $return = [
                'pid' => $row['pid'],
                'name' => htmlspecialchars($row['name']),
                'filename' => $row['filename'],
                'bezeichnung' => htmlspecialchars($row['bezeichnung']),
                'verzeichnis' => $row['verzeichnis'],
                'gid' => $row['gid']
            ];
        }
        return $return;
    }
    return null;
}

function updatePic($name, $bez, $pid)
{
    $SQLStatement = "UPDATE picture SET name='" . $name . "', bezeichnung='" . $bez . "' WHERE pid= " . $pid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}

function deletePic($pid)
{
    $SQLStatement = "DELETE FROM picture WHERE pid=" . $pid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;

}
function deleteGal($gid){
    $SQLStatement = "DELETE FROM galerie WHERE gid=" . $gid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
    
}
function deleteUser($bid){
    $SQLStatement = "DELETE FROM benutzer WHERE bid=" . $bid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
    
}
function updateGal($name, $bez, $gid, $isP)
{
    $SQLStatement = "UPDATE galerie SET name='" . $name . "', beschreibung='" . $bez . "', isPublic=".$isP." WHERE gid= " . $gid;
    $result = getValue("cfg_db")->query($SQLStatement) == True;
}

?>

























