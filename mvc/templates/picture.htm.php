
<form name="pics" action="redirect.php" method="post">

	<input type="hidden" name="gid" value="<?php echo $_GET['gid']; ?>">
	<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>">

	<button class="btn btn-success btnplus" name="picUp" type="submit">
		<img alt="Add" src="../images/add.png" width="20p" height="20p">
	</button>
	
	<button class="btn btn-delete" name="galerieDel" type="submit">
		<img alt="delete" src="../images/delete.png" width="20p" height="20p">
	</button>
		<button class="btn btn-edit" name="editGal" type="submit">
		<img alt="edit" src="../images/edit.png" width="20p" height="20p">
	</button>



	<div class="allPics">
<?php
$gid = $_GET['gid'];
$_GET['gid'] = $gid;
require_once ("picture.php");
?>
</div>

</form>