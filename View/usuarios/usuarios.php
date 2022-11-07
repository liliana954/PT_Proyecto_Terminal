<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="/Styles/tabla_estilos.css" type="text/css" />
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

		<div class="">
			<h2 class="centrar-titulo"><?php echo $data["titulo"]; ?></h2>

			<div class="seccion-busqueda">
				<div class="barra-busqueda">
					<label for="Filtrar" class="label-buscar"> Buscar: </label>
					<input type="text" class="input-buscar-texto" id="myInput" onkeyup="myFunction()" placeholder="Filtro por id">
				</div>
			</div>
			
			<div class="seccion-solicitud">
				<div class="texto-solicitud">
					<h3> Generar una nueva solicitud</h3>
				</div>
				<div class="btn-crear-solicitud">
					<a href="index2.php?c=usuarios&a=nuevo">Agregar</a>
				</div>
			</div>
			
			<br />
			<br />
			<div class="contenedor-tabla">
				<table border="1" width="80%" class="tablita" id="myTable">
					<thead>
						<tr class="">
							<th>id</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Tipo de usuario</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($data["usuarios"] as $dato) {
							echo "<tr>";
							echo "<td>".$dato["id_usuario"]."</td>";
							echo "<td>".$dato["nombre_usuario"]."</td>";
							echo "<td>".$dato["contra_usuario"]."</td>";
							echo "<td>".$dato["descripcion"]."</td>";
							echo "<td><a href='index2.php?c=usuarios&a=modificar&id=".$dato["id_usuario"]."' class='#'> <img src='/Utileria/Iconos/edit.png'> </a></td>";
							echo "<td><a href='index2.php?c=usuarios&a=eliminar&id=".$dato["id_usuario"]."' class='#'> <img src='/Utileria/Iconos/delete.png'> </a></td>";
							echo "</tr>";
						}
						?>
					</tbody>
					
				</table>

				
			</div>
		</div>
	<script>
		function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>
	</body>
</html>