<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=65.19.141.67;dbname=itz_deliroll","itz_admin2","admindeliroll");
		return $link;

	}

}
