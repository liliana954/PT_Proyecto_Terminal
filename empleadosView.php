<?php
	session_start();
	require_once "Config/config.php";
	require_once "core/routes.php";
	require_once "Config/database.php";
	require_once "Controllers/Empleados.php";
	

	if ($_SESSION['usuarioAdmin'] == "UsuAdm" 
	|| $_SESSION['usuarioAdmin'] == "UsuEmp" 
	|| $_SESSION['usuarioAdmin'] == "UsuPru" ) {
		
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
			
			$controlador = cargarControlador(SECCION_EMPLEADOS);
			$accionTmp = PAGINA_PRINCIPAL;
			$controlador->$accionTmp();
		}
	} else {
		echo "<script>alert(' ERROR: Estas intentando ingresar sin permisos de usuario ');</script>";
		echo "<script>location.href='../View/login.php';</script>";
	}
?>