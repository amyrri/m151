<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['delete'])) {
    $bid = $_POST['bid'];
    
    $userN = getUserName($bid);
    $gals = getGaleries($bid);
    
    if ($gals != null) {
        foreach ($gals as $g) {
            $gid = $g['gid'];
            $name = $g['name'];
            $vezGal = "../Benutzer/" . $userN['nickname'] . "/" . $name;
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
            rmdir($vez);
            deleteGal($gid);
        }
    }
    
    rmdir('../Benutzer/' . $userN['nickname']);
    deleteUser($bid);
    
    header('Location: index.php?id=admin');
} else {
    $bid = $_GET['bid'];
    $gals = getGaleries($bid);
    $user = getUserdata($bid);
    echo "<div>" . $user['nickname'] . "</div><div>" . $user['email'] . "</div>";
    if ($gals != null) {
        foreach ($gals as $g) {
            $name = $g['name'];
            $gid = $g['gid'];
            
            echo "<button class='btn btn-success' type='submit' formaction='index.php?id=adminGalerie&bid=" . $bid . "&gid=" . $gid . "'><div>" . $name . "</div> </button>";
        }
    }
}

?>