<?php
    session_start();
    unset($_SESSION['usuarioAdmin']);
    unset($_SESSION['usuarioEmp']);
    unset($_SESSION['usuPruebas']);
    session_destroy();
    
     echo "<script>alert('Haz cerrado sesion');</script>";
     echo "<script>location.href='../View/login.php';</script>";
?>