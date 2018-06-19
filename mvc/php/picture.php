<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();
if (! isset($_POST['add'])) {
    $pictures = getPictures($_GET['gid']);
    $index = 1;
    
    if ($pictures == null) {
        echo "Keine Photos";
    } else {
        
        foreach ($pictures as $key => $pic) {
            
            $pid = $pic['pid'];
            
            $verzei = $pic['verzeichnis'];
            $filename = $pic['filename'];
            $name = $pic['name'];
            $bezeich = $pic['bezeichnung'];
            $gid = $pic['gid'];
            
            $sizes = getimagesize($verzei . "/" . $filename);
            
            $width = $sizes[0];
            $height = $sizes[1];
            
            $index = $key;
            
            if ($width >= $height) {
                $width = "100px";
                echo "<button class='btn-pic' formaction='index.php?id=onePicture&gid=" . $gid . "&pid=" . $pid . "&index=" . $index . "' type='submit' > <div class='piclabel '>" . $name . "</div><p class='picimg'><img class='pic' width='" . $width . "' alt='" . $name . "' src='" . $verzei . "/" . $filename . "'></p></button>";
            } else {
                $height = "100px";
                echo "<button class='btn-pic' formaction='index.php?id=onePicture&gid=" . $gid . "&pid=" . $pid . "&index=" . $index . "' type='submit' > <div class='piclabel '>" . $name . "</div><p class='picimg'><img class='pic' height='" . $height . "' alt='" . $name . "' src='" . $verzei . "/" . $filename . "'></p></div></button>";
            }
        }
    }
} else {
    header('Location: index.php?id=picUpload');
}
