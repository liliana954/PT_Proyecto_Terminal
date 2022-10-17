<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="#">

	</head>
	
	<body>
		<div class="#">
			
			<h2><?php echo $data["titulo"]; ?></h2>
			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=usuarios&a=actualizar" autocomplete="off">
				
				<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $data["id_usuario"]; ?>" />
				
				<div class="#">
					<label for="nombreUsuario">Nombre usuario</label>
					<input type="text" class="#" id="nombreUsuario" name="nombreUsuario" value="<?php echo $data["usuarios"]["nombreUsuario"]?>" />
				</div>
				
				<div class="#">
					<label for="contra_usuario">Contrasena</label>
					<input type="text" class="#" id="contra_usuario" name="contra_usuario" value="<?php echo $data["usuarios"]["contra_usuario"]?>" />
				</div>
				
				<div class="#">
					<label for="id_tipo_usuario">Tipo usuario</label>
					<input type="text" class="#" id="id_tipo_usuario" name="id_tipo_usuario" value="<?php echo $data["usuarios"]["id_tipo_usuario"]?>" />
				</div>
				
				
				<button id="guardar" name="guardar" type="submit" class="#">Guardar</button>
				
			</form>
		</body>
	</html>		