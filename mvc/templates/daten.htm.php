<?php
require_once ("daten.php");
?>
<div class="col-md-12">
	<form name="kontakt" class="form-horizontal form-condensed"
		action="daten.php" method="post">


		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-data	"
				for="lblnick">Nickname: </label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="nick"
					value="<?php echo" " .$nickname. " ";?>" />
			</div>
		</div>

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-data" for="email">E-Mail:
			</label>
			<div class="col-md-4">
				<input type="email" class="form-control" id="email" name="email"
					value="<?php echo" " .$email. " ";?>" />
			</div>
		</div>

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-data" for="email">Passwort:
			</label>
			<div class="col-md-4">
				<input type="password" class="form-control" id="password"
					name="password1" value="<?php echo" " .$passwort. " ";?>" />
			</div>
		</div>
		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-data" for="email">Passwortwiederholung:
			</label>
			<div class="col-md-4">
				<input type="password" class="form-control" id="password"
					name="password2" value="<?php echo" " .$passwort. " ";?>" />
			</div>
		</div>

		<div class="form-group control-group">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" class="btn btn-success" name="speichern"
					id="speichern" value="Speichern">

				<input type="submit" class="btn btn-success" name="abbrechen"
					id="abbrechen" value="Abbrechen">
			</div>
		</div>

	</form>
</div>




