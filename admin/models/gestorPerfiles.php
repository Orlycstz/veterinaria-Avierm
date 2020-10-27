<?php

/**
 * 
 */
require_once "Conexion.php";

class PerfilesModel
{
	
	public function visualizarPerfilesModel($tabla){
			
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido, usuario, cedula, correo FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#borrar usuario 
	public function borrarUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#editar perfil
	public function editarPerfilModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, usuario = :usuario, correo = :correo, seguridad = :seguridad, respuesta = :respuesta WHERE id = :id");

		$stmt -> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":seguridad",$datos["seguridad"], PDO::PARAM_STR);
		$stmt -> bindParam(":respuesta",$datos["respuesta"], PDO::PARAM_STR);
		$stmt -> bindParam(":id",$datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}
}