<?php
    session_start();
    
    // Solo acepta estos usuarios
    
    if ($_SESSION['usuarioAdmin'] == "UsuAdm" 
	|| $_SESSION['usuarioEmp'] == "UsuEmp" 
	|| $_SESSION['usuPruebas'] == "UsuPru" ) {
            echo "Ingreso correctamente";
    } else {
        echo "<script>alert(' ERROR: Estas intentando ingresar sin permisos de usuario ');</script>";
        echo "<script>location.href='../View/login.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css" type="text/css" />
    <title>Administracion</title>
</head>
<body>
        <!--Barra de navegacion-->
        <nav class="pantalla-completa">
            <div class="pantalla-mitad centrar-contenido-unico fondo-blanco borde-derecho-amarillo borde-inferior-azul">
                <img src="/Utileria/Imagenes/mini_logo.jpeg" alt="Logo">
            </div>
            
            <div class="pantalla-mitad centrar-contenido-navbar"> 
                <a href="/empleadosView.php">Empleados</a>
                <a href="/index2.php">Usuarios</a>
                <a href="/Controllers/cerrarSesion.php"> Cerrar sesion </a>
            </div>
        </nav>


        <section style="display:flex; justify-content:center; align-items: center; width:100%;">
            <h1> Esta seccion se encuentra en construccion, selecciona alguna de las opciones de la barra de navegacion</h1>
        </section>
</body>
</html>