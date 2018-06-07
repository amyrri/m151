<form name="picUpload" class="form-horizontal form-condensed"
	action="index.php?id=picUpload&gid=<?php $gid = $_GET['gid']; echo $gid; ?>"
	method="post">

	<div class="form-group control-group">
		<button class="btn btn-success btnplus" type="submit">
			<img alt="Add" src="../images/add.png" width="20p" height="20p">
		</button>



<?php
require_once ("picture.php");
?>
</div>

</form>