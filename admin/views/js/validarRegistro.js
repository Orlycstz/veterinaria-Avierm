/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/

var usuarioExistente = false;
var correoExistente = false;
var cedulaExistente = false;

$("#usuarioRegistro").change(function(){

	var usuario = $("#usuarioRegistro").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	
	$.ajax({
		url:"views/ajax/registro.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 0){

				$("label[for='usuarioR'] span").html('<p style="color:red;">Este usuario ya existe en la base de datos</p>');

				usuarioExistente = true;
			}

			else{

				$("label[for='usuarioR'] span").html("");
				usuarioExistente = false;

			}
		
		}

	});

});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR EMAIL EXISTENTE AJAX
=============================================*/

$("#correoRegistro").change(function(){

	var email = $("#correoRegistro").val();

	var datos = new FormData();

	datos.append("validarEmail", email);
	
	$.ajax({
		url:"views/ajax/registro.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 0){

				$("label[for='correoR'] span").html('<p style="color:red;">Este correo ya existe en la base de datos</p>');

				correoExistente = true;
			}

			else{

				$("label[for='correoR'] span").html("");

				correoExistente = false;

			}
		
		}

	});

});

$("#cedulaRegistro").change(function(){

	var identidad = $("#cedulaRegistro").val();

	var datos = new FormData();

	datos.append("validarCedula", identidad);

	$.ajax({
		url:"views/ajax/registro.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){

			if(respuesta == 0){

				$("label[for='cedulaR'] span").html('<p style="color:red;">La cedula ya existe en la base de datos</p>');

				cedulaExistente = true;

			}else{

				$("label[for='cedulaR'] span").html("");

				cedulaExistente = false;

			}

		}

	});

});

/*=====  FIN VALIDAR EMAIL EXISTENTE AJAX  ======*/

/*=====  VALIDAR CEDULA EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro(){

	var nombre = $("#nombreRegistro").val();

	var apellido = $("#apellidoRegistro").val();

	var usuario = $("#usuarioRegistro").val();

	var password = $("#passwordRegistro").val();

	var email = $("#correoRegistro").val();

	var cedula = $("#cedulaRegistro").val();

	var respuesta = $("#rRegistro").val();

		console.log('correo', correoExistente, Date.now());
		if(correoExistente){

			document.querySelector("label[for='correoR'] span").innerHTML = "<p style='color:red;'>Este email ya existe en la base de datos</p>";

			return false;
		}

/* VALIDAR NOMBRE */
	if(nombre != ""){

		var caracteres = nombre.length;
		var expresion = /^[a-zA-Z]*$/;

		if(caracteres > 10){

			document.querySelector("label[for='nombreR'] span").innerHTML += "<br> <p style='color:red;'>Escriba por favor menos de 10 caracteres.</p>";

			return false;
		}

		if(!expresion.test(nombre)){

			document.querySelector("label[for='nombreR'] span").innerHTML += "<br> <p style='color:red;'>No escriba caracteres especiales ni numeros.</p>";

			return false;

		}

		if(usuarioExistente){

			document.querySelector("label[for='usuarioR'] span").innerHTML = "<p style='color:red;'>Este usuario ya existe en la base de datos</p>";

			return false;
		}

	}

	/*VALIDAR APELLIDO*/

	if (apellido != ""){

		var caracteres = apellido.length;
		var expresion = /^[a-zA-Z]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='apellidoR'] span").innerHTML += "<br> <p style='color:red;'>Escribe por favor menos de 10 caracteres.</p>";
			return false;
		}

		if(!expresion.test(apellido)){
			document.querySelector("label[for='apellidoR'] span").innerHTML += "<br> <p style='color:red;'>No escriba caracteres especiales ni numeros.</p>";
			return false;
		}

	}



	/*VALIDAR USUARIO*/

	if(usuario != ""){

		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='usuarioR'] span").innerHTML += "<br> <p style='color:red;'>Escriba por favor menos de 10 caracteres.</p>";
			return false;
		}

		if(!expresion.test(usuario)){
			document.querySelector("label[for='usuarioR'] span").innerHTML += "<br> <p style='color:red;'>No escriba caracteres especiales.</p>";
			return false;
		}
	}
	/* VALIDAR EMAIL*/

	if(email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){

			document.querySelector("label[for='emailRegistro'] span").innerHTML += "<br> <p style='color:red;'>Escriba correctamente el Email.</p>";

			return false;

		}

	}

	/*VALIDAR CEDULA*/

	if(cedula != ""){

		var caracteres = cedula.length;
		var expresion = /^[0-9]*$/;

		if(caracteres > 8){
			document.querySelector("label[for='cedulaR'] span").innerHTML += "<br> <p style='color:red;'>Longitud minima de 8 caracteres.</p>";
			return false;
		}

		if(!expresion.test(cedula)){
			document.querySelector("label[for='cedulaR'] span").innerHTML += "<br> <p style='color:red;'>Escriba solo numeros por favor.</p>";
			return false;
		}

		if(cedulaExistente){

			document.querySelector("label[for='cedulaR'] span").innerHTML = "<p style='color:red;'>La cedula ya existe en la base de datos</p>";

			return false;			

		}
	}

	/* VALIDAR PASSWORD */

	if(password != ""){

		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres < 6){

			document.querySelector("label[for='passwordR'] span").innerHTML += "<br><p style='color:red;'>Escriba por favor más de 6 caracteres.</p>";

			return false;
		}

		if(!expresion.test(password)){

			document.querySelector("label[for='passwordR'] span").innerHTML += "<br><p style='color:red;'>No escriba caracteres especiales.</p>";

			return false;

		}

	}

	console.log('respuesta', respuesta);

	if(respuesta != ""){
		var caracteres = respuesta.length;
		var expresion = /^[a-zA-Z]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='respuestaR'] span").innerHTML += "<br> <p style='color:red;'> No escriba mas de 10 caracteres.</p>";
			return false;
		}

		if(!expresion.test(respuesta)){
			document.querySelector("label[for='respuestaR'] span").innerHTML += "<br> <p style='color:red;' >No escriba caracteres especiales ni numeros.</p>";
			return false;
		}
	}
	
return true;

}