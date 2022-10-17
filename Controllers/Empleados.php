<?php
	
	class UsuariosController {
		
		public function __construct(){
			require_once "models/EmpleadosModel.php";
		}
		
		public function index(){
			$empleados = new Empleados_model();
			$data["titulo"] = "Empleado";
            // Se manda a gamar al metodo get del model
			$data["empleado"] = $empleado->get_empleados();
            // Se manda a llamar a la vista de usuarios - la tabla
			require_once "views/empleados/empleados.php";	
		}

		// Si se agrega un nuevo usuario, se hace uso de este metodo y se abre la vista
		public function nuevo(){
			$data["titulo"] = "Empleado";
			require_once "views/empleados/empleados_crear.php";
		}
		
        // Obtiene los datos del formulario y los guarda en la bd
		public function guarda(){
            // Las variables de la izquierda es la que obtienen el valor
            // Las variables que vienen con el POST son las que se enviaron desde el formulario
			$nombre = $_POST['nombre'];
			$apellido_paterno = $_POST['apellido_paterno'];
            $apellido_materno = $_POST['apellido_materno'];
			$rfc = $_POST['rfc'];
			$curp = $_POST['curp'];
            $telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$fecha_ingreso = $_POST['fecha_ingreso'];
            $activo = $_POST['activo'];
			$id_rol_empleado = $_POST['id_rol_empleado'];
			$id_usuario = $_POST['id_usuario'];
			
			$empleados = new Empleados_model();
            // Parametros que se guardaran de los usuarios
			$empleados->insertar($nombre, $apellido_paterno, $apellido_materno
              ,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario);
			$data["titulo"] = "Empleados";
			$this->index();
		}
		
        // Modifica los datos del id usuario especificado
		public function modificar($id_empleado){
			
			$usuarios = new Usuarios_model();
			
			$data["id_empleado"] = $id_empleado;
            // Consulta el usuario con ese id
			$data["empleados"] = $empleados->get_empleados($id_empleado);
			$data["titulo"] = "Empleados";
			require_once "views/empleados/empleados_modificar.php";
		}
		

        // Actualiza la tabla con los datos recien modificados
		public function actualizar(){

			$id_empleado = $_POST['id_empleado'];
			$nombre = $_POST['nombre'];
			$apellido_paterno = $_POST['apellido_paterno'];
            $apellido_materno = $_POST['apellido_materno'];
			$rfc = $_POST['rfc'];
			$curp = $_POST['curp'];
            $telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$fecha_ingreso = $_POST['fecha_ingreso'];
            $activo = $_POST['activo'];
			$id_rol_empleado = $_POST['id_rol_empleado'];
			$id_usuario = $_POST['id_usuario'];

			$empleados = new Usuarios_model();
			$empleados->modificar($id_empleado, $nombre, $apellido_paterno, $apellido_materno
            ,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario);
			$data["titulo"] = "Empleados";
			$this->index();
		}
		
		public function eliminar($id_empleado){
			$empleados = new Empleados_model();
			$empleados->eliminar($id_empleado);
			$data["titulo"] = "Empleados";
			$this->index();
		}	
	}
?>