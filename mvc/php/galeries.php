<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$galeries = getGaleries($_SESSION['sid']);



if ($galeries != null) {

    foreach ($galeries as $galerie) {
        
        $gid = $galerie['gid'];
        $name = $galerie['name'];
        $beschreibung = $galerie['beschreibung'];
      

        echo "<div class='control-label col-md-offset-2 col-md-2'><a href='?id=picUpload&gid=". $gid ."'>" . $name . "</a></div>";
        
    }
} else {
    
    echo "Keine Galerien";
}

?>