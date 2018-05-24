<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    $galerie = $_POST['gid'];
    var_dump($_POST);
    
    foreach ($_FILES as $file) {
        $name = $file['name'];
        $besch = $_POST['besch'];
        $size = $file['size'];
        
        if (($size > 4194304)) {
            $_POST['name2'] = $name;
            $_POST['besch2'] = $besch;
             header('Location: index.php?id=picUpload&gid=' . $galerie);
        } else {
            // $message = 'File not too large. File is less than 4 megabytes.';
            echo '<script type="text/javascript">alert("' . $message . '");</script>';
            // header('Location: index.php?id=picUpload&gid=' . $galerie);
            addPicToDB($name, $beschreibung, $galerie);
        }
        
        $sizeByte = $file['size'] / 1024;
        $sizeByte = $sizeByte / 1024;
    }
}

?>