<?php
require ("basic_functions.php");
require ("db_functions.php");
connect();

if (isset($_POST['rechts'])) {
    $index = $_GET['index'];
    $gid = $_GET['gid'];
    $index = $index + 1;
    
    $picture = getPictures($gid);
    
    foreach ($picture as $key => $pic) {
        if ($key == $index) {
            $pid = $pic['pid'];
            $name = $pic['name'];
            $file = $pic['filename'];
            $verz = $pic['verzeichnis'];
            $bez = $pic['bezeichnung'];
            $gid = $pic['gid'];
            
            header('Location: index.php?id=onePicture&gid=' . $gid . '&pid=' . $pid . '&index=' . $index);
        } else if ($index > sizeof($picture)) {
            $index = 0;
            
            header('Location: index.php?id=picture&gid=' . $gid);
        }
    }
} else if (isset($_POST['links'])) {
    $index = $_GET['index'];
    $gid = $_GET['gid'];
    $index = $index - 1;
    
    $picture = getPictures($gid);
    
    foreach ($picture as $key => $pic) {
        if ($key == $index) {
            $pid = $pic['pid'];
            $name = $pic['name'];
            $file = $pic['filename'];
            $verz = $pic['verzeichnis'];
            $bez = $pic['bezeichnung'];
            $gid = $pic['gid'];
            
            header('Location: index.php?id=onePicture&gid=' . $gid . '&pid=' . $pid . '&index=' . $index);
        } else if ($index < 0) {
            $index = sizeof($picture);
        }
    }
} else if (isset($_POST['delete'])) {
    
    $pid = $_GET['pid'];
    $gid = $_GET['gid'];
    
    $delete = 0;
    
    $pic = getPicture($pid);
    $pics = getPictures($gid);
    
    $ort1 = $pic['verzeichnis'] .'/'. $pic['filename'];
    
    
    foreach ($pics as $p) {
        $name = $p['filename'];
        $vez = $p['verzeichnis'];
        
        $ort2 = $vez .'/'. $name;
        if($ort1 == $ort2){
            $delete =+ 1;
        }
    }
    if($delete == 1){
        unlink($ort1);
    }
     deletePic($pid);
    
     header('Location: index.php?id=picture&gid='.$gid);
}


else if (isset($_POST['edit'])) {
    
    $pid = $_GET['pid'];
    $gid = $_GET['gid'];
    header('Location: index.php?id=picData&pid=' . $pid . '&gid=' . $gid);
}

?>
