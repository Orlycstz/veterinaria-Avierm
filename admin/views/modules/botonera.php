		<!--=====================================
		COLUMNA BOTONERA           
		======================================-->

			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" id="col1" style="background-color: #29335C;">
				
				<div style="margin-left: 35px;" id="logo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
					<img src="views/images/logotipo.jpeg" class="img-responsive" alt="Image">


				</div>

				<!--=====================================
				BOTONERA MOVIL            
				======================================-->

				<div id="botoneraMovil" class="navbar-header navbar-inverse" style="background-color: #29335C;">

					<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#botonera">

						<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	           			<span class="icon-bar"></span>

					</button>
				
				</div>

				<!--====  Fin de BOTONERA MOVIL  ====-->

				<nav style="background-color: #29335C;" id="botonera" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse navbar-collapse text-center">
							
					<ul class="nav navbar">
						<li><a href="inicio">Inicio <span class="glyphicon glyphicon-new-window"></span></a></li>
						
						<?php 
							if($_SESSION["usuario"] == "admin"){

								echo '<li><a href="galeria">Galería <span class="glyphicon glyphicon-new-window"></span></a></li>

									  <li><a href="historiamedica">Historia Médica <span class="glyphicon glyphicon-new-window"></span></a></li>

									  <li><a href="noticia">Noticia <span class="glyphicon glyphicon-new-window"></span></a></li>

									  <li><a href="articulos">Artículos <span class="glyphicon glyphicon-new-window"></span></a></li>

									  <li><a href="vacunas">Vacuna <span class="glyphicon glyphicon-new-window"></span></a></li>';
								} 
							?>

						<?php if($_SESSION["usuario"] != "admin"){

							echo '<li><a href="vacunasConsulta">Ver Vacunas<span class="glyphicon glyphicon-new-window"></span></a></li>
								<li><a href="reservar">Articulos<span class="glyphicon glyphicon-new-window"></span></a></li>';
							
							}

						?>
						
					</ul>

				</nav>

			</div>

		<!--====  FIn de COLUMNA BOTONERA  ====-->