<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    if (isset($_POST['name'])) {
        if (! isset($_POST['comment'])) {
            addGalerieDB($_POST['name'], null, $_SESSION['sid']);
        } else {
            addGalerieDB($_POST['name'], $_POST['comment'], $_SESSION['sid']);
        }
        
        $gid = getGalerieID($_POST['name']);
        $bid = getUserName($_SESSION['sid']);
        
        header('Location: index.php?id=galerie');

            
            $path = "../Benutzer/" . $bid['nickname'] . "/" . $_POST['name'] . "_" . $gid['gid'];

        return mkdir($path);
    }
}

?>