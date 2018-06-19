
<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$galeries = getGaleries($_SESSION['sid']);

if ($galeries != null) {
    
    foreach ($galeries as $galerie) {
        $pictures = getPictures($galerie['gid']);
        $gid = $galerie['gid'];
        $name = $galerie['name'];
        $beschreibung = $galerie['beschreibung'];
        
        if ($pictures == null) {
            echo "<button class='btn-pic-gal' formaction='index.php?id=picture&gid=" . $gid . "' type='submit' > <div class='piclabel '>" . $name . "</div><p class='picimg'><img class='pic' width='100px' alt='default' src='../images/default.png'></p><div class='labelbez'>" . $beschreibung . "</div></button>";
        } else {
            foreach ($pictures as $pic) {
                $pid = $pic['pid'];
                $fverzei = $pic['verzeichnis'];
                $filename = $pic['filename'];
                $fname = $pic['name'];
                $fbezeich = $pic['bezeichnung'];
                
                $_GET['pid'] = $pid;
                
                $sizes = getimagesize($fverzei . "/" . $filename);
                
                $width = $sizes[0];
                $height = $sizes[1];
                
                if ($width >= $height) {
                    $width = "100px";
                    
                    echo "<button class='btn-pic-gal' formaction='index.php?id=picture&gid=" . $gid . "&pid=".$pid."' type='submit' > <div class='piclabel '>" . $name . "</div><p class='picimg'><img class='pic' width='" . $width . "' alt='" . $fname . "' src='" . $fverzei . "/" . $filename . "'></p><div class='labelbez'>" . $beschreibung . "</div></button>";
                } else {
                    $height = "100px";
                    echo "<button class='btn-pic-gal' formaction='index.php?id=picture&gid=" . $gid . "&pid=".$pid."' type='submit' > <div class='piclabel '>" . $name . "</div><p class='picimg'><img class='pic' height='" . $height . "' alt='" . $fname . "' src='" . $fverzei . "/" . $filename . "'></p><div class='labelbez'>" . $beschreibung . "</div></button>";
                }
                break;
            }
        }
    }
} else {
    
    echo "Keine Galerien";
}

?>