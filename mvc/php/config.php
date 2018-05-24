<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her
 */
if( !isset($_SESSION['sid'])){
    // Funktionen
    setValue("cfg_func_list", array("login","registry"));
    // Inhalt des Menus
    setValue("cfg_menu_list", array("login"=>"Login","registry"=>"Registration"));
}else{
    setValue("cfg_func_list", array("logout", "galerie", "daten", "addGalerie", "picUpload"));
    // Inhalt des Menus
    setValue("cfg_menu_list", array("logout"=>"Logout", "galerie"=>"Galeries", "daten"=>"Meine Daten"));
}


// Datenbankverbindung herstellen
$db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "bilderdatenbank");
if (!$db) die("Verbindungsfehler: ".mysqli_connect_error());
setValue("cfg_db", $db);
?>
