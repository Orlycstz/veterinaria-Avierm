<?php

/**
 * 
 */
class Noticia{
	
	#mostrar noticias
	public function mostrarNoticia(){

		$respuesta = NoticiaModel::mostrarNoticiaModel("noticia");

		foreach ($respuesta as $row => $item) {
			
			echo'<article>
		            <img src="admin/'.$item["url"].'" alt="">
		            <h4>'.$item["nombre"].'</h4>
		        </article>';

		}

	}

}