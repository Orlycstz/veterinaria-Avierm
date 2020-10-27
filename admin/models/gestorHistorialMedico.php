<?php 

/**
 * 
 */
class historiaMedicaModel{
	
	#agregar historial
	public function agregarHistorialModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombrea, cedula, tipoanimal, raza, peso, fechan, sexo, fechac, ultima, antecedentes, sintomas, diagnostico, tratamiento) VALUES (:nombrea, :cedula, :tipoanimal, :raza, :peso, :fechan, :sexo, :fechac, :ultima, :antecedentes, :sintomas, :diagnostico, :tratamiento)");

		$stmt -> bindParam(":nombrea", $datos["animal"], PDO::PARAM_STR);
		$stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipoanimal", $datos["tipoanimal"], PDO::PARAM_STR);
		$stmt -> bindParam(":raza", $datos["raza"], PDO::PARAM_STR);
		$stmt -> bindParam(":peso", $datos["peso"], PDO::PARAM_INT);
		$stmt -> bindParam(":fechan", $datos["fechan"], PDO::PARAM_STR);
		$stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechac", $datos["fechac"], PDO::PARAM_STR);
		$stmt -> bindParam(":ultima", $datos["ultima"], PDO::PARAM_STR);
		$stmt -> bindParam(":antecedentes", $datos["antecedentes"], PDO::PARAM_STR);
		$stmt -> bindParam(":sintomas", $datos["sintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt -> bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);
	
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	#visualizar historial medico
	public function visualizarHistorialMedica($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombrea, cedula, tipoanimal, raza, peso, fechan, sexo, fechac, ultima, antecedentes, sintomas, diagnostico, tratamiento FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#borrar historial medico
	public function borrarHistorialModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#editar historial medico
	public function editarHistorialMedico($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ultima = :ultima, antecedentes = :antecedentes, sintomas = :sintomas, diagnostico = :diagnostico, tratamiento = :tratamiento WHERE id = :id");

		$stmt -> bindParam(":ultima", $datos["ultima"], PDO::PARAM_STR);
		$stmt -> bindParam(":antecedentes", $datos["antecedentes"], PDO::PARAM_STR);
		$stmt -> bindParam(":sintomas", $datos["sintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":diagnostico", $datos["diagnostico"], PDO::PARAM_STR);
		$stmt -> bindParam(":tratamiento", $datos["tratamiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

	}

}