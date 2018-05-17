<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
session_start();
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
        header('Location: index.php?id=galerie');
    }
}

?>