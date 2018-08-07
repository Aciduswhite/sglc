var campo_id = document.getElementById("id_campo").value;
function nuevo_campo(){
	var campo =	"<div id='"+campo_id+"'><br><p class='text-center'>Campo Numero : "+campo_id+"</p>"+
	"<div class='form-group col-md-4'>"+
	"<label for='"+campo_id+"[]' class=''>Nombre:*</label>"+
	"<div class='controls'>"+
	"<input type='text' name='"+campo_id+"[]' required class='form-control'>"+
	"</div></div>"+
	"<div class='form-group col-md-4'>"+
	"<label for='"+campo_id+"[]' class=''>Valor de referencia :*</label>"+
	"<div class='controls'>"+
	"<input type='text' name='"+campo_id+"[]'  class='form-control'>"+
	"</div></div>"+
	"<div class='form-group col-md-4'>"+
	"<label for='"+campo_id+"[]' class=''>Unidad:*</label>"+
	"<div class='controls'>"+
	"<input type='text' name='"+campo_id+"[]'  class='form-control'>"+
	"</div></div></div>"
	$("#campos").append(campo);
	campo_id++;
}

$(document).on('click', '.borrar', function (event) { 
	if (campo_id == 1){

	}else{	var campoactual = campo_id-1;
	$("#"+campoactual).remove();
	campo_id--;}

	});



