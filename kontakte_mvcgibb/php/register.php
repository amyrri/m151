<?php
$email =$_POST['email'];
$pswd1 = $_POST['pswd1'];
$pswd2 = $_POST['pswd2'];

function checkPSWD(){
if ($pswd1 == $pswd2){
$password = $pswd1;
} else {
echo ""
}
}

?>
