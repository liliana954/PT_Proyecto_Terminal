<?php
	session_start();
	require_once "Config/config.php";
	require_once "core/routes.php";
	require_once "Config/database.php";
	require_once "Controllers/Usuarios.php";
	
	// Se verifica que tenga los permisos de usuario administrador, antes de entrar al agregar, modificar, eliminar
	if ($_SESSION['usuarioAdmin'] == "UsuAdm") {
		
		if(isset($_GET['c'])){
		
			$controlador = cargarControlador($_GET['c']);
			
			if(isset($_GET['a'])){
				if(isset($_GET['id'])){
					cargarAccion($controlador, $_GET['a'], $_GET['id']);
					} else {
					cargarAccion($controlador, $_GET['a']);
					}
				} else {
				cargarAccion($controlador, PAGINA_PRINCIPAL);
					}
			} else {
			
			$controlador = cargarControlador(SECCION_USUARIOS);
			$accionTmp = PAGINA_PRINCIPAL;
			$controlador->$accionTmp();
		}


    } else {
		unset($_SESSION['usuarioAdmin']);
		unset($_SESSION['usuarioEmp']);
		unset($_SESSION['usuPruebas']);
		session_destroy();
        echo "<script>alert(' ERROR: Estas intentando ingresar sin permisos de usuario ');</script>";
        echo "<script>location.href='../View/login.php';</script>";
    }


	
?>