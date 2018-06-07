
<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$pid = $_POST['pid'];
$gid = $_POST['gid'];

$picture = getPicture($pid);

foreach ($picture as $pic) {
    $name = $pic['name'];
    $bez = $pic['bezeichnung'];
    
    if (isset($_POST['speichern'])) {
        $newName = $_POST['name'];
        
        if ($_POST['name'] != null && $_POST['bez'] != null) {
            
            $bez = $_POST['bez'];
            updatePic($newName, $bez, $pid);
            header('Location: index.php?id=picture&gid=' . $gid);
        } else if ($_POST['bez'] == null) {
            
            $bez = "";
            updatePic($newName, $bez, $pid);
            // header('Location: index.php?id=picture&gid='.$gid);
        }
    } else if (isset($_POST['delete'])) {
        deletePic($pid);
    }
}

?>