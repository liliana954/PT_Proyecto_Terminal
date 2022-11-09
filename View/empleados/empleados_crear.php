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
		<!-- Se manda a llamar al archivo que contien la validacion de los controller -->
		<form id="nuevo" name="nuevo" method="POST" action="empleadosView.php?c=empleados&a=guarda" autocomplete="off">
			<div class="#">
				<label for="nombre">Nombres empleado</label>
				<input type="text" class="#" id="nombre" name="nombre" />
			</div>

			<div class="#">
				<label for="apellido_paterno">Apellido Paterno</label>
				<input type="text" class="#" id="apellido_paterno" name="apellido_paterno" />
			</div>

			<div class="#">
				<label for="apellido_materno">Apellido materno</label>
				<input type="text" class="#" id="apellido_materno" name="apellido_materno" />
			</div>

			<div class="#">
				<label for="rfc">RFC</label>
				<input type="text" class="#" id="rfc" name="rfc" />
			</div>

			<div class="#">
				<label for="curp">CURP</label>
				<input type="text" class="#" id="curp" name="curp" />
			</div>

			<div class="#">
				<label for="telefono">Telefono</label>
				<input type="phone" class="#" id="telefono" name="telefono" />
			</div>

			<div class="#">
				<label for="correo">Correo</label>
				<input type="email" class="#" id="correo" name="correo" />
			</div>

			<div class="#">
				<label for="fecha_ingreso">Fecha ingreso</label>
				<input type="date" class="#" id="fecha_ingreso" name="fecha_ingreso" />
			</div>

			<!-- select de activo / inactivo  -->
			<div>
				<label for="activo">Estatus</label>
				<select name="activo">
					<option value="true" selected>Activo</option>
					<option value="false">Inactivo </option>
				</select>
			</div>


			<!-- select de rol de empleado  -->
			<div>
				<label for="id_rol_empleado">Rol del empleado</label>
				<select name="id_rol_empleado">
					<option value="1" selected>Desarrollador BackEnd</option>
					<option value="2">Desarrollador FrontEnd </option>
					<option value="3">Desarrollador Full Stack</option>
					<option value="4">Ingeniero de servicios</option>
				</select>
			</div>

			<!-- select de id usuario  CONSULTAR LOS ID USUARIOS Y MOSTRARLOS EN EL SELECT-->
			

			<div class="#">
				<label for="id_usuario">Ingresa un id de usuario</label>
				<input type="text" id="id_usuario" name="id_usuario"/>
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