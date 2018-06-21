<?php 
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

$users = getAllUsers();

foreach($users as $u){
    
    $name = $u['nickname'];
    $bid = $u['bid'];
   
    echo"<button class='btn btn-success' type='submit' formaction='index.php?id=adminUser&bid=" . $bid . "'><div>".$name."</div> </button>";
    
}



?>