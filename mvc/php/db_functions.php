<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2018
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */

function connect(){
    $db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "bilderdatenbank");
    if (!$db) die("Verbindungsfehler: ".mysqli_connect_error());
    setValue("cfg_db", $db);
}

function loginSelect($username){
   $SQLStatement = "SELECT bid, nickname, passwort FROM benutzer WHERE nickname='". $username."'";
   $result = getValue("cfg_db")->query($SQLStatement);
   
   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $return = ['bid' => $row['bid'], 'nickname' => $row['nickname'], 'passwort' => $row['passwort']];
       }
       return $return;
   }
   return null;
}

function registryy($username, $email, $passwort){
    $SQLStatement = "INSERT INTO benutzer (nickname, email, passwort) VALUES ('".$username."', '".$email."', '".$passwort."')";
    getValue("cfg_db")->query($SQLStatement);
    
    
}
function registrycheck($username, $email){
    $SQLStatement = "SELECT bid, nickname, email, passwort FROM benutzer WHERE nickname='". $username."' OR email='".$email."'";
    $result = getValue("cfg_db")->query($SQLStatement);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $return = ['bid' => $row['bid'], 'nickname' => $row['nickname'], 'passwort' => $row['passwort']];
        }
        return $return;
    }
    return null;
}
?>