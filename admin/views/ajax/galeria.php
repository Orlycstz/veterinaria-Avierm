<?php

require_once "../../controllers/gestorGaleria.php";
require_once "../../models/gestorGaleria.php";

/**
 * 
 */
class Ajax{
	
	#subir la imagen a la galeria
	public $imagenTemporal;

	public function gestorGaleriaAjax(){
		$datos = $this->imagenTemporal;

		$respuesta = gestorGaleria::mostrarImagenGaleria($datos);
	}

	public $idGaleria;
	public $rutaGaleria;

	public function eliminarGaleriaAjax(){

		$datos = array("idGaleria" => $this->idGaleria,
					   "ruta" => $this->rutaGaleria);

		$respuesta = gestorGaleria::eliminarGaleriaController($datos);
	}
}

#objetos
#-----------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorGaleriaAjax();
}

if(isset($_POST["idGaleria"])){

	$b = new Ajax();
	$b -> idGaleria = $_POST["idGaleria"];
	$b -> rutaGaleria = $_POST["rutaGaleria"];
	$b -> eliminarGaleriaAjax();
}