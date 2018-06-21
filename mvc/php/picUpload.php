<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    $gid = $_POST['gid'];
    $gal = getGalerie($gid);
    $user = getUserName($_SESSION['sid']);
    
    foreach ($_FILES as $file) {
        $filename = $file['name'];
        $name = $_POST['name'];
        $besch = $_POST['besch'];
        $type = $file['type'];
        $size = $file['size'];
        
        $filePath = realpath($_FILES["uploadBild"]["tmp_name"]);

        addPicToDB($filename, $name, $besch, $gid, $filePath);
        
        header('Location: index.php?id=picture&gid=' . $gid);
    }
}

?>