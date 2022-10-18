<?php
    // La finalidad de este documento es hacer la ruta que se debera seguir al llamar al controlador

    /**
     * Verifica que el controlador exista, pone la primera letra en mayusculas, sino existe llama al empleados
     * Parametro : Nombre del controller
     * Retorna : El controlador
     */

    function cargarControlador($controlador){
		
		$nombreControlador = ucwords($controlador)."Controller";
		$archivoControlador = 'Controllers/'.ucwords($controlador).'.php';
		
		if(!is_file($archivoControlador)){
			
			$archivoControlador= 'Controllers/'.SECCION_USUARIOS.'.php';
			
		}
		require_once $archivoControlador;
		$control = new $nombreControlador();
		return $control;
	}

    /***
     *  Metodo que se encarga de verificar  si el controller y metodo existen -- actualmente sin uso
     * Parametros entrada :
     *          Nombre del controlador
     *          Accion del controlador
     *          id del controlador
     */
	
	function cargarAccion($controller, $accion, $id = null){
		
		if(isset($accion) && method_exists($controller, $accion)){
			if($id != null){
				$controller->$accion();
				} else {
				$controller->$accion($id);
			}
			} else {
			$controller->PAGINA_PRINCIPAL();
		}	
	}


?>