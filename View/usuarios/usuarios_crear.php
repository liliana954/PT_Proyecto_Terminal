<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		<?php echo $data["titulo"]; ?>
	</title>
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
		
		<!-- Se manda a llamar al metodo guarda , y el id del form es nuevo-->
		<!-- en el action poner la ruta al controlador -->
		<form id="nuevo" name="nuevo" method="POST" action="index2.php?c=usuarios&a=guarda" autocomplete="off">
			<div class="#">
				<label for="nombre_usuario">Nombre Usuario</label>
				<input type="text" class="#" id="nombre_usuario" name="nombre_usuario" pattern="^([a-zA-Z0-9]{4,10})$" title="Debe ser alfanumerico, minimo 4 y maximo 10 caracteres" required/>
			</div>

			<div class="#">
				<label for="contra_usuario">Contrasena</label>
				<input type="text" class="#" id="contra_usuario" name="contra_usuario" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Minimo 8 caracteres debe tener una mayuscula, una minuscula, y un número" required/>
			</div>

			<div>
				<label for="id_tipo_usuario">Tipo de usuario</label>
				<select name="id_tipo_usuario">
					<option value="1">Administrador</option>
					<option value="2" selected >Empleado </option>
					<option value="3">Pruebas</option>
				</select>
			</div>

			<div class="seccion-botones">
				<button id="guardar" name="guardar" type="submit" class="boton-guardar">Guardar</button>
				<button type="reset" class="boton-limpiar"> Limpiar </button>
				<button type="button" class="boton-cancelar"> Cancelar </button>
			</div>
		</form>
	</div>
</body>

</html>