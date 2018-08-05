function llenar(){
    var select = document.getElementById("Estudio");
    var fila  = "<tr id="+select.value+"  ><th>"+select.options[select.value-1].innerHTML+
    "</th><th class='costos'>"+select.options[select.value-1].id
    +"</th><th><input type='button'  value='Eliminar Estudio' class='btn btn-xs btn-danger pull-left right15 borrar' ></th>"+
    "<input type='hidden' name='estudio[]' value="+select.value+"></tr>";
    $('.datos').append(fila);
    this.sumar();
}

$(document).on('click', '.borrar', function (event) { 
    fila = $(this).closest('tr')
    event.preventDefault();
    fila.remove();
    sumar();
});
function sumar(){
    var resultado = 0
    $('.costos').each(function(element){
        resultado += parseInt(this.innerHTML)
        document.getElementById("resultado").innerHTML = resultado
    });
}