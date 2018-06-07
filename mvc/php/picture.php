<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$pictures = getPictures($_GET['gid']);

if ($pictures == null) {
    echo "Keine Photos";
} else {
    
    foreach($pictures as $pic){
        
        $pid = $pic['pid'];
        
        $verzei = $pic['verzeichnis'];
        $filename = $pic['filename'];
        $name = $pic['name'];
        $bezeich = $pic['bezeichnung'];
        $gid = $pic['gid'];
    
  //      $resizedImage = resizeImage(100, 100, $verzei . "/" . $filename);
        
        echo"<button class='btn-pic' formaction='index.php?id=picData&gid=".$gid."&pid=".$pid."' type='submit' ><div class='picture '> <div class='piclabel '>".$name."</div><img class='pic' width='120' height='120' alt='".$name."' src='" .$verzei. "/" .$filename."'><div class='labelbez'>".$bezeich."</div></div></button>";
    }
}
/* 
function resizeImage($max_breite, $max_hoehe, $filePath)
{
    list($orig_breite, $orig_hoehe) = getimagesize($filePath);
    
    //var_dump(list($orig_breite, $orig_hoehe)= getimagesize($filePath));
    
    $breite = $orig_breite;
    $hoehe = $orig_hoehe;
    
    # taller
    if ($hoehe > $max_hoehe) {
        $breite = ($max_hoehe / $hoehe) * $breite;
        $hoehe = $max_hoehe;
    }
    
    # wider
    if ($breite > $max_breite) {
        $hoehe = ($max_breite / $breite) * $hoehe;
        $breite = $max_breite;
    }
    
    $image_p = imagecreatetruecolor($breite, $hoehe);
    
    $image = imagecreatefromjpeg($filePath);
    
    imagecopyresampled($image_p, $image, 0, 0, 0, 0,
        $breite, $hoehe, $orig_breite, $orig_hoehe);
    
    return $image_p;
} */
?>
