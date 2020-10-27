<?php 

/**
 * 
 */
class Conexion{
	
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=veterinariaavierm", "root", "");
		return $link;
	}
}