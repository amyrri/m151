<form name="adminUser" action="adminUser.php" method="post">

	<button class="btn-pic-delete" name="delete" type="submit">
		<img alt="Delete" src="../images/delete.png" width="20px" height="20px">

	</button>
	
	

<?php
require_once("adminUser.php");
?>


	<input type="hidden" name="bid" value="<?php echo $_GET['bid']; ?>">
</form>