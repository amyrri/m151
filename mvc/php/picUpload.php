<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    $galerie = $_POST['gid'];
    var_dump($galerie);
    
    foreach ($_FILES as $file) {
        $filename = $file['name'];
        $name = $_POST['name'];
        $besch = $_POST['besch'];
        $type = $file['type'];
        $size = $file['size'];
        var_dump($type);
        if (($size > 4194304)) {
            $msg = " Zu gross";
            echo "<script type='text/javascript'>alert('.$msg.');</script>";
            header('Location: index.php?id=picUpload&gid=' . $galerie);
        } else if ($type != "image/jpeg" && $type != "image/png") {
            
            $msg = "falscher Datentyp";
            echo "<script type='text/javascript'>alert('.$msg.');</script>";
        } else {
            $filePath = realpath($_FILES["uploadBild"]["tmp_name"]);
            addPicToDB($filename, $name, $besch, $galerie, $filePath);
            
            header('Location: index.php?id=picture&gid=' . $galerie);
        }
        
        // $sizeByte = ($file['size'] / 1024)/ 1024; //gr�sse vom File in MB
    }
}

?>