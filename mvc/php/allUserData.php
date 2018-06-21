<?php 
$data = getUserdata($_SESSION['sid']);

if ($data != null) {
    
    $bid = $data['bid'];
    $nickname = $data['nickname'];
    $email = $data['email'];
    $passwort = $data['passwort'];
    
    
    
}


?>