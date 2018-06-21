<?php
require_once ("allGalerieData.php");
?>
<div class="col-md-12">
	<form name="galData" class="form-horizontal form-condensed"
		action="galerieData.php" method="post">

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="name">Name</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="name"
					value="<?php echo" " .$name. " ";?>" readonly />
			</div>
		</div>

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="bez">Bezeichnung</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="bez"
					value="<?php echo" " .$bes. " ";?>" required/>
			</div>
		</div>
		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="bez">Öffentlich</label>
			<div class="col-md-4">
				<input type="radio" name="isPublic" value="ja">Ja
					<input type="radio" name="isPublic" value="nein" checked>Nein
			
			</div>
		</div>



		<input type="text" class="form-control" id="text" name="gid"
			value="<?php echo" " .$gid. " ";?>" style="display: none;" />


		<div class="form-group control-group">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" class="btn btn-success" name="speichern"
					value="Speichern"> <input class="btn btn-success" type="submit"
					name="abbrechen" value="Abbrechen"
					formaction="index.php?id=picture&gid=<?php echo "".$gid."";?>" /> <input
					type="submit" class="btn btn-delete" name="delete" value="Löschen">

			</div>
		</div>




	</form>
</div>