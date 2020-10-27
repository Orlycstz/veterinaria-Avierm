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
			VACUNA       
			======================================-->
			
			<div id="editarPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

            <form method="post">
					<h1 style="margin-bottom:30px; text-align:center">Vacunas para Perros</h1>
					<label for="">Nombre Animal</label>
					<input type="text" class="form form-control" name="nombrePerro" style="margin-bottom:20px;" placeholder="Nombre del animal" maxlength="9" required>
					<label for="">Cédula Dueño</label>
					<input type="text" class="form form-control" name="cedulaPerro" style="margin-bottom:20px;" placeholder="Cédula del dueño" maxlength="8" required>
					<label for="">Tipo de vacunas</label>
					<select class="form form-control" name="tipoPerro" id="" style="margin-bottom:20px;" required>
						<option value="Moquillo">Moquillo</option>
						<option value="Hepatitis">Hepatitis</option>
						<option value="Parvovirosis">Parvovirosis</option>
						<option value="Leptospirosis">Leptospirosis</option>
						<option value="Coronavirus">Coronavirus</option>
						<option value="Parainfluenza">Parainfluenza</option>
						<option value="Enf. de lyme">Enf. de lyme</option>
						<option value="Bordetella">Bordetella</option>						
					</select>
					<label for="">Fecha</label>
					<input type="date" min="2009-01-01" max="2020-01-01" name="fechaPerro" class="form form-control" style="margin-bottom:20px;" placeholder="Fecha de Nacimiento" required>

					<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning pt-2" id="btn-ingreso" type="submit" value="Registrar Vacuna" style="margin-top:30px; margin-bottom:70px;">
							<?php 
								$Perro = new Vacuna();
								$Perro -> agregarVacunaPerro();
							?>
				</form>

    	</div>

    	<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	

        <form method="post">
				<h1 style="text-align:center; margin-top: 2px; margin-bottom:26px;">Vacunas para Gatos</h1>
					<label for="">Nombre Animal</label>
					<input type="text" maxlength="9" class="form form-control" name="nombreGato" style="margin-bottom:20px;" placeholder="Nombre del animal" required>
					<label for="">Cédula Dueño</label>
					<input type="text" class="form form-control" name="cedulaGato" style="margin-bottom:20px;" placeholder="Cédula del dueño" required>
					<label for="">Tipo de vacunas</label>
					<select class="form form-control" style="margin-bottom:20px;" name="tipoGato" id="" required>
						<option value="Panleucopenia">Panleucopenia</option>
						<option value="Rinotraqueitis">Rinotraqueitis</option>
						<option value="Calcivirus">Calcivirus</option>
						<option value="Leucemia">Leucemia</option>
						<option value="Peritonitis">Peritonitis</option>
						<option value="Clamidia">Clamidia</option>
						<option value="Bordetella">Bordetella</option>
					</select>
					<label for="">Fecha</label>
					<input type="date" min="2009-01-01" max="2020-01-01" name="fechaGato" class="form form-control" style="margin-bottom:20px;" placeholder="Fecha de Nacimiento" required>
					<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning pt-2" id="btn-ingreso" type="submit" value="Registrar Vacuna" style="margin-top:30px; margin-bottom:70px; margin-left: 100px;">
					<?php
						$gato = new Vacuna();
						$gato -> agregarVacunaGato();
					?>
		</form>

    	</div>

			<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">	

				<div class="table-responsive">

				<table id="tablaSuscriptores" class="table table-striped display">
			    <thead>
			      <tr>
			        <th>Nombre Animal</th>
			        <th>Cédula</th>
					<th>Tipo de vacunas</th>
					<th>Fecha de nacimiento</th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
			    		$listaVacunas = new Vacuna();
			    		$listaVacunas -> visualizarVacunas();
			    		$listaVacunas -> borrarVacuna();
			    	?>
			    </tbody>
			  </table>

			  </div>
    		</div>

			<!--====  Fin de VACUNA  ====-->

		<!--====  Fin de COLUMNA CONTENIDO  ====-->