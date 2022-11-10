<?php
	
	class  EmpleadosController {
		
		public function __construct(){
			require_once "Models/EmpleadosModel.php";
		}
		
		public function index(){
			$empleados = new Empleados_model();
			$data["titulo"] = "Empleados";
            // Se manda a gamar al metodo get del model
			$data["empleados"] = $empleados->get_empleados();
            // Se manda a llamar a la vista de empleados - la tabla
			require_once "View/empleados/empleados.php";	
		}

		// Si se agrega un nuevo usuario, se hace uso de este metodo y se abre la vista
		public function nuevo(){
			$data["titulo"] = "Empleados";
			require_once "View/empleados/empleados_crear.php";
		}
		
        // Obtiene los datos del formulario y los guarda en la bd
		public function guarda(){
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
			
			// VALIDACIONES
			if (empty($nombre) && empty($apellido_paterno) && empty($apellido_materno) && empty($rfc) && empty($curp) && empty($telefono) && empty($correo)) {
				echo "<script>alert('ERROR: Los campos no pueden estar vacios');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (empty($nombre) || empty($apellido_paterno) || empty($apellido_materno) || empty($rfc) || empty($curp) || empty($telefono) || empty($correo)) {
				echo "<script>alert('ERROR: Un campo esta vacio');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$nombre)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$apellido_paterno)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			}else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$apellido_materno)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([0-9]{7,12})+$/",$telefono)) {
				echo "<script>alert('ERROR: solo se aceptan numeros, maximo 12 digitos');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",$correo)) {
				echo "<script>alert('ERROR: El formato del correo es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";	
			} else if (!preg_match("/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/", $rfc)) {
				echo "<script>alert('ERROR: el RFC ingresado es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/", $curp)) {
				echo "<script>alert('ERROR: el CURP ingresado es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else {
				$empleados = new Empleados_model();
				// Parametros que se guardaran de los usuarios
				$empleados->insertar($nombre, $apellido_paterno, $apellido_materno
				,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario);
				$data["titulo"] = "Empleados";
				echo "<script>alert('Se guardo correctamente');</script>";
				$this->index();
			}

		}
		
        // Modifica los datos del id usuario especificado
		public function modificar($id_empleado){
			
			$empleados = new Empleados_model();
			
			$data["id_empleado"] = $id_empleado;

            // Consulta el usuario con ese id
			$data["empleados"] = $empleados->get_empleados_especifico($id_empleado);
			$data["titulo"] = "Empleados";
			
			require_once "View/empleados/empleados_modificar.php";
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
			// VALIDACIONES
			if (empty($nombre) && empty($apellido_paterno) && empty($apellido_materno) && empty($rfc) && empty($curp) && empty($telefono) && empty($correo)) {
				echo "<script>alert('ERROR: Los campos no pueden estar vacios');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (empty($nombre) || empty($apellido_paterno) || empty($apellido_materno) || empty($rfc) || empty($curp) || empty($telefono) || empty($correo)) {
				echo "<script>alert('ERROR: Un campo esta vacio');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$nombre)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$apellido_paterno)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			}else if (!preg_match("/^([a-zA-Z ]{1,25})$/",$apellido_materno)) {
				echo "<script>alert('ERROR: solo puede contener letras, maximo 25 caracteres');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^([0-9]{7,12})+$/",$telefono)) {
				echo "<script>alert('ERROR: solo se aceptan numeros, maximo 12 digitos');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",$correo)) {
				echo "<script>alert('ERROR: El formato del correo es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";	
			} else if (!preg_match("/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/", $rfc)) {
				echo "<script>alert('ERROR: el RFC ingresado es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else if (!preg_match("/^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/", $curp)) {
				echo "<script>alert('ERROR: el CURP ingresado es incorrecto');</script>";
				echo "<script>location.href='../empleadosView.php';</script>";
			} else {
				$empleados = new Empleados_model();
				$empleados->modificar($id_empleado, $nombre, $apellido_paterno, $apellido_materno,$rfc, $curp, $telefono, $correo, $fecha_ingreso, $activo, $id_rol_empleado, $id_usuario);
				$data["titulo"] = "Empleados";
				echo "<script>alert('Se modifico correctamente');</script>";
				$this->index();
			}
		}
		
		public function eliminar($id_empleado){
			$empleados = new Empleados_model();
			$empleados->eliminar($id_empleado);
			$data["titulo"] = "Empleados";
			echo "<script>alert('Se elimino correctamente');</script>";
			$this->index();
		}	
	}
?>