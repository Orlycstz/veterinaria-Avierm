<?php

/**
 * 
 */
class Perfil{
	
	#visualizar perfiles de los usuarios
	public function visualizarPerfil(){

		$respuesta = PerfilesModel::visualizarPerfilesModel("usuario");

		foreach ($respuesta as $row => $item) {

			if($item["usuario"] != "admin"){			
				echo'<tr>
					<td>'.$item["nombre"].'</td>
			        <td>'.$item["apellido"].'</td>
			        <td>'.$item["usuario"].'</td>
			        <td>'.$item["cedula"].'</td>
			        <td>'.$item["correo"].'</td>
			        <td><a href="index.php?action=perfil&idBorrar='.$item["id"].'&borrarImg='.$item["id"].'"><span class="btn btn-danger fa fa-times quitarSuscriptor" style="margin-left: 10px;"></span></a></td>
			      </tr>';
			  }

		}

	}

	#borrar usuario por el admin
	public function borrarUsuario(){

		if(isset($_GET["idBorrar"])){

			$datos = $_GET["idBorrar"];

			$respuesta = PerfilesModel::borrarUsuarioModel($datos, "usuario");

			if($respuesta == "ok"){

				echo '<script>
						swal({
						title: "¡OK!",
						text: "!Usuario eliminado correctamente!",
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
			}

		}// fin del isset

	}

	#editar perfil
	public function editarPerfil(){

		if(isset($_POST["editarNombre"])){

				$datosController = array("id" => $_POST["idPerfil"],
										 "nombre" => $_POST["editarNombre"],
										 "apellido" => $_POST["editarApellido"],
										 "usuario" => $_POST["editarUsuario"],
										 "correo" => $_POST["editarEmail"],
										 "seguridad" => $_POST["EditarPreguntaSeguridad"],
										 "respuesta" => $_POST["editarRespuesta"]
										);

				$respuesta = PerfilesModel::editarPerfilModel($datosController, "usuario");

				if($respuesta == "ok"){

					if(isset($_POST["actualizarSesion"])){

						$_SESSION["id"] = $_POST["idPerfil"];
						$_SESSION["nombre"] = $_POST["editarNombre"];
						$_SESSION["apellido"] = $_POST["editarApellido"];
						$_SESSION["usuario"] = $_POST["editarUsuario"];
						$_SESSION["correo"] = $_POST["editarEmail"];

						echo '<script>
								swal({
								title: "¡OK!",
								text: "!Usuario editado correctamente!",
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
					}

				}else{
					echo '<div>Ha ocurrido un error</div>';
				}

		} // fin del isset

	}

}