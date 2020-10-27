$("div.contenedor nav#botonera a").click(function(e){

	e.preventDefault();

	var href = $(this).attr("href");

	$(href).animatescroll({

		scrollSpeed:2000,
		easing:"easeOutBounce"

	});

});