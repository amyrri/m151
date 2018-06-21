<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$gid = $_POST['gid'];

if (isset($_POST['picUp'])) {
    header('Location: index.php?id=picUpload&gid=' . $gid);
}

?>