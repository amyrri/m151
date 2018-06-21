<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$gid = $_POST['gid'];
if (isset($_POST['galerieDel'])) {
    

    $user = getUserName($_SESSION['sid']);
    $gal = getGalerie($gid);
    
    $vez = "../Benutzer/" . $user['nickname'] . "/" . $gal['name'] . "_" . $gid;
    var_dump($vez);
    
    $pics = getPictures($gid);

    if ($pics != null) {
        foreach ($pics as $p) {
            $pid = $p['pid'];
            $name = $p['filename'];
            $vez = $p['verzeichnis'];
            
            $ort = $vez . '/' . $name;
            unlink($ort);
            deletePic($pid);
        }
    }
    deleteGal($gid);
    rmdir($vez);
    
    header('Location: index.php?id=galerie');

}else if (isset($_POST['picUp'])) {
    header('Location: index.php?id=picUpload&gid=' . $gid);
}else if (isset($_POST['editGal'])){
    header('Location: index.php?id=galerieData&gid=' . $gid);
}
