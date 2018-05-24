<?php
require_once ("basic_functions.php");
require_once ("db_functions.php");
require_once ("picUpload.php");
connect();

if(isset($_POST['besch2'])){
    $name2 = $_POST['name2'];
    $besch2 = $_PST['besch2'];
    
}

?>
<div class="col-md-12">
	<form action="picUpload.php" method="post"
		enctype="multipart/form-data">

		<div class="form-group control-group col-md-offset-4 ">
			<input class="btn" type="file" name="uploadBild" required>

		</div>
		<div class="control-group">
			<label class="control-label col-md-offset-2 col-md-2" for="besch">Beschreibgung: </label>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" id="text" name="besch"
					value="" required/>
			</div>
		</div>

		<div class="form-group control-group col-md-offset-4 col-md-4">
			<input class="btn btn-success" type="submit" name="speichern"
				value="Speichern"> 
				<input class="btn btn-success" type="submit"
				name="abbrechen" value="Abbrechen"> <input type="hidden" name="gid"
				value="<?php echo $_GET['gid']?>">
		</div>



	</form>
</div>