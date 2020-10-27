<?php

/**
 * 
 */
class Articulo{


	#mostrar imagen temporal
	#-----------------------------------------------
	public function MostrarArticuloController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){
			echo 0;
		}else{
			//creamos la imagen temporal
			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/articulos/temp/articulos".$aleatorio.".jpg"; //archivo temporal
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]); //cortar la imagen
			imagejpeg($destino, $ruta);

			echo $ruta;

		}

	}

	#guardar articulo
	#------------------------------------
	public function guardarArticuloController(){

		if(isset($_POST["nombre"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/articulos/temp/*");

			foreach ($borrar as $file) {
				unlink($file);
			}

			$aleatorio = mt_rand(100,999);

			$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

			$datosController = array("nombre"=>$_POST["nombre"],
									 "descripcion" => $_POST["descripcion"],
									 "precio" => $_POST["precio"],
									 "cantidad" => $_POST["cantidad"],
									 "ruta" => $ruta);

			$respuesta = ArticuloModel::guardarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						title: "¡OK!",
						text: "¡El articulo ha sido guardado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "articulos";
							}
						});

					</script>';
			}

		}

	}

	#mostrar articulos agregados
	#--------------------------------------
	public function mostrarArticulosController(){

		$respuesta = ArticuloModel::mostrarArticulosModel("articulos");

		foreach ($respuesta as $row => $item) {

			if($item["cantidad"] != 0){

				echo '<tr><td>'.$item["nombre"].'</td>
			    	<td>'.$item["descripcion"].'</td>
			    	<td>'.$item["cantidad"].'</td>
			        <td>
			        	<a href="#articulo'.$item["id"].'" data-toggle="modal">
			    			<span class="btn btn-success fa fa-pencil reservarArticulo"></span>
			    		</a>
			        </td>
			        <td></td>
			        </tr>

			        <div id="articulo'.$item["id"].'" class="modal fade">
			      	
			      	<div class="modal-dialog modal-content">
			      		
			      		<div class="modal-header" style="border:1px solid #eee">

			      			<button type="button" class="close" data-dismiss="modal">&times;</button>
			      			
			      			<h3 class="modal-title">Reservar Articulo</h3>
			      		
			      		</div>

			      		<div class="modal-footer" style="border:1px solid #eee">

		      				<form method="post">

		      					<input type="hidden" name="idReserva" value="'.$item["id"].'">

								<div class="form-group" style="width:400px">
						          <img src="'.$item["ruta"].'" class="img-thumbnail">
						        </div> 

						        <div class="form-group">
						          <label style="float:left">Nombre:</label>
						          <input type="text" name="nombreReserva" value="'.$item["nombre"].'" class="form-control" readonly>
						        </div>

						        <div class="form-group">
						          <label style="float:left">Descripción:</label>
						          <input type="text" name="descripcionReserva" value="'.$item["descripcion"].'" class="form-control" readonly>
						        </div> 

						        <div class="form-group">
						          <label style="float:left">Cantidad:</label>
						          <input type="text" name="cantidadR" value="'.$item["cantidad"].'" class="form-control" readonly>
						        </div>						      

						        <div class="form-group">
						          <label style="float:left">precio:</label>
						          <input type="text" name="precioReserva" value="'.$item["precio"].'" class="form-control" readonly>
						        </div>

						        <div class="form-group">
						          <label style="float:left">Ingrese cedula</label>
						          <input required maxlength="8" class="form-control" type="text" placeholder="Cédula" name="cedulaReserva">
						        </div>
						        
						        <div>

						          <label style="float:left">cantidad</label>
						          <input required class="form-control" name="cantidadReserva" type="number" min="1" max="'.$item["cantidad"].'" placeholder="cantidad">

						        </div>

						       <div class="form-group text-center">
						       		<input type="submit" id="guardarArticulo" value="Reservar" class="btn btn-primary">
						       </div>
			      			</form>

			      		</div>
			      		
		      		</div>

		      		</div>';

			}

		}

	}

	#mostrar articulos para el administrador
	#---------------------------------------------
	public function mostrarArticulosAdmi(){

		$respuesta = ArticuloModel::mostrarArticulosModel("articulos");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
			        <td><img src="'.$item["ruta"].'" width="100px" class="img-thumbnail"></td>
			        <td>'.$item["nombre"].'</td>
			        <td>'.$item["descripcion"].'</td>
			        <td>'.$item["precio"].'</td>
			        <td>'.$item["cantidad"].'</td>
			        <td>
		        		<a href="#articuloAd'.$item["id"].'" data-toggle="modal">
		    				<span class="btn btn-success fa fa-eye dArticulo"></span>
			    		</a>
			        </td>
	      		  </tr>

	      		  <div id="articuloAd'.$item["id"].'" class="modal fade">

				      <div class="modal-dialog modal-content">

				       <div class="modal-header" style="border:1px solid #eee">

				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				         <h3 class="modal-title">Detalle Articulo</h3>

				      </div>

				      <div class="modal-body" style="border:1px solid #eee">

				      	<ul id="editarArticulo">

		      				<li id="'.$item["id"].'" class="bloqueArticulo">
						      <span class="handleArticle">
						      <a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'"><i class="fa fa-times btn btn-danger"></i></a>
						      <i class="fa fa-pencil btn btn-primary editarArticulo"></i>
						      </span>
						      <img style="width:800px;" src="'.$item["ruta"].'" class="img-thumbnail">
						      <hr>
						      <h1>'.$item["nombre"].'</h1>
						      <p>Descripcion: <h2>'.$item["descripcion"].'</h2></p>
						      <p>Cantidad: <h3>'.$item["cantidad"].'</h3></p>
						      <p>Precio: <h4>'.$item["precio"].'</h4></p>
						      <hr>
						  	</li>

				      	</ul>

				      </div>

				      </div>

				  </div>

	      		';
		}


	}

	#editar articulo
	#-----------------------------------------
	public function editarArticuloAdmin(){

		$ruta = "";

		if(isset($_POST["editarNombre"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){

				$imagen = $_FILES["editarImagen"]["tmp_name"];
				$aleatorio = mt_rand(100,999);
				$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";
				$origen = imagecreatefromjpeg($imagen);
				$destino = imagecrop($origen,["x" => 0, "y"=>0, "width"=>800, "height"=>400]);
				imagejpeg($destino, $ruta);
				//borramos los archivos temporales de las imagenes
				$borrar = glob("views/images/articulos/temp/*");

				foreach ($borrar as $file) {
					unlink($file);//procedemos a borrar
				}

			}

			if($ruta == ""){
				$ruta = $_POST["fotoAntigua"];
			}else{
				unlink($_POST["fotoAntigua"]);
			}

			$datosController = array("id"=>$_POST["id"],
									 "nombre" => $_POST["editarNombre"],
									 "descripcion" => $_POST["editarDescripcion"],
									 "precio" => $_POST["editarPrecio"],
									 "cantidad" => $_POST["editarCantidad"],
									 "ruta" => $ruta);

			$respuesta = ArticuloModel::EditarArticuloAdminModels($datosController, "articulos");

			if($respuesta == "ok"){
				echo '<script>

						swal({
							title: "¡OK!",
							text: "¡El articulo ha sido editado correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "articulos";
								}
							});

						</script>';
			}else{
				echo $respuesta;
			}

		}//fin del isset

	}

	#Eliminar articulo
	#----------------------------------------
	public function eliminarArticuloAdmin(){

		if(isset($_GET["idBorrar"])){

			$borrar = $_GET["idBorrar"];

			unlink($_GET["rutaImagen"]);

			$respuesta = ArticuloModel::eliminarArticuloAdminModel($borrar, "articulos");

			if($respuesta == "ok"){
				echo '<script>

						swal({
							title: "¡OK!",
							text: "¡El articulo ha sido borrado correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "articulos";
								}
							});

						</script>';
			}else{
				echo $respuesta;
			}
		}

	}

	#guardar reserva
	#-----------------------------------------
	public function guardarReserva(){

		if(isset($_POST["cantidadReserva"])){

			$datosController = array("nombre" => $_POST["nombreReserva"],
									 "descripcion" => $_POST["descripcionReserva"],
									 "precio"=>$_POST["precioReserva"],
									 "cedula"=>$_POST["cedulaReserva"],
									 "cantidad"=>$_POST["cantidadReserva"],
									 "idarticulo"=>$_POST["idReserva"]);

			$datos = $_POST["idReserva"];

			//se guarda la reserva
			$respuesta = ArticuloModel::guardarRerservaModels($datosController, "reservacion");
			//hacemos una resta de la cantidad del articulo por la cantidad que se eligio a reservar y luego actualizamos
			$cantidadTotal = $_POST["cantidadR"] - $_POST["cantidadReserva"];

			$datos2 = array("id"=>$datos, "cantidadactualizada"=>$cantidadTotal);

			$actualizar = ArticuloModel::actualizarArticuloModel($datos2, "articulos");


			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "Articulo reservado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "reservar";
							}
						});
					    </script>';
			}else{
				echo '<div class="alert alert-warning"><b>A ocurrido un error</div>';
			}

		}

	}

	//mostrar reserva del usuario
	#------------------------------------------
	public function mostrarArticulosReservadors(){

		$iguales = false;

		if(isset($_POST["cedulaRe"]) && isset($_POST["cedulaP"])){

			$cedula = $_POST["cedulaRe"];

			if($cedula == $_POST["cedulaP"])	$iguales = true;

			if($iguales){

				$respuesta = ArticuloModel::mostrarArticulosReservadosModel($cedula, "reservacion");

					$total = 1000;
					foreach ($respuesta as $row => $item) {
						echo '<tr>
						        <td>'.$item["nombre"].'</td>
						        <td>'.$item["descripcion"].'</td>
						        <td>'.$item["cantidadreserva"].'</td>
						        <td>'.(int)$item["precio"]*$item["cantidadreserva"]*$total.'Bs</td>
						        <td>'.$item["cedula"].'</td>
						        <td>
						        	<a disabled="false" href="#reserva'.$item["id"].'" data-toggle="modal">
						        		<span class="btn btn-danger fa fa-times" style="margin-left:10px;"></span>
					        		</a>
					        		<input type="hidden" name="idArticulo" value="'.$item["idarticulo"].'">
				        		</td>
						      </tr>

						      <div id="reserva'.$item["id"].'" class="modal fade">
					      	
					      		<div class="modal-dialog modal-content">
					      		
					      			<div class="modal-header" style="border:1px solid #eee">

					      				<button type="button" class="close" data-dismiss="modal">&times;</button>
					      			
					      				<h3 class="modal-title">¿Seguro Que Desea Eliminar La Reserva?</h3>
					      		
					      			</div>

					      			<div class="modal-footer" style="border:1px solid #eee">
					      					
					      				<form style="padding: 20px" method="post"> 

					      					<input type="hidden" name="idarticulo" value="'.$item["idarticulo"].'" readonly>
					      					<input type="hidden" name="idRes" value="'.$item["id"].'" readonly>

									       <div class="form-group text-center">
									       		<input type="submit" id="EliminarArticulo" value="Eliminar" class="btn btn-danger">
									       </div>

					      				</form>

					      			</div>

				      			</div>

						      ';
					}
			}else{
				echo '<div class="alert alert-warning">Tu cedula es incorrecta</div>';
			}

		}

	}

	#Eliminar reserva del articulo
	#-------------------------------------
	public function EliminarReservaArticulo(){

		if(isset($_POST["idarticulo"])){

			$idArticulo = $_POST["idarticulo"];

			$idReserva = $_POST["idRes"];

			//busco la cantidad que queda en el articulo

			$cantidadArticulo = ArticuloModel::buscarCantidadArticulo($idArticulo, "articulos");

			//busco la cantidad del articulo reservado

			$cantidadReserva = ArticuloModel::buscarCantidadReserva($idReserva, "reservacion");

			//se le suma la cantidad del articulo con la cantidad de la reserva para recuperar la cantidad
			// que se tenia antes

			$cantidadDeVuelta = $cantidadArticulo["cantidad"] + $cantidadReserva["cantidadreserva"];

			//actualizamos la cantidad del articulo
			
			$datosController = array("id" => $idArticulo, "cantidadactualizada" => $cantidadDeVuelta);

			$actualizar = ArticuloModel::actualizarArticuloModel($datosController, "articulos");

			//y eliminamos la reserva del articulo

			$respuesta = ArticuloModel::EliminarReservaArticuloModel($idReserva, "reservacion");
			
			if($respuesta == "ok"){

				echo '<script>
						swal({
						title: "¡OK!",
						text: "Reserva Eliminada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "perfil";
							}
						});
					    </script>';

			}else{

				echo '<div class="alert alert-warning"><b>A ocurrido un error</div>';
			
			}

		}

	}

//fin de la clase
}