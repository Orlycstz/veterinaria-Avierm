<?php

/**
 * 
 */
class Galeria{
	
 	#mostrar galerias
 	public function mostrarGaleria(){

 		$respuesta = GaleriaModel::mostrarGaleriaModel("galeria");

 		foreach ($respuesta as $row => $item) {
 			echo '<div class="info-pet">
                    	<img src="admin/'.substr($item["ruta"], 6).'" alt="">
                  </div>';
 		}

 	}

}