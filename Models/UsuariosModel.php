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
			$sql = "SELECT * FROM usuario INNER JOIN tipo_usuario WHERE usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->usuarios[] = $row;
			}
			return $this->usuarios;
		}
		
        // No se incluye el id_usuario por que es autoincrementable
		public function insertar($nombre_usuario, $contra_usuario, $id_tipo_usuario){
			
			$resultado = $this->db->query("INSERT INTO usuario 
            (nombre_usuario, contra_usuario, id_tipo_usuario) 
            VALUES 
            ('$nombre_usuario', '$contra_usuario', '$id_tipo_usuario')");
			
		}
		
		public function modificar($id_usuario, $nombre_usuario, $contra_usuario, $id_tipo_usuario){
			
			$resultado = $this->db->query("UPDATE usuario SET nombre_usuario='$nombre_usuario',contra_usuario='$contra_usuario',id_tipo_usuario='$id_tipo_usuario' WHERE id_usuario = '$id_usuario'");			
		}
		
		public function eliminar($id_usuario){
			
			$resultado = $this->db->query("DELETE FROM usuario WHERE id_usuario = '$id_usuario'");
			
		}
		
		
		public function get_usuarios_especifico($id_usuario)
		{
			$sql = "SELECT * FROM usuario WHERE id_usuario='$id_usuario' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
		
	} 
?>