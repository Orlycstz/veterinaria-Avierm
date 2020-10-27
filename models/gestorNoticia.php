<?php

/**
 * 
 */
require_once "admin/models/conexion.php";

class NoticiaModel{
	
	#mostrar noticias
	public function mostrarNoticiaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, introduccion, url FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

}