<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$gid = $_POST['gid'];

if (isset($_POST['picUp'])) {
    header('Location: index.php?id=picUpload&gid=' . $gid);
} else if (isset($_POST['galerieDel'])) {
    
    $pics = getPictures($gid);
    if ($pics != null) {
        foreach ($pics as $p) {
            $pi = $p['pid'];
            deletePic($pi);
        }
    }
    deleteGal($gid);
    header('Location: index.php?id=galerie');
}else if(isset($_POST['editGal'])){
    
    
    
}

?>