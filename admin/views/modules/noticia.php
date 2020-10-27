<?php

	session_start();

	if(!$_SESSION["validar"]){

		header("location:ingreso");
		exit();

	}

	include "views/modules/botonera.php";
	include "views/modules/cabezote.php";

?>

<!--=====================================
			NOTICIA ADMINISTRABLE           
			======================================-->
			<div id="seccionNoticia" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
				
				<button id="btnAgregarNoticia" class="btn btn-info btn-lg">Agregar Noticia</button>

				<!--==== AGREGAR NOTICIA  ====-->

				<div id="agregarNoticia" style="display: none">

					<form method="post" enctype="multipart/form-data">

						<input name="tituloNoticia" type="text" placeholder="Título del Noticia" class="form-control" required>

						<textarea name="introNoticia" id="" cols="30" rows="5" placeholder="Introducción de la Noticia" class="form-control" maxlength="170" required></textarea>

						<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

						<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

						<div id="arrastreImagenNoticia">	
							<!--<div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>-->
						</div>

						<input type="submit" id="guardarNoticia" class="btn btn-primary" value="Guardar Noticia">
					</form>

				</div>

				<?php

					$noticia = new Noticia();
					$noticia -> agregarNoticia();

				?>

				<hr>

				<!--==== EDITAR NOTICIA  ====-->

				<ul id="editarNoticia">

					<?php

						$noticia -> mostrarNoticias();
						$noticia -> editarNoticias();
						$noticia -> eliminarNoticia();

					?>

				</ul>

			</div>

			<!--====  Fin de NOTICIA ADMINISTRABLE  ====-->