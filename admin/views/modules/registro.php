<div id="backIngreso" style="margin-top: -16%;">
			<form style="background-color: #29335C;" method="post" id="formIngreso" onsubmit="return validarRegistro()">

				<h1 id="tituloFormIngreso" style="background-color: #29335C;">REGISTRATE</h1>
				
				<label for="nombreR" style="color: white;">Nombre:<span></span></label>
				<input class="form-control formIngreso" type="text" maxlength="10" placeholder="Nombre" id="nombreRegistro" name="nombreRegistro" required>

				<label for="apellidoR" style="color: white;">Apellido:<span></span></label>
				<input class="form-control formIngreso" type="text" maxlength="10" placeholder="Apellido" id="apellidoRegistro" name="apellidoRegistro" required>

				<label for="usuarioR" style="color: white;">Usuario:<span></span></label>
				<input class="form-control formIngreso" maxlength="10" type="text" placeholder="Usuario" id="usuarioRegistro" name="usuarioRegistro" required>

				<label for="cedulaR" style="color: white;">Cedula:<span></span></label>
				<input required maxlength="8" class="form-control formIngreso" type="text" placeholder="Cédula" id="cedulaRegistro" name="cedulaRegistro">

				<label for="correoR" style="color: white;">Correo:<span></span></label>
				<input class="form-control formIngreso" type="email" placeholder="Correo Electrónico" id="correoRegistro" name="correoRegistro" required>

				<label for="passwordR" style="color: white;">Contraseña:<span></span></label>
				<input class="form-control formIngreso" type="password" placeholder="Contraseña" id="passwordRegistro" name="contrasenadRegistro" required>

				<label for="" style="color: white;">Pregunta De Seguridad:<span></span></label>
				<select class="form form-control" name="preguntaSeguridad" required>
						<option value="">-Escoga pregunta de seguridad-</option>
						<option value="¿Comida Favorita?">¿Comida Favorita?</option>
						<option value="¿Deporte Favorito?">¿Deporte Favorito?</option>
						<option value="¿Serie de Televisión Favorita?">¿Serie de Televisión Favorita?</option>
						<option value="¿Familiar Querido?">¿Familiar Querido?</option>
						<option value="¿Color Favorito?">¿Color Favorito?</option>
				</select>

				<label for="respuestaR"><span></span></label>
				<input class="form-control formIngreso" type="text" placeholder="Respuesta pregunta de seguridad" id="rRegistro" name="respuestaRegistro">
				<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Resgistrar">
						<?php

							$registrar = new Usuario();
							$registrar -> registrarUsuario();

						?>
				<div style="margin-top: 20px;"><a style="color: #FAC8CD;" id="forget" href="ingreso">Estoy registrado</a></div>
			</form>
		</div>