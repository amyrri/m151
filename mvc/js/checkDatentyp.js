
function checkTyp(file){

	var s = (file.files[0].size/1024)/1024;;
	
	var f = file.value.toLowerCase();
	if(!f.endsWith("jpg")){
		var x = document.getElementById("uploadPic");
		x.style.color = "red";

		alert("Falscher Datentyp!");
	}else{
		var x = document.getElementById("uploadPic");
		x.style.color = "green";
		if(s > 4){
			alert("Bild ist zu gross!");
		}		
	}
		

}