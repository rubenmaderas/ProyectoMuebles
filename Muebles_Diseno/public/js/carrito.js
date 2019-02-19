$(document).ready(function() {
	$(document).on('click', "[id*='addcarrito']", function() {
		event.preventDefault();
		id = $(this).attr('id').split('-')[1];
		url = '/Muebles_Diseno/public/index.php/carrito/index/' + id; //Modificar
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(datos) {
				$('#numero').text(datos.cuantos);
			}
		});
	});
});
