<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if(isset($_POST['delete'])){
    $bid = $_POST['bid'];
    $gid = $_POST['gid'];
    
    $user = getUserName($bid);
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
    
    header('Location: index.php?id=adminUser&bid='.$bid);
}else{
    
    $gid = $_GET['gid'];
    $bid = $_GET['bid'];
    
    $gal = getGalerie($gid);
    $pics = getPictures($gid);
    
    echo "<div>" . $gal['name'] . "</div><div>" . $gal['beschreibung'] . "</div>";
    
/*     if ($pics != null) {
        foreach ($pics as $p) {
            $name = $p['name'];
            $pid = $p['pid'];
            
            echo "<button class='btn btn-success' type='submit' formaction='index.php?id=admin&bid=" . $bid . "&gid=".$gid."'><div>" . $name . "</div> </button>";
        }
    } */
    
}



?>