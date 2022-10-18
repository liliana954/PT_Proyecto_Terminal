<?php
	
	class UsuariosController {
		
		public function __construct(){
			require_once "Models/UsuariosModel.php";
		}
		
		public function index(){
			$usuarios = new Usuarios_model();
			$data["titulo"] = "Usuarios";
            // Se manda a gamar al metodo get del model
			$data["usuarios"] = $usuarios->get_usuarios();
			
            // Se manda a llamar a la vista de usuarios - la tabla
			require_once "View/usuarios/usuarios.php";	
		}

		// Si se agrega un nuevo usuario, se hace uso de este metodo y se abre la vista
		public function nuevo(){
			$data["titulo"] = "Usuarios";
			require_once "View/usuarios/usuarios_crear.php";
		}
		
        // Obtiene los datos del formulario y los guarda en la bd
		public function guarda(){
            // Las variables de la izquierda es la que obtienen el valor
            // Las variables que vienen con el POST son las que se enviaron desde el formulario
			$nombre_usuario = $_POST['nombre_usuario'];
			$contra_usuario = $_POST['contra_usuario'];
			$id_tipo_usuario = $_POST['id_tipo_usuario'];
			
			$usuarios = new Usuarios_model();
            // Parametros que se guardaran de los usuarios
			$usuarios->insertar($nombre_usuario, $contra_usuario, $id_tipo_usuario);
			$data["titulo"] = "Usuarios";
			$this->index();
		}
		
        // Modifica los datos del id usuario especificado
		public function modificar($id_usuario){
			
			$usuarios = new Usuarios_model();
			
			$data["id_usuario"] = $id_usuario;
            // Consulta el usuario con ese id
			$data["usuarios"] = $usuarios->get_usuarios_especifico($id_usuario);
			$data["titulo"] = "Usuarios";
			require_once "View/usuarios/usuarios_modificar.php";
		}
		

        // Actualiza la tabla con los datos recien modificados
		public function actualizar(){
			
            $id_usuario = $_POST['id_usuario'];
			$nombre_usuario = $_POST['nombre_usuario'];
			$contra_usuario = $_POST['contra_usuario'];
			$id_tipo_usuario = $_POST['id_tipo_usuario'];

			$usuarios = new Usuarios_model();
			$usuarios->modificar($id_usuario, $nombre_usuario, $contra_usuario, $id_tipo_usuario);
			$data["titulo"] = "Usuarios";
			$this->index();
		}
		
		public function eliminar($id_usuario){
			
			$usuarios = new Usuarios_model();
			$usuarios->eliminar($id_usuario);
			$data["titulo"] = "Usuarios";
			$this->index();
		}	
	}
?>