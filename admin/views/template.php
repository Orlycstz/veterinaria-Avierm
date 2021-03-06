<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ADMIN</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/logotipo.jpeg">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/fonts.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="views/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="views/css/jquery-ui.min.css">
	<link rel="stylesheet" href="views/css/sweetalert.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
	<script src="views/js/jquery.dataTables.min.js"></script>
	<script src="views/js/jquery-ui.min.js"></script>
	<script src="views/js/responsive.bootstrap.min.js"></script>
	<script src="views/js/dataTables.responsive.min.js"></script>
	<script src="views/js/dataTables.bootstrap.min.js"></script>
	<script src="views/js/sweetalert.min.js"></script>



</head>

<body>

	<div class="container-fluid">

		<section class="row">

			<?php 

				$enlaces = new Enlaces();
				$enlaces -> enlacesController();

			?>

		</section>
	
	</div>

	<script src="views/js/script.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/validarRegistro.js"></script>
	<script src="views/js/gestorPerfiles.js"></script>
	<script src="views/js/galeria.js"></script>
	<script src="views/js/gestorArticulos.js"></script>
	<script src="views/js/reservarArticulo.js"></script>
	<script src="views/js/gestorNoticia.js"></script>
	<script src="views/js/recuperarContrasena.js"></script>
	
</body>

</html>