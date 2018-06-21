<?php
require_once ("allUserData.php");
?>
<div class="col-md-12">
	<form name="kontakt" class="form-horizontal form-condensed"
		action="daten.php" method="post">

		<div class="lblAllData">

			<div class="lblDateAll lblDate">
				<label class="lblData onlylbl" for="lblnick">Nickname: </label> <label
					class="lblData onlylbl" for="email">E-Mail: </label> <label class="lblData onlylbl"
					for="email">Passwort: </label> <label class="lblData onlylbl" for="email">Passwortwiederholung:
				</label>

			</div>

			<div class="lblDate">

				<div class="onlylbl">
					<input type="text" class="form-control" id="text" name="nick"
						value="<?php echo"" .$nickname. "";?>" readonly/>
				</div>
				<div class="onlylbl">
					<input type="email" class="form-control" id="email" name="email"
						value="<?php echo"" .$email. "";?>" />
				</div>
				<div class="onlylbl">
					<input type="password" class="form-control" id="password1"
						name="password1" />
						<!-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$!%*?&]{8,}" -->
				</div>
				<div class="onlylbl">
					<input type="password" class="form-control" id="password2"
						name="password2" />
						<!-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$!%*?&]{8,}" -->
				</div>

			</div>

			<div class="form-group control-group">
				<div class="col-md-offset-4 col-md-4">
					<input type="submit" class="btn btn-success" name="speichern"
						id="speichern" value="Speichern"> <input type="submit"
						class="btn btn-success" name="abbrechen" id="abbrechen"
						value="Abbrechen"><input type="submit"
						class="btn btn-delete" name="delete" id="delete"
						value="Löschen">
				</div>
			</div>
		</div>

	</form>
</div>




