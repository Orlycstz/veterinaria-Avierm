//validar ingreso de cedula a la hora de recuperar contrasena

function validarRecuperar(){

	var cedulaN = $("#usuarioIngreso").val();

	if(cedulaN != ""){

		var expresion = /^[0-9]*$/;

		if(!expresion.test(cedulaN)){

			document.querySelector("label[for='cedulaReC'] span").innerHTML = "<p style='color:red;'>No ingrese caracteres.</p>";

			return false;

		}

	}

}