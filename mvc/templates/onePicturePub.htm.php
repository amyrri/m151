<?php
require_once ("AllData.php");

?>


<form name="picUpload"
<?php echo "action='onePicturePub.php?index=". $_GET['index']."&gid=".$_GET['gid']."&pid=".$_GET['pid']."'";?> method="post">
	

	<label class="lblOnePic"><?php echo $name; ?></label>

	<p class="picarrow" style="height:<?php echo $heightOne; ?>">
		<button class="bigPic" name="links">
			<img alt="left" src="../images/arrow_left.png" width="80px">

		</button>
		
		<?php echo" <img class='bigPic' width='".$width."' height='".$height."' alt='" .$name. "' src='" .$vez. "/" .$file."'> "; ?>
		<button class="bigPic" name="rechts">
			<img alt="right" src="../images/arrow_right.png" width="80px">

		</button>

	</p>
	<label class="lblOnePicbez"><?php echo $bez; ?></label>
</form>