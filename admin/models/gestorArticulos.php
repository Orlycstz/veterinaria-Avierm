<?php

/**
 * 
 */

require_once "conexion.php";

class ArticuloModel{
	
	#guardar articulos
	#--------------------------------------------------
	public function guardarArticuloModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, precio, cantidad, ruta) VALUES (:nombre, :descripcion, :precio, :cantidad, :ruta)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#editar articulo admin
	#-------------------------------------------
	public function EditarArticuloAdminModels($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, ruta = :ruta WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#eliminar articulo admin
	#-------------------------------------------
	public function eliminarArticuloAdminModel($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $dato, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#mostrar articulos
	#--------------------------------------------------
	public function mostrarArticulosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, descripcion, cantidad, precio, ruta FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#guardar reserva
	#-------------------------------------------------
	public function guardarRerservaModels($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, precio, cedula, cantidadreserva, idarticulo) VALUES (:nombre, :descripcion, :precio, :cedula, :cantidadreserva, :idarticulo)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":cantidadreserva", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":idarticulo", $datos["idarticulo"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#actualizar cantidad del articulo
	#------------------------------------
	public function actualizarArticuloModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":cantidad", $datos["cantidadactualizada"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}

	#mostrar articulos reservados
	#----------------------------------------
	public function mostrarArticulosReservadosModel($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id,nombre, descripcion, precio, cedula, cantidadreserva, idarticulo FROM $tabla WHERE cedula = :cedula");

		$stmt -> bindParam(":cedula", $dato, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#Busca la cantidad del articulo seleccionado
	#------------------------------------------
	public function buscarCantidadArticulo($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cantidad FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $dato, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#Busca la cantidad del articulo reservado
	#------------------------------------------
	public function buscarCantidadReserva($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cantidadreserva FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $dato, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#Eliminar reserva
	#--------------------------------------------
	public function EliminarReservaArticuloModel($dato, $tabla){

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