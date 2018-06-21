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
            
            header('Location: index.php?id=onePicturePub&gid=' . $gid . '&pid=' . $pid . '&index=' . $index);
        } else if ($index > sizeof($picture)) {
            $index = 0;
            
            header('Location: index.php?id=publicPics&gid=' . $gid);
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
            
            header('Location: index.php?id=onePicturePub&gid=' . $gid . '&pid=' . $pid . '&index=' . $index);
        } else if ($index < 0) {
            $index = sizeof($picture);
        }
    }
} 

?>
