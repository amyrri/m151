<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();



$pid = $_GET['pid'];
$gid = $_GET['gid'];

$picture = getPicture($pid);

foreach ($picture as $key=>$pic) {
    $name = $pic['name'];
    $bez = $pic['bezeichnung'];
    $vez = $pic['verzeichnis'];
    $file = $pic['filename'];
    $pid2 = $pic['pid'];
    $gid2 = $pic['gid'];
    
    $sizes = getimagesize($vez . "/" . $file);
    
    $width = $sizes[0];
    $height = $sizes[1];
    
    if($width >= $height){
        $width = "80%";
        $height = null;

    }else{
        $height = "800px";
        $width = null;
        
    }
    $_POST['index'] = $key;
    $_POST['pid'] = $pid2;

}

?>