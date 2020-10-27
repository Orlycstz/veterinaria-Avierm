<?php

/**
 * 
 */

require_once "../../controllers/gestorNoticia.php";
require_once "../../models/gestorNoticia.php";

class NoticiaAjax{
	
	public $imagenTemporal;

	public function gestorNoticiaAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = Noticia::subirImagen($datos);

		echo $respuesta;

	}

}

//OBJETOS

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new NoticiaAjax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorNoticiaAjax();

}