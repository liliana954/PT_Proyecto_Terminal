<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Login</title>

</head>

<body>

    <?php
    include "../Config/conexion.php";
    $user = $_POST['nombre_usuario'];
    $password = $_POST['contra_usuario'];
    
    // Validaciones para que no realicen inyeccion de codigo
    if (preg_match("/^([*])$", $user)) {
        echo "No se permiten caracteres * ";
        echo "<a href='View/login.php'> Regresar</a>";
        } 
    else if (preg_match("/^([*])$", $password)) { // Como las password, son las mismas, se valida si contiene caracteres alguna de ellas.
        echo "No se permiten caracteres * ";
        echo "<a href='View/login.php'> Regresar</a>";
        } 

    // Query para validar los datos
    $query = "SELECT id_usuario, nombre_usuario, contra_usuario, id_tipo_usuario FROM usuario 
        WHERE nombre_usuario = :nombre_usuario
        AND contra_usuario =:contra_usuario";

    // Se prepara la sentencia
    $resultado=$dbConexion->prepare($query);

    // Se ejecuta la sentencia en forma de array
    $resultado->execute(array(":nombre_usuario"=>$user, ":contra_usuario"=>$password));

    echo "<div class='contenedor'>";
    // Verifica que el usuario existe -  muestra el mensaje si existe o no.
    if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<script>alert('Los datos ingresados son correctos');</script>";
    } else {
        echo "<script>alert('Los datos ingresados son incorrectos');</script>";
        echo "<a href='../View/login.html'> Regresar</a>";
    }

    echo "</div>";
    $resultado->closeCursor();
?>


</body>

</html>