<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();

if (isset($_POST['nickname'])) {
    
    if ($_POST['abbrechen'] === 'abbrechen')
        $nicknameIP = $_POST['nickname'];
    $emailIP = $_POST['email'];
    $passwort1IP = $_POST['password1'];
    $passwort2IP = $_POST['password2'];
}
$data = getUserdata($_SESSION['sid']);

if ($data != null) {
    
    $bid = $data['bid'];
    $nickname = $data['nickname'];
    $email = $data['email'];
    $passwort = $data['passwort'];
    
    // echo "<div class='control-label col-md-offset-2 col-md-2'>" . $email . "</div>";
} else {
    
    echo "Keine Fehler";
}

?>