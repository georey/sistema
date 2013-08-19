function cargar_historial(id) {
	var url = "http://localhost/sistema/facturas/responsable/cargar_historial";
	$.ajax({
				url: url,				
				data: {id:id},
				type: "POST",
				success: function (data) {
					$("#tabla_historial").html(data);
				}
			});
}
