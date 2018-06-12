<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=65.19.141.67;dbname=itz_deliroll","itz_admin","admindeliroll");
		return $link;

	}

}