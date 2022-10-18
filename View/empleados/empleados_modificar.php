<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="#">
	</head>
	
	<body>
		<div class="">
			<h2><?php echo $data["titulo"]; ?></h2>
			<!-- Se manda a llamar al metodo guarda , y el id del form es nuevo-->
			
			<form id="nuevo" name="nuevo" method="POST" action="empleadosView.php?c=empleados&a=actualizar" autocomplete="off">
				<input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $data["id_empleado"]; ?>" />
			
			
				<div class="#">
					<label for="nombre">Nombres empleado</label>
					<input type="text" class="#" id="nombre" name="nombre" value="<?php echo $data["empleados"]["nombre"]?>" />
				</div>
				
				<div class="#">
					<label for="apellido_paterno">Apellido Paterno</label>
					<input type="text" class="#" id="apellido_paterno" name="apellido_paterno" value="<?php echo $data["empleados"]["apellido_paterno"]?>" />
				</div>
				
                <div class="#">
					<label for="apellido_materno">Apellido materno</label>
					<input type="text" class="#" id="apellido_materno" name="apellido_materno" value="<?php echo $data["empleados"]["apellido_materno"]?>" />
				</div>

                <div class="#">
					<label for="rfc">RFC</label>
					<input type="text" class="#" id="rfc" name="rfc" value="<?php echo $data["empleados"]["rfc"]?>" />
				</div>

                <div class="#">
					<label for="curp">CURP</label>
					<input type="text" class="#" id="curp" name="curp" value="<?php echo $data["empleados"]["curp"]?>" />
				</div>

                <div class="#">
					<label for="telefono">Telefono</label>
					<input type="text" class="#" id="telefono" name="telefono" value="<?php echo $data["empleados"]["telefono"]?>" />
				</div>

                <div class="#">
					<label for="correo">Correo</label>
					<input type="text" class="#" id="correo" name="correo" value="<?php echo $data["empleados"]["correo"]?>" />
				</div>

                <div class="#">
					<label for="fecha_ingreso">Fecha ingreso</label>
					<input type="text" class="#" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $data["empleados"]["fecha_ingreso"]?>" />
				</div>

                <!-- select de activo / inactivo  -->
				<div class="#">
					<label for="activo">Activo</label>
					<input type="text" class="#" id="activo" name="activo" value="<?php echo $data["empleados"]["activo"]?>" />
				</div>

                <!-- select de rol de empleado  -->
                <div class="#">
					<label for="id_rol_empleado">id rol empleado</label>
					<input type="text" class="#" id="id_rol_empleado" name="id_rol_empleado" value="<?php echo $data["empleados"]["id_rol_empleado"]?>" />
				</div>

                <!-- select de id usuario  -->
                <div class="#">
					<label for="id_usuario">id usuario</label>
					<input type="text" class="#" id="id_usuario" name="id_usuario" value="<?php echo $data["empleados"]["id_usuario"]?>" />
				</div>
				
				<button id="guardar" name="guardar" type="submit" class="#">Guardar</button>
				
			</form>
		</div>
	</body>
</html>