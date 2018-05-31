<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$pictures = getPictures($_GET['gid']);

if ($pictures == null) {
    echo "Keine Photos";
} else {
    
    foreach($pictures as $pic){
        
        $verzei = $pic['verzeichnis'];
        $filename = $pic['filename'];
        $name = $pic['name'];
        $bezeich = $pic['bezeichnung'];
    
        echo"<button class='btn-pic' type='submit' ><div class='picture '> <div class='piclabel '>".$name."</div><img class='pic' alt='".$name."' src='" .$verzei. "/" .$filename."' width='180p' height='180p'><div class='labelbez'>".$bezeich."</div></div></button>";
    }
}

?>