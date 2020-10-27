<?php 

/**
 * 
 */
class Vacuna{
	
	#registrar vacunas perro

	public function agregarVacunaPerro(){

		if(isset($_POST["nombrePerro"])){

			$datosController = array("nombre" => $_POST["nombrePerro"],
									 "cedula" => $_POST["cedulaPerro"],
									 "tipo" => $_POST["tipoPerro"],
									 "fecha" => $_POST["fechaPerro"]);

			$respuesta = VacunaModel::agregarvacunaModel($datosController, "vacuna");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Vacuna de perro agregada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "vacunas";
							}
						});
					    </script>';
			}else{
				echo 'ha ocurrido un error';
			}

		}

	}

	#registrar vacunas gatos

	public function agregarVacunaGato(){

		if(isset($_POST["nombreGato"])){

			$datosController = array("nombre" => $_POST["nombreGato"],
									 "cedula" => $_POST["cedulaGato"],
									 "tipo" => $_POST["tipoGato"],
									 "fecha" => $_POST["fechaGato"]);

			$respuesta = VacunaModel::agregarvacunaModel($datosController, "vacuna");

			if($respuesta == "ok"){

				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Vacuna de gato agregada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "vacunas";
							}
						});
					    </script>';

			}else{
				echo 'ha ocurrido un error1';
			}

		}

	}

	#visualizar vacunas agregadas

	public function visualizarVacunas(){

		$respuesta = VacunaModel::visualizarVacunasModel("vacuna");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
			        <td>'.$item["nombre"].'</td>
			        <td>'.$item["cedula"].'</td>
			        <td>'.$item["tipovacuna"].'</td>
					<td>'.$item["fecha"].'</td>
			        <td><a href="index.php?action=vacunas&id='.$item["id"].'"><span class="btn btn-danger fa fa-times eliminarrMascota" style="margin-left:10px;"></span></a></td>
			      </tr>';
		}

	}

	#borrar vacuna

	public function borrarVacuna(){

		if(isset($_GET["id"])){

			$datos = $_GET["id"];

			$respuesta = VacunaModel::borrarVacunaModel($datos, "vacuna");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Vacuna borrada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "vacunas";
							}
						});
					    </script>';
			}else{
				echo '<div class="alert alert-danger">ERROR</div>';
			}

		}

	}

	#consultar vacunas para el usuario

	public function consultarVacunasUsuario(){

		if(isset($_POST["cedulaU"]) && isset($_POST["cedulaPe"])){

			$datos = $_POST["cedulaU"];

			if($datos == $_POST["cedulaPe"]){

				$respuesta = VacunaModel::consultarVacunasUsuarioModel($datos, "vacuna");

				foreach ($respuesta as $row => $item) {
					echo '<tr>
					        <td>'.$item["nombre"].'</td>
					        <td>'.$item["tipovacuna"].'</td>
					        <td>'.$item["fecha"].'</td>
					        <td><a disabled="false" href="index.php?action=vacunasConsulta&lista='.$item["id"].'"><span class="btn btn-success fa fa-user" style="margin-left:10px;"></span></a></td>
					        <td></td>
					      </tr>';
				}

			}else{

				echo '<div class="alert alert-warning">Tu cedula es incorrecta</div>';

			} // fin de comparar cedulas

		}
	}

}