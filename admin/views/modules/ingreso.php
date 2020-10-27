		<div id="backIngreso">
			<form method="post" id="formIngreso" onsubmit="return validarIngreso()" style="background-color: #29335C;">

				<h1 id="tituloFormIngreso" style="background-color: #29335C;">INICIO DE SESIÓN</h1>
				
				<label for="nombreR" style="color: white;">Usuario:<span></span></label>
				<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" id="usuarioI" name="usuarioIngreso">

				<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" id="passwordIngreso" name="passwordIngreso">
						<?php

							$ingreso = new Usuario();
							$ingreso -> ingresoController();

						?>
				<input class="form-control formIngreso" style="background-color: #FAC8CD;" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 20px;"><a id="forget" href="registro" style="color: #FAC8CD;">¿Está registrado?</a></div>
				<div style="margin-top:15px;"><a id="forget" href="recuperarContrasena" style="color: #FAC8CD;">¿Olvidó su contraseña?</a></div>
			</form>
		</div>
