var responsables = {
	fn: {

	},
	ajax: {

	},
	onReady: function () {
		console.log("Inicializado Correctamente!");
	},
	init: function () {
		responsables.onReady();
	}
};

jQuery(document).ready(function($) {
	responsables.init()
});