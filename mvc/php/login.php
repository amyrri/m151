<?php
require ("basic_functions.php");
require ("db_functions.php");
connect();

$Loginvalues = loginSelect($_POST['nick']);

if ($Loginvalues != null) {
    
    $pw = $_POST['password'];
    
    
    if (password_verify($pw, $Loginvalues['passwort'])) {
        session_start();
        $_SESSION['sid'] = $Loginvalues['bid'];
        header('Location: index.php?id=galerie');
        exit();
    } else {
        header('Location: index.php?id=login');
    }
}

?>