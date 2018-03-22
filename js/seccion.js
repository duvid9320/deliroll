$(document).ready(function mostrar(btn,sec){
	var estado = false;

	$(btn).on('click',function(){
		$(sec).slideToggle();

		if (estado == true) {
			$('body').css({
				"overflow": "auto"
			});
			estado = false;
		} else {
			$('body').css({
				"overflow": "hidden"
			});
			estado = true;
		}
	});
});
