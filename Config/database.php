<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "siatechm", "DesarrolloSiatech2022", "siatechm_siatechmx");
			return $conexion;
			
		}
	}
?>