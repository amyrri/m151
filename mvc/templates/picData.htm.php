<?php
require_once ("AllData.php");
?>

<img class="pic-big form-group" alt="Picture"
<?php echo"src='".$vez."/".$file."' width='".$width."' height='".$height."'"; ?>
>

<div class="col-md-12">
	<form name="picData" class="form-horizontal form-condensed"
		action="picData.php" method="post">

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="name">Name</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="name"
					value="<?php echo" " .$name. " ";?>" required />
			</div>
		</div>

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="bez">Bezeichnung</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="bez"
					value="<?php echo" " .$bez. " ";?>" />
			</div>
		</div>



		<input type="text" class="form-control" id="text" name="pid"
			value="<?php echo" " .$pid2. " ";?>" style="display: none;" /> <input
			type="text" class="form-control" id="text" name="gid"
			value="<?php echo" " .$gid2. " ";?>" style="display: none;" />


		<div class="form-group control-group">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" class="btn btn-success" name="speichern"
					value="Speichern"> <input class="btn btn-success" type="submit"
					name="abbrechen" value="Abbrechen"
					formaction="index.php?id=picture&gid=<?php var_dump($gid); echo "".$gid."";?>" />
				<input type="submit" class="btn btn-delete" name="delete"
					value="Löschen">
				</inpu>
			</div>
		</div>




	</form>
</div>