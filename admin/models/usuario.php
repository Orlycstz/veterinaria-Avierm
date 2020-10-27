<?php 

require_once "conexion.php";

class UsuarioModel{

		public function ingresoModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido, correo, usuario, cedula, contrasena, intentos FROM $tabla WHERE usuario = :usuario");

		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}

	public function intentosModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");

		$stmt -> bindParam(":usuario", $datos["usuarioActual"], PDO::PARAM_STR);
		$stmt -> bindParam(":intentos", $datos["actualizarIntentos"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	public function registrarUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, usuario, cedula, correo, seguridad, respuesta, contrasena) VALUES (:nombre,:apellido,:usuario, :cedula, :correo, :seguridad, :respuesta, :contrasena)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":seguridad", $datos["seguridad"], PDO::PARAM_STR);
		$stmt -> bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#recuperar contrasena
	public function recuperarContrasenaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, seguridad FROM $tabla WHERE cedula = :cedula");

		$stmt -> bindParam(":cedula", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}	

	#seleccionar respuesta
	public function seleccionarRespuestaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT respuesta FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#nueva Contrasena 
	public function nuevaContrasenaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contrasena = :contrasena WHERE usuario = :usuario");

		$stmt -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuarioV"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#validar usuario existente
	public function validarUsuarioAjaxModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario = :usuario");

		$stmt -> bindParam(":usuario", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#validar email existente
	public function validarEmailModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo = :correo");

		$stmt -> bindParam(":correo", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#validar cedula existente
	public function validarCedulaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cedula FROM $tabla WHERE cedula = :cedula");

		$stmt -> bindParam(":cedula", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}
}