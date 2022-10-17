<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Cerrar Sesion</title>

</head>
<body>
<?php
    echo "<div class='contenedor'>";
    session_start();
    unset($_SESSION['usuarioNormal']);
    unset($_SESSION['usuarioAdmin']);
    session_destroy();
    
     echo "<script>alert('Haz cerrado sesion');</script>";
     echo "<a href='../view/login.php'> Regresar</a>";
     echo "</div>";
?>

</body>

</html>