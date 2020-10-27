<div id="backIngreso">
		<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

				<h1 id="tituloFormIngreso">PREGUNTA SEGURIDAD</h1>

				<select class="form form-control" name="" id="">
						<option value="">-Escoga pregunta de seguridad-</option>
						<option value="">¿Comida Favorita?</option>
						<option value="">¿Deporte Favorito?</option>
						<option value="">¿Serie de Televisión Favorita?</option>
						<option value="">¿Familiar Querido?</option>
						<option value="">¿Color Favorito?</option>
				</select>
				<input class="form-control formIngreso" type="text" placeholder="Respuesta pregunta de seguridad" id="usuarioIngreso" name="usuarioIngreso">
				<input class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Resgistrar">
				<div style="margin-top: 20px;"><a id="forget" href="ingreso">Sé mi contraseña</a></div>
				<div style="margin-top:15px;"><a id="forget" href="registro">¿Está registrado?</a></div>
			</form>
		</div>

        <div id="backIngreso">
			<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

				<h1 id="tituloFormIngreso">INGRESE NUEVA CONTRASEÑA</h1>
				<input class="form-control formIngreso" type="text" placeholder="Nueva contraseña" id="usuarioIngreso" name="usuarioIngreso">
				<input class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 20px;"><a id="forget" href="ingreso">Sé mi contraseña</a></div>
				<div style="margin-top:15px;"><a id="forget" href="registro">¿Está registrado?</a></div>
			</form>
		</div>