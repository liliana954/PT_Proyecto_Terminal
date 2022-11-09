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

    // validacion para el captcha
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha_response=true;
        $recaptcha = $_POST['g-recaptcha-response'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array (
            'secret'=> '6LeP_OUiAAAAAALqQr21_3sqG9WGaB5l_Tmww_nh',
            'response'=> $recaptcha
        );
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $content = stream_context_create($options);
        $verify = file_get_contents($url,false,$content);
        $captcha_success = json_decode($verify);
        $captcha_response = $captcha_success->success;
        if ($captcha_response) {
            echo "<script>alert(' captcha correcto ');</script>";
        } else {
            echo "<script>alert(' Error en el captcha ');</script>";
            echo "<script>location.href='../View/login.php';</script>";
        }
    }
    
    // Validaciones para que no realicen inyeccion de codigo
        if (preg_match("/^([*])$/", $user)) {
            echo "No se permiten caracteres * ";
            echo "<script>location.href='../View/login.php';</script>";
        } else if (preg_match("/^([*])$/", $password)) { // Como las password, son las mismas, se valida si contiene caracteres alguna de ellas.
            echo "No se permiten caracteres * ";
            echo "<script>location.href='../View/login.php';</script>";
        }  else if (preg_match("/^([0,3]{1})$/",$tipoDeUsuario)) {
            // el tipo de usuario no es el indicado
            echo "<script>alert(' Error tipo de usuario');</script>";
            echo "<script>location.href='../View/login.php';</script>";
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

    $resultado->closeCursor();
?>


</body>

</html>