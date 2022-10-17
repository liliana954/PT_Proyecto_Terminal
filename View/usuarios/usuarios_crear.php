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
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=usuarios&a=guarda" autocomplete="off">
				<div class="#">
					<label for="nombreUsuario">Nombre Usuario</label>
					<input type="text" class="#" id="nombreUsuario" name="nombreUsuario" />
				</div>
				
				<div class="#">
					<label for="contra_usuario">Contrasena</label>
					<input type="text" class="#" id="contra_usuario" name="contra_usuario" />
				</div>
				
                <!-- Es un select de opciones -->
				<div class="#">
					<label for="id_tipo_usuario">Tipo usuario</label>
					<input type="text" class="#" id="id_tipo_usuario" name="id_tipo_usuario" />
				</div>
				
				<button id="guardar" name="guardar" type="submit" class="#">Guardar</button>
				
			</form>
		</div>
	</body>
</html>