
<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$galeries = getGaleries($_SESSION['sid']);


if ($galeries != null) {
    
    foreach ($galeries as $galerie) {
      //  $pictures = getPictures($_GET['gid']);
        $gid = $galerie['gid'];
        $name = $galerie['name'];
        $beschreibung = $galerie['beschreibung'];
        
/*         if ($pictures == null) {
            echo "<div> <img alt='Add' src='../images/default.png' width='100px' height='100px'>";
        } */
        echo "<p class='galerielabel'><a href='?id=picture&gid=" . $gid . "'> " . $name . "</a></p>";
    }
} else {
    
    echo "Keine Galerien";
}

?>