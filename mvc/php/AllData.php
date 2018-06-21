<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();



$pid = $_GET['pid'];
$gid = $_GET['gid'];

$pic = getPicture($pid);

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
        $width = "500px";
        $height = null;
        $widthPD = '200px';
        $heightPD = null;
        $heightOne = "300px";

    }else{
        $height = "500px";
        $width = null;
        $heightPD = '200px';
        $widthPD = null;
        $heightOne = "500px";
        
    }
    //$_POST['index'] = $key;
    $_POST['pid'] = $pid2;




?>