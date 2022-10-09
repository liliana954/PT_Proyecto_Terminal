<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/ventanaEmergenteEstilos.css">
    <title>Login</title>

</head>

<body>

    <?php
    include "../conexion.php";
    $user = $_POST['usuario'];
    $password = $_POST['password'];
    
    // Validaciones para que no realicen inyeccion de codigo
    if (preg_match("/^([*])$", $user)) {
        echo "No se permiten caracteres * ";
        echo "<a href='../view/login.php'> Regresar</a>";
        } 
    else if (preg_match("/^([*])$", $password)) { // Como las password, son las mismas, se valida si contiene caracteres alguna de ellas.
        echo "No se permiten caracteres * ";
        echo "<a href='../view/login.php'> Regresar</a>";
        } 

    // Query para validar los datos
    $query = "SELECT idUsuario, nombreUsuario, contraUsuario, idTipoUsuario FROM Usuario 
        WHERE nombreUsuario = :idUsuario
        AND contraUsuario =:contrasena";

    // Se prepara la sentencia
    $resultado=$dbConexion->prepare($query);

    // Se ejecuta la sentencia en forma de array
    $resultado->execute(array(":idUsuario"=>$user, ":contrasena"=>$password));

    echo "<div class='contenedor'>";
    // Verifica que el usuario existe -  muestra el mensaje si existe o no.
    if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<h1> Bienvenido Usuario: " .$registro['nombreUsuario']. 
        " tu tipo de usuario es: " .$registro['idTipoUsuario']. " </h1> " ;
        if ($registro['idTipoUsuario'] = "1") {
            $_SESSION['sessionUsuario']="1";
        } else if ($registro['idTipoUsuario'] = "2")  {
            $_SESSION['sessionUsuario'] ="2";
        } else if ($registro['idTipoUsuario'] = "3")  {
            $_SESSION['sessionUsuario'] ="3";
        } else if ($registro['idTipoUsuario'] = "4") { 
            $_SESSION['sessionUsuario']="4";
        } else {
            $_SESSION['sessionUsuario']="5";
        }
        echo " <a href='../view/indexAdministrativo.php'> Clic aqui para acceder a la seccion de Administracion </a>";
    } else {
        echo "<script>alert('Los datos ingresados son incorrectos');</script>";
        echo "<a href='../view/login.php'> Regresar</a>";
    }

    echo "</div>";
    $resultado->closeCursor();
?>


</body>

</html>