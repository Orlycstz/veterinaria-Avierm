//agregar articulo
$("#btnAgregarNoticia").click(function(){

	$("#agregarNoticia").toggle(400);

});

//subir imagen ajax

var imagen = "";
var verdad = false;

$("#subirFoto").change(function(){

	imagen = this.files[0];

	//validar tamaño de la imagen
	var imagenSize = imagen.size;
	//2000000 son 2 millores = 2MB
	if(imagenSize > 2000000){

		$("#arrastreImagenNoticia").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>');
		verdad = true;
	}else{
		$(".alert").remove();
		verdad = false;
	}

	//validar Tipo de la imagen

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){
		$(".alert").remove();
		verdad = true;
	}else{
		$("#arrastreImagenNoticia").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>');
		verdad = false;
	}

	//manejo de ajax

	if(verdad){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/noticia.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
				$("#arrastreImagenNoticia").before('<img src="views/images/status.gif" id="status">');
			},
			success:function(respuesta){
				$("#status").remove();

				if(respuesta == 0){
					$("#arrastreImagenNoticia").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px*400px</div>');
				}else{
					$("#arrastreImagenNoticia").html('<div id="imagenNoticia"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');
				}
			}
		});

	}

});

//fin de subir imagen al input

//fin agregar noticia

/*Editar Noticia*/

$(".editarNoticia").click(function(){

	idNoticia = $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idNoticia).children("img").attr("src");
	nombre = $("#"+idNoticia).children("h1").html();
	introduccion = $("#"+idNoticia).children("p").html();

	$("#"+idNoticia).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px;" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input type="file" style="display:none" id="subirNuevaFoto" class="btn btn-default" ><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+nombre+'" name="editarNombre"><textarea cols="30" rows="5" name="editarIntroduccion">'+introduccion+'</textarea><input type="hidden" value="'+idNoticia+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="fotoAntigua"><hr></form>');

	$(".cambiarImagen").click(function(){

		$(this).hide();
		$("#subirNuevaFoto").show();
		$("#subirNuevaFoto").css({"width":"90%"});
		$("#nuevaFoto").html("");
		$("#subirNuevaFoto").attr("name","editarImagen");
		$("#subirNuevaFoto").attr("required",true);

		$("#subirNuevaFoto").change(function(){

			imagen = this.files[0];

			var imagenSize = imagen.size;

			if(imagenSize > 2000000){

				$("#arrastreImagenNoticia").before('<div>El archivo excede el peso permitido, 200kb</div>');
				verdad = true
			}else{
				$(".alert").remove();
				verdad = false;
			}

			imagenType = imagen.type;

			if(imagenType == "image/jpeg" || imagenType == "image/png"){
				$(".alerta").remove();
				verdad = true;
			}else{
				$("#arrastreImagenNoticia").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>');
				verdad = false;
			}

			if(verdad){

				var datos = new FormData();

				datos.append("imagen", imagen);

				$.ajax({
					url:"views/ajax/noticia.php",
					method:"POST",
					data:datos,
					cache:false,
					contentType:false,
					processData:false,
					beforeSend:function(){
						$("#nuevaFoto").html('<img src="views/images/status.gif" style="width:15%" id="status2">');
					},
					success:function(respuesta){
						$("#status2").remove();
						
							if(respuesta == 0){
								$("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px*400px</div>');
							}else{
								$("#nuevaFoto").html('<img src="'+respuesta.slice(6)+'" class="img-thumbnail">');
							}

					}
				});

			}

		});

	});

});

/*Fin de editar Noticia*/