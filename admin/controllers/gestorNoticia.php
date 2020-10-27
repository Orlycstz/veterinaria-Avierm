<?php
/**
 * 
 */


class Noticia{
	
	#subir imagen al imput 
	#------------------------------
	public function subirImagen($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){
			echo 0;
		}else{
			//cramos la imagen temporal
			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/noticia/temp/noticia".$aleatorio.".jpg"; //archivo temporal
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	#agregar noticia
	#----------------------------------------

	public function agregarNoticia(){

		if(isset($_POST["tituloNoticia"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/noticia/temp/*");

			foreach ($borrar as $file) {
				unlink($file);
			}

			$aleatorio = mt_rand(100,999);

			$ruta = "views/images/noticia/noticia".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

			$datosController = array("nombre" => $_POST["tituloNoticia"],
									 "introduccion" => $_POST["introNoticia"],
									 "url" => $ruta);

			$respuesta = NoticiaModels::agregarNoticiaModels($datosController, "noticia");

			if($respuesta == "ok"){
				echo '<script>

						swal({
							title: "¡OK!",
							text: "¡La Noticia ha sido creada correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "noticia";
								}
							});

						</script>';
			}else{
				echo $respuesta;
			}

		}//fin del isset

	}

	#mostrar noticias agregadas
	#---------------------------------------

	public function mostrarNoticias(){

		$respuesta = NoticiaModels::mostrarNoticiasModels("noticia");

		foreach ($respuesta as $row => $item) {
			echo '<li id="'.$item["id"].'" class="bloqueNoticia">
						<span>
							<a href="index.php?action=noticia&idBorrar='.$item["id"].'&rutaImagen='.$item["url"].'">
								<i class="fa fa-times btn btn-danger"></i>
							</a>
							<i class="fa fa-pencil btn btn-primary editarNoticia"></i>	
							</span>
							<img src="'.$item["url"].'" class="img-thumbnail">
							<h1>'.$item["nombre"].'</h1>
							<p>'.$item["introduccion"].'</p>
						<hr>

					</li>';
		}

	}

	#editar noticias
	#--------------------------------------------
	public function editarNoticias(){

		$ruta = "";

		if(isset($_POST["editarNombre"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){

				$imagen = $_FILES["editarImagen"]["tmp_name"];
				$aleatorio = mt_rand(100,999);
				$ruta = "views/images/noticia/noticia".$aleatorio.".jpg";
				$origen = imagecreatefromjpeg($imagen);
				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
				imagejpeg($destino, $ruta);
				$borrar = glob("views/images/noticia/temp/*");

				foreach ($borrar as $file) {
					unlink($file);
				}

			}

			if($ruta == ""){
				$ruta = $_POST["fotoAntigua"];
			}else{
				unlink($_POST["fotoAntigua"]);
			}

			$datosController = array("id" => $_POST["id"],
									 "nombre" => $_POST["editarNombre"],
									 "introduccion" => $_POST["editarIntroduccion"],
									 "url" => $ruta);

			$respuesta = NoticiaModels::editarNoticiaModels($datosController, "noticia");

			if($respuesta == "ok"){
				echo '<script>

						swal({
							title: "¡OK!",
							text: "¡La Noticia ha sido editada correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "noticia";
								}
							});

						</script>';
			}else{
				echo $respuesta;
			}

		}//fin del isset

	}

	#eliminar noticias
	#-------------------------------------
	public function eliminarNoticia(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$borrar = $_GET["idBorrar"];

			$respuesta = NoticiaModels::eliminarNoticiaModels($borrar, "noticia");

			if($respuesta == "ok"){
				echo '<script>

						swal({
							title: "¡OK!",
							text: "¡La Noticia ha sido borrada correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "noticia";
								}
							});

						</script>';
			}

		}

	}

}