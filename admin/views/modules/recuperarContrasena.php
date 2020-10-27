<div id="backIngreso" style="margin-top: -100px;">
			<form method="post" id="formIngreso" onsubmit="return validarRecuperar()" style="background-color: #29335C;">

				<h1 id="tituloFormIngreso" style="background-color: #29335C;">RECUPERAR CONTRASEÑA</h1>
				<label id="label" for="cedulaReC" style="color: white;">Cédula:<span></span></label>
				<input class="form-control formIngreso" type="text" id="usuarioIngreso" name="usuarioCedula">
				<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 10px;"><a style="color: #FAC8CD;" id="forget" href="ingreso">Sé mi contraseña</a></div>
				
				<?php

					$password = new Usuario();
					$password -> recuperarContrasena();
					$password -> seleccionarRespuesta();
				?>
			</form>
		</div>