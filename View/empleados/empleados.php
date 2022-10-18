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
			
			<a href="empleadosView.php?c=empleados&a=nuevo" class="#">Agregar</a>
			
			<br />
			<br />
			<div class="">
				<table border="1" width="80%" class="">
					<thead>
						<tr class="">
							<th>id_empleado</th>
							<th>nombre</th>
							<th>apellido_paterno</th>
							<th>apellido_materno</th>
                            <th>rfc</th>
							<th>curp</th>
							<th>telefono</th>
							<th>correo</th>
                            <th>fecha_ingreso</th>
							<th>activo</th>
                            <th>id_rol_empleado</th>
							<th>id_usuario</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($data["empleados"] as $dato) {
							echo "<tr>";
							echo "<td>".$dato["id_empleado"]."</td>";
							echo "<td>".$dato["nombre"]."</td>";
							echo "<td>".$dato["apellido_paterno"]."</td>";
							echo "<td>".$dato["apellido_materno"]."</td>";
                            echo "<td>".$dato["rfc"]."</td>";
                            echo "<td>".$dato["curp"]."</td>";
                            echo "<td>".$dato["telefono"]."</td>";
                            echo "<td>".$dato["correo"]."</td>";
                            echo "<td>".$dato["fecha_ingreso"]."</td>";
                            echo "<td>".$dato["activo"]."</td>";
                            echo "<td>".$dato["id_rol_empleado"]."</td>";
                            echo "<td>".$dato["id_usuario"]."</td>";
							echo "<td><a href='empleadosView.php?c=empleados&a=modificar&id_empleado=".$dato["id_empleado"]."' class='#'>Modificar</a></td>";
							echo "<td><a href='empleadosView.php?c=empleados&a=eliminar&id_empleado=".$dato["id_empleado"]."' class='#'>Eliminar</a></td>";
							echo "</tr>";
						}
						?>
					</tbody>
					
				</table>
			</div>
		</div>
	</body>
</html>