<?php
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="#">
		<link rel="stylesheet" href="/Styles/estilos_formulario.css">

	</head>
	
	<body>
		<nav class="pantalla-completa">
            <div class="pantalla-mitad centrar-contenido-unico fondo-blanco borde-derecho-amarillo borde-inferior-azul">
                <img src="/Utileria/Imagenes/mini_logo.jpeg" alt="Logo">
            </div>
            
            <div class="pantalla-mitad centrar-contenido-navbar"> 
                <a href="/empleadosView.php">Empleados</a>
                <a href="/index2.php">Usuarios</a>
                <a href="../../Controllers/cerrarSesion.php" disabled> Cerrar sesion </a>
            </div>
        </nav>

		<h2 class="centrar-titulo"><?php echo $data["titulo"]; ?></h2>
		<div class="contenedor-formulario">
			
			
			
			<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=usuarios&a=actualizar" autocomplete="off">
				
				<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $data["id_usuario"]; ?>" />
				
				<div class="#">
					<label for="nombre_usuario">Nombre usuario</label>
					<input type="text" class="#" id="nombre_usuario" name="nombre_usuario" value="<?php echo $data["usuarios"]["nombre_usuario"]?>" />
				</div>
				
				<div class="#">
					<label for="contra_usuario">Contrasena</label>
					<input type="text" class="#" id="contra_usuario" name="contra_usuario" value="<?php echo $data["usuarios"]["contra_usuario"]?>" />
				</div>
			
				<?php
                    if($data["usuarios"]["id_tipo_usuario"] == 1) {
						$variableMuestra = "Administrador";
                    }
                    else if ($data["usuarios"]["id_tipo_usuario"] == 2) {
						$variableMuestra = "Empleado";
                    } 
                    else if ($data["usuarios"]["id_tipo_usuario"] == 3) {
						$variableMuestra = "Pruebas";
                    } ?>
				<div>
				<label for="id_tipo_usuario">Selecciona tipo de usuario</label>
				<label for="tipo_actual">Tipo actual :  <?php echo $variableMuestra; ?> </label>
				<select name="id_tipo_usuario" id="id_tipo_usuario" name="id_tipo_usuario" class="#"
				aria-label="select example">
					<option value="1"> Administrador </option>
                    <option value="2" selected> Empleado </option>
                    <option value="3"> Pruebas </option>
					</select>
				</div>
				
				<div class="seccion-botones">
					<button id="guardar" name="guardar" type="submit" class="boton-guardar">Guardar</button>
					<button type="reset" class="boton-limpiar"> Limpiar </button>
					<button type="button" class="boton-cancelar"> Cancelar </button>
				</div>
			</form>
		</body>
	</html>		