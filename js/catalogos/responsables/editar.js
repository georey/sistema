var responsables = {
	fn: {
		loadEditar: function () {
			event.preventDefault();
			var value = {
						id: $(this).attr("data-id")
					};
			responsables.ajax.getDetallesResponsable(value);
		}
	},
	ajax: {
		getDetallesResponsable: function (value) {
			var url = "http://localhost/sistema/sistema/catalogos/responsables/load_editar";
			$.ajax({
				url: url,
				dataType: "json",
				data: value,
				type: "GET",
				success: function (data) {
					console.log(data);
				}
			});
		}

	},
	onReady: function () {
		console.log("Inicializado Correctamente!");
		$("a.editar-responsable").on("click", responsables.fn.loadEditar);
	},
	init: function () {
		responsables.onReady();
	}
};

jQuery(document).ready(function($) {
	responsables.init()
});