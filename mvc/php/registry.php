<?php
require ("basic_functions.php");
require ("db_functions.php");
connect();

$nick = $_POST['nick'];
$email = $_POST['email'];
$passwort1 = $_POST['password1'];
$passwort2 = $_POST['password2'];

$registrycheck = registrycheck($_POST['nick'], $_POST['email']);

if ($registrycheck == null) {
    if ($passwort1 === $passwort2) {
        $path = "../Benutzer/" . $nick;
        registryy($nick, $email, $passwort1);
        $Loginvalues = loginSelect($_POST['nick']);
        session_destroy();
        session_start();
        $_SESSION['sid'] = $Loginvalues['bid'];
        

        
        header("Location: index.php?id=galerie");
        return mkdir($path);
        exit();

    } else {
        echo "passwörter stimmen nicht überein";
    }
} else {
    echo "benutzer existiert bereits";
}

?>