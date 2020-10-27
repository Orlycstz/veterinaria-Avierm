<?php

require_once "conexion.php";

/**
 * 
 */
class NoticiaModels{
	
	#agregar noticia
	#------------------------------------
	public function agregarNoticiaModels($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, introduccion, url) VALUES (:nombre, :introduccion, :url)");

		$stmt -> bindParam(":nombre", $dato["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $dato["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $dato["url"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#Mostrar noticias agregadas
	#--------------------------------
	public function mostrarNoticiasModels($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, introduccion, url FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#editar noticias
	#---------------------------------------
	public function editarNoticiaModels($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, introduccion = :introduccion, url = :url WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datos["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $datos["url"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#eliminar noticias
	#---------------------------------------------
	public function eliminarNoticiaModels($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $dato, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}
	

}