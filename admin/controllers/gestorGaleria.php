<?php

/**
 * 
 */
class gestorGaleria{
	
	public function mostrarImagenGaleria($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho > 1024 || $alto > 768){
			echo 0;
		}else{

			$aleatorio = mt_rand(100,999);
			$ruta = "../../views/images/galeria/galeria".$aleatorio.".jpg";

			$nuevo_ancho = 700;
			$nuevo_alto = 600;

			$origen = imagecreatefromjpeg($datos);

			$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

			imagejpeg($destino, $ruta);

			gestorGaleriaModel::subirImagenGaleriaModel($ruta, "galeria");

			$respuesta = gestorGaleriaModel::mostrarImagenGaleriaModel($ruta, "galeria");

			echo $respuesta["ruta"];
		}
	}

	#mostrar imagen de la galeria

	public function mostrarImagenVistaController(){

		$respuesta = gestorGaleriaModel::mostrarImagenVistaModel("galeria");

		foreach ($respuesta as $row => $item) {
			echo '<li id="'.$item["id"].'" class="bloqueGaleria">
					<span class="fa fa-times eliminarFoto" ruta="'.$item["ruta"].'"></span>
					<a rel="grupo" href="'.substr($item["ruta"], 6).'">
					<img src="'.substr($item["ruta"], 6).'" class="handleImg">
					</a>
				</li>';
		}	
	}

	#eliminar galeria

	public function eliminarGaleriaController($datos){

		$respuesta = gestorGaleriaModel::eliminarGaleriaModel($datos, "galeria");
		unlink($datos["ruta"]);
		echo $respuesta;

	}

}