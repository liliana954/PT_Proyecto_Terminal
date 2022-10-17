<?php
	
	class Empleados_model {
		
		private $db;
		private $empleados;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->empleados = array();
		}
		
		public function get_empleados()
		{
			$sql = "SELECT * FROM empleado";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->empleados[] = $row;
			}
			return $this->empleados;
		}
		
        // No se incluye el idEmpleado por que es autoincrementable
		public function insertar($nombre, $apellido_paterno, $apellido_materno,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario){
			
			$resultado = $this->db->query("INSERT INTO empleado 
            (nombre, 
            apellido_paterno, 
            apellido_materno,
            rfc,
            curp,
            telefono,
            correo,
            fecha_ingreso,
            activo,
            id_rol_empleado,
            id_usuario) 
            VALUES 
            ('$nombre', 
            '$apellido_paterno', 
            '$apellido_materno',
            '$rfc',
            '$curp',
            '$telefono',
            '$correo',
            '$fecha_ingreso',
            '$activo',
            '$id_rol_empleado',
            '$id_usuario')");
			
		}
		
		public function modificar($id_empleado, $nombre, $apellido_paterno, $apellido_materno,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario){
			
			$resultado = $this->db->query("UPDATE empleado 
            SET nombre='$nombre', 
            apellido_paterno='$apellido_paterno', 
            apellido_materno='$apellido_materno',
            rfc='$rfc',
            curp='$curp',
            telefono='$telefono',
            correo='$correo',
            fecha_ingreso='$fecha_ingreso',
            activo='$activo',
            id_rol_empleado='$id_rol_empleado',
            id_usuario='$id_usuario'=' 
            WHERE id_empleado = '$id_empleado'");			
		}
		
		public function eliminar($id_empleado){
			
			$resultado = $this->db->query("DELETE FROM empleado WHERE id_empleado = '$id_empleado'");
			
		}
		
		public function get_empleados($id_empleado)
		{
			$sql = "SELECT * FROM empleado WHERE id_empleado='$id_empleado' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>