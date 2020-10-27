<?php

/**
 * 
 */

require_once "conexion.php";

class VacunaModel{
	
	public function agregarvacunaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, cedula, tipovacuna, fecha) VALUES (:nombre, :cedula, :tipovacuna, :fecha)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipovacuna", $datos["tipo"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);	

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#visualizar mascotas
	public function visualizarVacunasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, cedula, tipovacuna, fecha FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#borrar vacuna
	public function borrarVacunaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	#consultar vacuna usuario
	public function consultarVacunasUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, tipovacuna, fecha FROM $tabla WHERE cedula = :cedula");

		$stmt -> bindParam(":cedula", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

}