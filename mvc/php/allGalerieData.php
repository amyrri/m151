<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$gid = $_GET['gid'];
$gal = getGalerie($gid);

$name = $gal['name'];
$bes = $gal['beschreibung'];





?>