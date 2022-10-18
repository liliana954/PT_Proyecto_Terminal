<?php
	
	class Usuarios_model {
		
		private $db;
		private $usuarios;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}
		
		public function get_usuarios()
		{
			$sql = "SELECT * FROM usuario";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->usuarios[] = $row;
			}
			return $this->usuarios;
		}
		
        // No se incluye el idUsuario por que es autoincrementable
		public function insertar($nombre_usuario, $contra_usuario, $id_tipo_usuario){
			
			$resultado = $this->db->query("INSERT INTO usuario 
            (nombre_usuario, contra_usuario, id_tipo_usuario) 
            VALUES 
            ('$nombre_usuario', '$contra_usuario', '$id_tipo_usuario')");
			
		}
		
		public function modificar($idUsuario, $nombre_usuario, $contra_usuario, $id_tipo_usuario){
			
			$resultado = $this->db->query("UPDATE usuario 
            SET nombre_usuario='$nombre_usuario', contra_usuario='$contra_usuario', id_tipo_usuario='$id_tipo_usuario'=' 
            WHERE id_usuario = '$idUsuario'");			
		}
		
		public function eliminar($idUsuario){
			
			$resultado = $this->db->query("DELETE FROM usuario WHERE id_usuario = '$idUsuario'");
			
		}
		
		/*
		public function get_usuarios($idUsuario)
		{
			$sql = "SELECT * FROM usuario WHERE id_usuario='$idUsuario' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
		*/
	} 
?>