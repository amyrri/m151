<form name="picUpload"
	action="picture.php?pid=<?php echo $pid; ?>&gid=<?php echo $_GET['gid']; ?>"
	method="post">

	<div class="form-group control-group">
		<button class="btn btn-success btnplus" type="submit" name="add">
			<img alt="Add" src="../images/add.png" width="20p" height="20p">
		</button>




	</div>
	<div class="allPics">
<?php
require_once ("picture.php");
?>
</div>

</form>