<?php 

/**
 * 
 */
class Enlaces{
	
	public function enlacesController(){
		
		if(isset($_GET["action"])){
			$enlaces = $_GET["action"];
		}else{
			$enlaces = "index";
		}

		$respuesta = EnlacesModel::enlacesPaginaModel($enlaces);

		include $respuesta;

	}
}