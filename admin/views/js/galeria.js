//area del arrastre de imagenes

if($("#lightbox").html() == 0){
	$("#lightbox").css({"height":"100px"});
}else{
	$("#lightbox").css({"height":"auto"});
}

$("body").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
});

$("#lightbox").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();

	$("#lightbox").css({"background":"url(views/images/pattern.jpg)"});
});

$("body").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

});

var imagenSize = [];
var imagenType = [];

$("#lightbox").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#lightbox").css({"background":"white"});

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen;

	//hacemos un ciclo para recibir la cantidad de tipos y tamaños de fotos y asignarlo en un arreglo
	
	for(var i = 0; i < archivo.length; i++){

		imagen = archivo[i];
		imagenSize.push(imagen.size);
		imagenType.push(imagen.type);

		if(Number(imagenSize[i] > 2000000)){
			$("#lightbox").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>');			
		}else{
			$(".alerta").remove();
		}

		if(imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){
			$(".alerta").remove();
		}else{
			$("#lightbox").before('<div class="alert alert-warning text-center">El archivo debe ser formato JPG</div>');
		}

		if(Number(imagenSize[i]) < 2000000 && imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){

			var datos = new FormData();
			datos.append("imagen", imagen);

			$.ajax({
				url:"views/ajax/galeria.php",
				method: "POST",
				data:datos,
				cache:false,
				contentType:false,
				processData:false,
				beforeSend: function(){
					$("#lightbox").append('<li id="status"><img src="views/images/status.gif"></li>');
				},
				success:function(respuesta){
					$("#status").remove();

					if(respuesta == 0){
						
						$("#lightbox").before('<div class="alert alert-warning alerta text-center">La imagen es superior a 1024px*768px</div>');


					}else{

							$("#lightbox").append('<li><span class="fa fa-times"></span><a rel="grupo" href="'+respuesta.slice(6)+'"><img src="'+respuesta.slice(6)+'"></a></li>');
							$("#lightbox").css({"height":"auto"});
							
							swal({
							title: "¡OK!",
							text: "¡Se ha subido la imagen correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "galeria";
								}
							});
					}
				}
			});
		}
	}	

});

//Eliminar imagenes

$(".eliminarFoto").click(function(){

	if($(".eliminarFoto").length == 1){
		$("#lightbox").css({"height":"100px"});
	}

	var idGaleria = $(this).parent().attr("id");
	var rutaGaleria = $(this).attr("ruta");

	$(this).parent().remove();

	var borrarItem = new FormData();
	borrarItem.append("idGaleria", idGaleria);
	borrarItem.append("rutaGaleria", rutaGaleria);

	$.ajax({
		url:"views/ajax/galeria.php",
		method:"POST",
		data: borrarItem,
		cache: false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			console.log('respuesta', respuesta);
		}
	});

});

//fin eliminar imagenes