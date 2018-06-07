<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();



$pid = $_GET['pid'];
$gid = $_GET['gid'];

$picture = getPicture($pid);

foreach ($picture as $pic) {
    $name = $pic['name'];
    $bez = $pic['bezeichnung'];
    $vez = $pic['verzeichnis'];
    $file = $pic['filename'];
    $pid2 = $pic['pid'];
    $gid2 = $pic['gid'];
}

?>