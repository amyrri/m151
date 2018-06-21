<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    if (isset($_POST['name'])) {
        $isP;
        
        if(isset($_POST['isPublic']) && $_POST['isPublic'] == "ja" ){
            $isP = 1;
        }else{
            $isP = 0;
        }
        addGalerieDB($_POST['name'], $_POST['comment'], $_SESSION['sid'], $isP);
        
        $gid = getGalerieID($_POST['name']);
        $bid = getUserName($_SESSION['sid']);
        
        header('Location: index.php?id=galerie');
        
        $path = "../Benutzer/" . $bid['nickname'] . "/" . $_POST['name'] . "_" . $gid['gid'];
        
        return mkdir($path);
    }
}

?>