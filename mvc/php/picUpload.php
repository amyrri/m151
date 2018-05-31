<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    $galerie = $_POST['gid'];
    

    
    foreach ($_FILES as $file) {
        $filename = $file['name'];
        $name = $_POST['name'];
        $besch = $_POST['besch'];
        $type = $file['type'];
        $size = $file['size'];
        
        if (($size > 4194304)) {

            header('Location: index.php?id=picUpload&gid=' . $galerie);
        } else {
            $filePath = realpath($_FILES["uploadBild"]["tmp_name"]);
            addPicToDB($filename, $name, $besch, $galerie, $filePath);



             header('Location: index.php?id=picture&gid=' . $galerie);
        }
        
        // $sizeByte = ($file['size'] / 1024)/ 1024; //grösse vom File in MB
    }
}

?>