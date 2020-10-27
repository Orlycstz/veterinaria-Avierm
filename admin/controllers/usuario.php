<?php

/**
 * 
 */
class Usuario{
	
	#ingresar usuario
	public function ingresoController(){
		
		if(isset($_POST["usuarioIngreso"]))
		{
	      if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["passwordIngreso"]))
	      {

  	        #$encriptar = crypt($_POST["passwordIngreso"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$datosController = array("usuario" => $_POST["usuarioIngreso"],
					"password" => $_POST["passwordIngreso"]
					);

			$respuesta = UsuarioModel::ingresoModel($datosController, "usuario");

			$intentos = $respuesta["intentos"];

			$usuarioActual = $_POST["usuarioIngreso"];

			$maximoIntentos = 2;

			if($intentos < $maximoIntentos){

				if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["contrasena"] == $_POST["passwordIngreso"])
				{
					
					$intentos = 0;

					$datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);
					
					$respuestaActualizarIntentos = UsuarioModel::intentosModel($datosController, "usuario");
					//$respuestaInfo = IngresoModels::listausuarioModel("usuario");

					session_start();

					$_SESSION["validar"] = true;
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["apellido"] = $respuesta["apellido"];
					$_SESSION["correo"] = $respuesta["correo"];
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["cedula"] = $respuesta["cedula"];
					
					header("location:inicio");
				
				
				}else{

					$intentos++;

					$datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);
					
					$respuestaActualizarIntentos = UsuarioModel::intentosModel($datosController, "usuario");

					echo '<div class="alert alert-danger">Error al ingresar</div>';
				
				}
			}//fin de intentos
			else{

				$intentos = 3;

				$datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);
				
				$respuestaActualizarIntentos = UsuarioModel::intentosModel($datosController, "usuario");

				echo '<div class="alert alert-danger">Usuario bloqueado, Debe cambiar la clave, 3 intentos fallidos.</div>';

			}

	      }//final de validacion

		}//fin de isset

	}

	#registrar usuario
	public function registrarUsuario(){

		if(isset($_POST["nombreRegistro"])){

			/*if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombreRegistro"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["apellidoRegistro"]) &&	
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correoRegistro"])
			){*/


				$datosController = array("nombre" => $_POST["nombreRegistro"],
										 "apellido" => $_POST["apellidoRegistro"],
										 "usuario" => $_POST["usuarioRegistro"],
										 "cedula" => $_POST["cedulaRegistro"],
										 "correo" => $_POST["correoRegistro"],
									     "seguridad" => $_POST["preguntaSeguridad"],
									     "respuesta" => $_POST["respuestaRegistro"],
										 "contrasena" => $_POST["contrasenadRegistro"]
										 );

			$respuesta = UsuarioModel::registrarUsuarioModel($datosController,"usuario");

				if($respuesta == "ok"){
					echo '<script>
								swal({
								title: "¡OK!",
								text: "¡Usuario Creado Correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "ingreso";
									}
								});
							</script>';
				}else{
					echo '<div class="alert alert-danger">Ha fallado en registrarse</div>';
				}

			//}//fin de if validar

		}// fin del isset

	}

	#recuperar contraseña
	public function recuperarContrasena(){

		if(isset($_POST["usuarioCedula"])){

			$dato = $_POST["usuarioCedula"];

			$respuesta = UsuarioModel::recuperarContrasenaModel($dato, "usuario");
				echo'

					<script>

						$("#btn-ingreso").hide("fast");
						$("#usuarioIngreso").hide("fast");
						$("#label").hide("fast");
						$("#forget").hide("fast");

					</script>

					<div>
						<form method="post">
						        <input type="hidden" name="idUsuario" value="'.$respuesta["id"].'">
						        <div class="form-group">
						          <input type="text" readonly value="'.$respuesta["seguridad"].'" class="form-control" required>
						        </div>
						       <div class="form-group">
						          <input type="text" name="RespuestaP" id="respuestaRC" placeholder="Respuesta" class="form-control" required>
						        </div>
				       			<div class="form-group text-center">
						       		<input type="submit" value="Enviar" class="btn btn-warning">
						       </div>
		       				   <div style="margin-top: 10px;"><a href="ingreso" id="forget">Sé mi contraseña</a></div>
				        </form>
					';
		}

	}

	#verificar respuesta
	public function seleccionarRespuesta(){

		if(isset($_POST["RespuestaP"])){

			$datos = array("id" => $_POST["idUsuario"],
						   "respuesta" => $_POST["RespuestaP"]);

			$respuesta = UsuarioModel::seleccionarRespuestaModel($datos, "usuario");

			if($respuesta["respuesta"] == $_POST["RespuestaP"]){

				echo '<script>
								swal({
								title: "¡OK!",
								text: "¡Respuesta correcta!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "nuevacontrasena";
									}
								});
							</script>';

				header("location:nuevacontrasena");
				
			}else{
				echo '<div class="alert alert-warning"><b>Respuesta Incorrecta</div>';
			}

		}

	}

	#nueva contrasena
	public function nuevaContrasenaController(){

		if(isset($_POST["nuevaContrasena"])){

			$datosController = array("usuarioV" => $_POST["Usuario"],
									 "contrasena" => $_POST["nuevaContrasena"]);

			$respuesta = UsuarioModel::nuevaContrasenaModel($datosController, "usuario");

			if($respuesta == "ok"){

				$intentos = 0;

				$datosController = array("usuarioActual" => $_POST["Usuario"], "actualizarIntentos" => $intentos);
				
				$respuestaActualizarIntentos = UsuarioModel::intentosModel($datosController, "usuario");

				echo '<script>
								swal({
								title: "¡OK!",
								text: "¡Contrasena cambiada correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "ingreso";
									}
								});
							</script>';

			}else{
				echo '<script>
								swal({
								title: "¡OK!",
								text: "¡Ha ocurrido un error!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "ingreso";
									}
								});
							</script>';
			}

		}

	}

	#validar usuario existente
	public function validarUsuarioAjaxController($validarUsuario){

		$datos = $validarUsuario;

		$respuesta = UsuarioModel::validarUsuarioAjaxModel($datos, "usuario");

		if(strlen($respuesta["usuario"]) > 0){
			echo 0;
		}else{
			echo 1;
		}

	}

	#validar email existente
	public function validarEmailController($validarEmail){

		$datos = $validarEmail;

		$respuesta = UsuarioModel::validarEmailModel($datos, "usuario");

		if(strlen($respuesta["correo"]) > 0){
			echo 0;
		}else{
			echo 1;
		}
	}

	#validar cedula existente
	public function validarCedulaController($validarcedula){

		$datos = $validarcedula;

		$respuesta = UsuarioModel::validarCedulaModel($datos, "usuario");

		if(strlen($respuesta["cedula"]) > 0){
			echo 0;
		}else{
			echo 1;
		}

	}
	
}