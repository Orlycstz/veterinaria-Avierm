<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/sign-up/sign-up.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Veterinaria | Resgistrate</title>
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
    <div class="formulario-sign-up">
        <form method="post">
            <h2>Registrate</h2>
            <input type="text" placeholder="Nombre y Apellido" name="nombre" required>
            <input type="text" placeholder="Usuario" name="usuario" required>
            <input type="text" placeholder="Cédula" name="cedula" required>
            <input type="email" placeholder="Correo Electrónico" name="email" required>
            <input type="password" placeholder="Contraseña" name="clave" required>
            <input type="submit" value="Siguiente">
            <a href="sign-in.php">Estoy registrado</a>
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