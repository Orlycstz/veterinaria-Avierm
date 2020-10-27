$("#btnAgregarArticulo").click(function(){

	$("#agregarArtículo").toggle(400);

});

var imagen = "";
var verdad = false;

$("#subirFoto").change(function(){

	imagen = this.files[0];

	//validar el tamaño
	var imagenSize = imagen.size;

	//2000000 son 2millones = 2MB
	if(imagenSize > 2000000){
		
		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>');
		verdad = true;
	}else{

		$(".alert").remove();
		verdad = false;
	
	} 

	// validar tipo de la imagen

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){

		$(".alerta").remove();
		verdad = true;

	}else{

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>');
		verdad = false;
	}

	//manejo de ajax

	if(verdad){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({

			url:"views/ajax/articulos.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType:false,
			processData:false,
			beforeSend: function(){
				$("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){

				$("#status").remove();

				if(respuesta == 0){

					$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px si este</div>');

				}else{

					$("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

				}
			}

		});

	}

});

/*Editar articulo*/
//-----------------------------

$(".editarArticulo").click(function(){

	idArticulo = $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idArticulo).children("img").attr("src");
	nombre = $("#"+idArticulo).children("h1").html();
	descripcion = $("#"+idArticulo).children("h2").html();
	cantidad = $("#"+idArticulo).children("h3").html();
	precio = $("#"+idArticulo).children("h4").html();

	$("#"+idArticulo).html('<form method="post" enctype="multipart/form-data"><span><input style="width:30%; padding:5px 0; margin-top:4px;" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div style="width:300px;" id="editarImagen"><input type="file" style="display:none;" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+nombre+'" name="editarNombre"><textarea cols="30" rows="5" name="editarDescripcion">'+descripcion+'</textarea><input name="editarCantidad" id="editarCantidad" value="'+cantidad+'"><input name="editarPrecio" id="editarPrecio" value="'+precio+'"><input type="hidden" value="'+idArticulo+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="fotoAntigua"><hr></form>');

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
				//2000000 son 2millones = 2MB
				if(imagenSize > 2000000){
					$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>');
					verdad = true;
				}else{
					$(".alert").remove();
					verdad = false;
				}

				//validar tipo de la imagen

				imagenType = imagen.type;

				if(imagenType == "image/jpeg" || imagenType == "image/png"){
					$(".alerta").remove();
					verdad = true;
				}else{
					$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>');
					verdad = false;
					console.log("imagen tipo:"+ imagenType);
				}

				if(verdad){

					var datos = new FormData();

					datos.append("imagen", imagen);

					$.ajax({
						url:"views/ajax/articulos.php",
						method:"POST",
						data:datos,
						cache:false,
						contentType:false,
						processData:false,
						beforeSend: function(){
							$("#nuevaFoto").html('<img src="views/images/status.gif" style="width:15%" id="status2">');
						},
						success:function(respuesta){
							$("status2").remove();

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


/*fin de editar articulo*/