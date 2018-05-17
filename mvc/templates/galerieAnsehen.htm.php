<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
connect();
?>

<form action="picUpload.php" method="post" enctype="multipart/form-data"> 
	<input type="file" name="uploadBild">
	<input type="submit" name="speichern" value="Speichern">
</form>