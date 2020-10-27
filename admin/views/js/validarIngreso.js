function validarIngreso(){

	var expresion = /^[a-zA-Z0-9]*$/;

	if(!expresion.test($("#usuarioI").val())){
		document.querySelector("label[for='nombreR']").innerHTML += "<br>No escriba caracteres especiales";
		return false;
	}

	if(!expresion.test($("#usuarioPassword").val())){
		return false;
	}

	return true;

}