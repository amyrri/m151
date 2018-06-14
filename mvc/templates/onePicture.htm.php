<?php
require_once ("AllData.php");

?>


<form name="picUpload"
<?php echo "action='onePicture.php?index=". $_GET['index']."&gid=".$_GET['gid']."&pid=".$_GET['pid']."'";?> method="post">
	<button name="delete" type="submit">
		<img alt="Delete" src="../delete.png">

	</button>
	<label class="lblOnePic"><?php echo $name; ?></label>

	<div>
		<button class="bigPic" name="links">
			<img alt="left" src="../images/arrow_left.png" width="80px">

		</button>
		
		<?php echo" <img class='bigPic' width='".$width."' height='".$height."' alt='" .$name. "' src='" .$vez. "/" .$file."'> "; ?>
		<button class="bigPic" name="rechts">
			<img alt="right" src="../images/arrow_right.png" width="80px">

		</button>

	</div>
	<label class="lblOnePic"><?php echo $bez; ?></label>
</form>
