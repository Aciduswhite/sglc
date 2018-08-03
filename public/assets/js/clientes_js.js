 $(document).ready(function(){
    $('.check_mail').click(function(){
    	//obtenemos el valor actual
    	var valor =$(this).parents('tr').data('valor')
    	//realizamos el cambio de valor
    	if (valor==1) {
    		valor=0;
    	}else{
    		valor=1;
    	}
    	//obtenemos el id del cliente
    	var id = $(this).parents('tr').data('id');
    	// mandamos a llamar a la url
        window.location='pago_automatico/' + id +'/'+valor;
    });
});