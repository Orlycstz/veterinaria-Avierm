<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/sign-in/sign-in.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Veterinaria | Inicia Sesión</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <a class="logo" href="index.html"><img src="../../views/img/logo.jpg" alt=""></a>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="../../index.php">Inicio</a>
                <a href="#">Tienda</a>
                <a href="#">Servicios</a>
                <a href="#">Galeria</a>
                <a href="#">Noticias</a>
                <a href="#">Contactenos</a>
            </nav>
        </div>
    </header>
    <div class="formulario-sign-in">
        <form method="post">
            <h2>Inicio de Sesión</h2>
            <input type="text" placeholder="Usuario" name="usuario">
            <input type="password" placeholder="Contraseña" name="clave">
            <input type="button" onclick = "location='home.php'" value="Ingresar">
            <a href="sign-up.php">No tengo cuenta</a>
        </form>
    </div>
    <footer>
        <div class="contenedor">
            <p class="copy">Veterinaria &copy; 2019</p>
            <div class="sociales">
                <a class="icon-gmail" href="#"></a>
                <a class="icon-facebook-squared" href="#"></a>
                <a class="icon-twitter-squared" href="#"></a>
            </div>
        </div>
    </footer>
</body>