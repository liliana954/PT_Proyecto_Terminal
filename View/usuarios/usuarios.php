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
			
			<a href="index.php?c=usuarios&a=crear" class="btn">Agregar</a>
			
			<br />
			<br />
			<div class="">
				<table border="1" width="80%" class="">
					<thead>
						<tr class="">
							<th>id_usuario</th>
							<th>nombreUsuario</th>
							<th>contra_usuario</th>
							<th>id_tipo_usuario</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($data["usuarios"] as $dato) {
							echo "<tr>";
							echo "<td>".$dato["id_usuario"]."</td>";
							echo "<td>".$dato["nombreUsuario"]."</td>";
							echo "<td>".$dato["contra_usuario"]."</td>";
							echo "<td>".$dato["id_tipo_usuario"]."</td>";
							echo "<td><a href='index.php?c=usuarios&a=modificar&id_usuario=".$dato["id_usuario"]."' class='btn'>Modificar</a></td>";
							echo "<td><a href='index.php?c=usuarios&a=eliminar&id_usuario=".$dato["id_usuario"]."' class='btn'>Eliminar</a></td>";
							echo "</tr>";
						}
						?>
					</tbody>
					
				</table>
			</div>
		</div>
	</body>
</html>