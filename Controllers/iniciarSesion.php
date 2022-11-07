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
    $tipoDeUsuario = $_POST['id_tipo_usuario'];
    
    // Validaciones para que no realicen inyeccion de codigo
    if (preg_match("/^([*])$", $user)) {
            echo "No se permiten caracteres * ";
            echo "<script>location.href='View/login.php'> Regresar</script>";
        } else if (preg_match("/^([*])$", $password)) { // Como las password, son las mismas, se valida si contiene caracteres alguna de ellas.
            echo "No se permiten caracteres * ";
            echo "<script>location.href='View/login.php'> Regresar</script>";
        }  else if (preg_match("/^([1-4]{1})$/",$tipoDeUsuario)) {
            // el tipo de usuario no es el indicado
            echo "Error en el tipo de usuario";
            echo "<script>location.href='View/login.php'> Regresar</script>";
        }


    // Query para validar los datos
    $query = "SELECT id_usuario, nombre_usuario, contra_usuario, id_tipo_usuario FROM usuario 
        WHERE nombre_usuario = :nombre_usuario
        AND contra_usuario =:contra_usuario
        AND id_tipo_usuario =:tipoDeUsuario";

    // Se prepara la sentencia
    $resultado=$dbConexion->prepare($query);

    // Se ejecuta la sentencia en forma de array
    $resultado->execute(array(":nombre_usuario"=>$user, ":contra_usuario"=>$password, ":tipoDeUsuario"=>$tipoDeUsuario));

    echo "<div class='contenedor'>";
    // Verifica que el usuario existe -  muestra el mensaje si existe o no.
    if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {

        //Se generan las variables de sesion, dependiendo el tipo de usuario
        if ($tipoDeUsuario == "1") {
            $_SESSION['usuarioAdmin'] = "UsuAdm";
        } else if ($tipoDeUsuario == "2") {
            $_SESSION['usuarioEmp'] = "UsuEmp";
        } else if ($tipoDeUsuario == "3") {
            $_SESSION['usuPruebas'] = "UsuPru";
        }
        echo "<script>location.href='../View/administracion.php';</script>";
    } else {
        echo "<script>alert(' El usuario o contraseña son incorrectos ');</script>";
        echo "<script>location.href='../View/login.php';</script>";
    }

    echo "</div>";
    $resultado->closeCursor();
?>


</body>

</html>