<?php

	class Conect{

		static public function conectar(){

			$link=new PDO("mysql:host=localhost;dbname=alarms_db","root","");
			$link->exec("set names utf8");
			return $link;

			
		}
		
		
	}

?>