<?php

/**
 * 
 */

require_once "../../controllers/gestorArticulos.php";
require_once "../../models/gestorArticulos.php";

class ArticuloAjax{
	
	public $imagenTemporal;

	public function gestorArticulosAjax(){
		
		$datos = $this->imagenTemporal;

		$respuesta = Articulo::MostrarArticuloController($datos);

		echo $respuesta;

	}
}

//OBJETOS

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new ArticuloAjax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorArticulosAjax();

}