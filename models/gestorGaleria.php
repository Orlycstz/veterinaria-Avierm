<?php

/**
 * 
 */
require_once "admin/models/conexion.php";

class GaleriaModel{
	
	#mostrar galerias
	public function mostrarGaleriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, ruta FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
}