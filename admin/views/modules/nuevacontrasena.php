<div id="backIngreso">
			<form method="post" style="background-color: #29335C;" id="formIngreso">

				<h1 id="tituloFormIngreso" style="background-color: #29335C;">INGRESE NUEVA CONTRASEÑA</h1>
				<input class="form-control formIngreso" type="password" placeholder="Nueva contraseña" name="nuevaContrasena">
				<input class="form-control formIngreso" type="password" placeholder="Confirmar usuario" name="Usuario">

				<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">

				<div style="margin-top: 20px;"><a style="color: #FAC8CD;" id="forget" href="ingreso">Sé mi contraseña</a></div>

				<?php
					$nueva = new Usuario();
					$nueva -> nuevaContrasenaController();
				?>

			</form>
</div>