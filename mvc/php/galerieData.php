<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$gid = $_POST['gid'];

if(isset($_POST['abbrechen'])){
    
    header('Location: index.php?id=picture&gid=' . $gid);
    
}else if (isset($_POST['delete'])){

    $user = getUserName($_SESSION['sid']);
    $gal = getGalerie($gid);
    
    $vez = "../Benutzer/" . $user['nickname'] . "/" . $gal['name'] . "_" . $gid;
    
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
}else if(isset($_POST['speichern'])){
    $newName = $_POST['name'];
    
    if ($_POST['name'] != null && $_POST['bez'] != null) {
        
        $bez = $_POST['bez'];
        updateGal($newName, $bez, $gid);
        header('Location: index.php?id=galerie');
    } else if ($_POST['bez'] == null) {
        
        $bez = "";
        updateGal($newName, $bez, $gid);
        header('Location: index.php?id=galerie');
    }

}


?>