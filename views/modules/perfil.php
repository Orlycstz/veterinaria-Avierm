<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/home/home.css">
    <link rel="stylesheet" href="../css/estilos.css">


    <link rel="stylesheet" href="../../admin/views/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../admin/views/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../admin/views/css/style.css">
	<link rel="stylesheet" href="../../admin/views/css/fonts.css">
	<link rel="stylesheet" href="../../admin/views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="../../admin/views/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../../admin/views/css/jquery-ui.min.css">

	<script src="../../admin/views/js/jquery-2.2.0.min.js"></script>
	<script src="../../admin/views/js/bootstrap.min.js"></script>
	<script src="../../admin/views/js/jquery.fancybox.js"></script>
	<script src="../../admin/views/js/jquery.dataTables.min.js"></script>
	<script src="../../admin/views/js/jquery-ui.min.js"></script>
	<script src="../../admin/views/js/responsive.bootstrap.min.js"></script>
	<script src="../../admin/views/js/dataTables.responsive.min.js"></script>
    <script src="../../admin/views/js/dataTables.bootstrap.min.js"></script>
    
    <title>Veterinaria | Mi Perfil</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <a class="logo" href="../../views/modules/home.php"><img src="../../views/img/logo.jpg" alt=""></a>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="../../views/modules/home.php">Inicio</a>
                <a href="#">Tienda</a>
                <a href="#">Servicios</a>
                <a href="#">Vacunas</a>
                <a href="#">Galería</a>
                <a href="#">Noticias</a>
                <a href="contactenos.html">Contáctenos</a>
                <div class="registro"><a href="perfil.php">Mi Perfil</a></div>
                <div class="registro"><a href="../../index.php">Cerrar Sesión</a></div>
            </nav>
        </div>
    </header>
    	<!--=====================================
			PERFIL       
			======================================-->

		<div id="editarPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			 
            <h1>Hola Juanu 
            <span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h1>

            <div style="position:relative">
                <img src="../../admin/views/images/photo.jpg" class="img-circle pull-right">
                <span class="btn btn-info fa fa-pencil" style="font-size:10px; margin-right:10px; position:absolute; right:-20px; top:-50px"></span>
            </div>

            <hr>

            <h4>Usuario: Pepa Pig 
            <span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h4>

            <h4>Email: correo@correo.com <span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h4>
 
            <h4>Contraseña: ******* <span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h4>
        </div>

        <div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	

            <button class="btn btn-default">Registrar un nuevo miembro</button>

            <hr>

            <div class="table-responsive">

                <table id="tablaSuscriptores" class="table table-striped display">
                <thead>
                    <tr>
                        <th>Nombre de Mascota</th>
                        <th>Tipo Animal</th>
                        <th>Fecha de nacimiento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Toby</td>
                        <td>Perro</td>
                        <td>24/06/2017</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Loro</td>
                        <td>05/12/2013</td>
                    </tr>
                    <tr>
                        <td>Misu</td>
                        <td>Gato</td>
                        <td>31/12/2018</td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Lobo</td>
                        <td>13/08/2016</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

         <!--====  Fin de PERFIL  ====-->

     <!--====  Fin de COLUMNA CONTENIDO  ====-->
</body>