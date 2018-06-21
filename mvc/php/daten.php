<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['abbrechen'])) {
    header('Location: index.php?id=galerie');
} else if (isset($_POST['speichern'])) {
    $data = getUserdata($_SESSION['sid']);
    $bid = $data['bid'];
    $email = $_POST['email'];
    if(isset($_POST['password1']) && isset($_POST['password2'])){
        $pw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
        $pw2 = password_hash($_POST['password2'], PASSWORD_DEFAULT);
        updateUserW($bid, $email, $pw);
    }else{
        updateUserO($bid, $email);
    }

    header('Location: index.php?id=daten');
}else if(isset($_POST['delete'])){
    
    $bid = $_SESSION['sid'];
    $gal = getGaleries($bid);
    $userN = getUserName($bid);

    
    foreach($gal as $g){
        $gid = $g['gid'];
        $name = $g['name'];
        $vezGal = "../Benutzer/".$userN['nickname']."/".$name;
        $pics = getPictures($gid);
        foreach($pics as $p){
            $pid = $p['pid'];
            $name = $p['filename'];
            $vez = $p['verzeichnis'];
            
            $ort = $vez . '/' . $name;
            unlink($ort);
            deletePic($pid);
        }
        rmdir($vez);
        deleteGal($gid);
    }
    

    rmdir('../Benutzer/'.$userN['nickname']);
    deleteUser($bid);
    
    header('Location: index.php');
    
}

?>