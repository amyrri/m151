
<div class="col-md-12">
	<form name="kontakt" class="form-horizontal form-condensed"
		action="addGalerie.php" method="post">

		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="name">Name</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="text" name="name"
					value="" required/>
			</div>
		</div>
		
		
		<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="comment">Beschreibung</label>
			<div class="col-md-4">
				<textarea name="comment" class="form-control" id="text" cols="40"
					rows="5" required></textarea>
			</div>
		</div>
		
				<div class="form-group control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="bez">Öffentlich</label>
			<div class="col-md-4">
				<input type="radio" name="isPublic" value="ja">Ja
					<input type="radio" name="isPublic" value="nein" checked>Nein
			
			</div>
		</div>
		
		
		<div class="form-group control-group">
			<div class="col-md-offset-4 col-md-4">
				<input class="btn btn-success" name="speichern" type="submit" value="Speichern" /> <input
					class="btn btn-success" name="abbrechen" type="submit" value="Abbrechen" formnovalidate/>
			</div>
		</div>
	</form>
</div>