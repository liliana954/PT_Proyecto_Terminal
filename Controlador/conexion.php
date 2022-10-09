<?php
    include 'conexion.php';
    // session_start();
?>

<?php

    $user = $_POST['usuario'];
    $password = $_POST['password'];

    // Validaciones para que no realicen inyeccion de codigo

    // Query para validar los datos
    $query = "SELECT idUsuario, NombreUsuario, Contrasena, idTipoUsuario, numEmpleado FROM Usuario 
        WHERE NombreUsuario = :idUsuario
        AND Contrasena =:contrasena";

    // Se prepara la sentencia
    $resultado=$dbConexion->prepare($query);

    // Se ejecuta la sentencia en forma de array
    $resultado->execute(array(":idUsuario"=>$user, ":contrasena"=>$password));


    // Verifica que el usuario existe -  muestra el mensaje si existe o no.
    if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "Bienvenido";
        
        echo "Bienvenido: " ;

        if ($user == "FcoLerma1") { // Unicamente si el usuario es 0, se creara la sesion de administrador.
            $_SESSION['usuarioAdmin']="A";
        } else { // Si el usuario no es 0000, se crea la variable usuarioNormal o tambien conocido como Cliente.
            $_SESSION['usuarioNormal'] = "B";
        }
        
        echo "<a href='../Vista/login.html'> Regresar al login </a>";
    } else {
        echo "<script>alert('Los datos ingresados son incorrectos');</script>";
        echo "<a href='/index.html'> Regresar</a>";
    }
    $resultado->closeCursor();
?>