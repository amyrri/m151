<div class="col-md-12">
	<form name="kontakt" class="form-horizontal form-condensed"
		action="registry.php" method="post">

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="email">E-Mail</label>
			<div class="col-md-4">
				<input type="email" class="form-control" id="email" name="email"
					value="" required/>
			</div>

		</div>
		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="nickname">Nickname</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="nick"
					value="" required/>
			</div>
		</div>

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="password">Passwort</label>
			<div class="col-md-4">
				<input type="password" class="form-control" id="password"
					name="password1" value="" required/>
 					<!-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$!%*?&]{8,}" -->
			</div>
		</div>
		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="password">Passwort
				Repeat</label>
			<div class="col-md-4">
				<input type="password" class="form-control" id="password"
					name="password2" value="" required/>
					<!--pattern= "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$!%*?&]{8,}" -->
			</div>
		</div>

		<div class="form-group control-group">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" class="btn btn-success" name="registry"
					value="Registry" id="registry">
			</div>
		</div>

	</form>
</div>
