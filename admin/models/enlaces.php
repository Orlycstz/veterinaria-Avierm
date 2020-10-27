<?php

/**
 * 
 */
class EnlacesModel{
	
	public function enlacesPaginaModel($enlaces){
		
		if($enlaces == "inicio" ||
	       $enlaces == "ingreso" ||
	       $enlaces == "noticia" ||
	       $enlaces == "articulos" ||
	       $enlaces == "reservar" ||
		   $enlaces == "galeria" ||
		   $enlaces == "registro" ||
		   $enlaces == "recuperarContrasena" ||
		   $enlaces == "nuevacontrasena" ||
		   $enlaces == "videos" ||
		   $enlaces == "vacunas" ||
	       $enlaces == "historiamedica" ||
	       $enlaces == "mensajes" ||
	       $enlaces == "perfil" ||
	       $enlaces == "salir" ||
	   	   $enlaces == "vacunasConsulta"){

				$module = "views/modules/".$enlaces.".php";
			
			}else if($enlaces == "index"){
			
				$module = "views/modules/ingreso.php";
			
			}else{
			
				$module = "views/modules/ingreso.php";
			
			}

			return $module;

	}
} //fin de la clase