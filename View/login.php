<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css" type="text/css" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Login</title>
</head>
<body>
    <!--Barra de navegacion-->
    <nav class="pantalla-completa">
        <div class="pantalla-mitad centrar-contenido-unico fondo-blanco borde-derecho-amarillo borde-inferior-azul">
            <img src="/Utileria/Imagenes/mini_logo.jpeg" alt="logo">
        </div>
        
        <div class="pantalla-mitad centrar-contenido-navbar"> 
            <a href="/index.html">Quienes somos</a>
            <a href="#">Servicios</a>
            <a href="#">Contacto</a>
            <a href="/login.php"> Login </a>
        </div>
    </nav>

    <div class="login">
        <form action="../Controllers/iniciarSesion.php" method="post">
            <ul>
                <li>
                    <label for="id_tipo_usuario">Tipo de usuario</label>
                    <select name="id_tipo_usuario">
                        <option value="1">Administrador</option>
                        <option value="2" selected >Empleado </option>
                        <option value="3">Pruebas</option>
                    </select>
                </li>
                <li>
                    <label for="nombre_usuario">Usuario</label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Ingresa tu usuario" required>
                </li>
                <li>
                    <label for="contra_usuario">Contraseña</label>
                    <input type="password" id="contra_usuario" name="contra_usuario" placeholder="Ingresa tu contraseña" required>
                </li>
                <li>
                    <div class="g-recaptcha" data-sitekey="6LeP_OUiAAAAAEFzF7Pd3qZxXH0Q5tHTvrmI6pbh" data-callback="correctCaptcha"></div>
                </li>
                <li class="button">
                    <button type="submit">Ingresar</button>
                </li>
            </ul>
                
           </form>


    </div>


    <!-- Seccion del footer-->
    <footer>
        <div class="pantalla-mitad centrar-contenido-todo">
                <h2> Autor </h2>
                <p> Liliana Abigail Salinas Zarzosa </p>
        </div>

        <div class="pantalla-mitad centrar-contenido-todo">
            <h1> Contacto </h1>
            <a href="mailto:hege@example.com">tere@example.com</a></p>
        </div>
    </footer>


</body>
</html>