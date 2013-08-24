function cargar_historial(id) {
	var url = "http://localhost/sistema/facturas/responsable/cargar_historial";
	$("#tabla_historial").html('');
	$.ajax({
				url: url,				
				data: {id:id},
				type: "POST",
				success: function (data) {
					$("#tabla_historial").html(data);
				}
			});
}

function cargar_recorrido(id) {
	var url = "http://localhost/sistema/facturas/carga/recorrido";
	$("#tabla_historial").html('');
	$.ajax({
				url: url,				
				data: {id:id},
				type: "POST",
				success: function (data) {
					$("#tabla_historial").html(data);
				}
			});
}