<?php
require ("basic_functions.php");
require ("db_functions.php");
connect();

$Loginvalues = loginSelect($_POST['nick']);

if ($Loginvalues != null) {
    
    if ($_POST['password'] != $Loginvalues['passwort']) {
        
        header('Location: index.php?id=login');
    } else {
        session_start();
        $_SESSION['sid'] = $Loginvalues['bid'];
        header('Location: index.php?id=galerie');
        exit();
        echo "richtig";
    }
} else {
    header('Location: index.php?id=login');
}

?>