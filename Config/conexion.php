<?php
    $server = "localhost";  // siempre va localhost
    $user = "siatechm"; // usuario hosting
    $password ="DesarrolloSiatech2022"; // contraseña hosting
    $dbname = "siatechm_siatechmx";  // nombre BD

    try {
        // Conectar la BD
        $dbConexion = new PDO("mysql:host=$server;dbname=$dbname",$user, $password);
        //Nivel de errores a excepcion
        $dbConexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Que acepte caracteres especiales latinos - españoles
        $dbConexion->exec("SET CHARACTER SET utf8");

    } catch(PDOException $e) {
        echo "Error: " .$e->getMessage();
    }

?>