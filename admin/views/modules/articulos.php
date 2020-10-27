<?php

	session_start();

	if(!$_SESSION["validar"]){

		header("location:ingreso");
		exit();

	}

	include "views/modules/botonera.php";
	include "views/modules/cabezote.php";

?>

			<!--====  Fin de CABEZOTE  ====-->

			<!--=====================================
			ARTÍCULOS ADMINISTRABLE          
			======================================-->
			
			<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
				
				<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Artículo</button>

				<!--==== AGREGAR ARTÍCULO  ====-->

				<div id="agregarArtículo" style="display: none;">

					<form method="post" enctype="multipart/form-data">
						
						<input type="text" placeholder="Nombre del Artículo" class="form-control" name="nombre">

						<textarea name="descripcion" id="" cols="30" rows="5" placeholder="Descripcion del Articulo" class="form-control"></textarea>
						<br>
						<input name="precio" id="" type="text" cols="30" rows="10" placeholder="Precio" class="form-control">

						<input name="cantidad" id="" type="text" cols="30" rows="10" placeholder="Cantidad" class="form-control">

						<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

						<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

						<div id="arrastreImagenArticulo">	
							<!--<div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>-->
						</div>

						<button id="guardarArticulo" class="btn btn-primary">Guardar Artículo</button>

					</form>

				</div>

					<?php 

						$articulo = new Articulo();
						$articulo -> guardarArticuloController();

					?>

				<hr>

				<!---Lista de editar y eliminar--->

					<div id="suscriptores" class="col-lg-12 col-md-12 col-sm-10 col-xs-12">

						<div>

						<table id="tablaSuscriptores" width="1300px" class="table table-striped dt-responsive nowrap">
							<thead>
								  <tr>
								    <th>Foto</th>
								    <th>Nombre</th>
								    <th>Descripcion</th>
								    <th>Precio</th>
								    <th>Cantidad</th>
								    <th>Detalles</th>
								  </tr>
								</thead>
								<tbody>
									<?php

										$articulo -> mostrarArticulosAdmi();
										$articulo -> editarArticuloAdmin();
										$articulo -> eliminarArticuloAdmin();

									?>
								</tbody>
							</table>
						</div>

					</div>

				<!--fin de lista de editar y eliminar-->