<?php

	session_start();

	if(!$_SESSION["validar"]){

		header("location:ingreso");
		exit();

	}

	include "views/modules/botonera.php";
	include "views/modules/cabezote.php";

  $cedula = $_SESSION["cedula"];

?>

<div id="editarPerfil" class="col-lg-2 col-md-4 col-sm-6 col-xs-12" style="margin-left: 35%;">

		<form method="post">
			<h1 style="text-align:center; margin-bottom:30px;">Consulte sus vacunas</h1>
			<label>Ingrese su C.I</label>
			<h6>Ingrese su cedula para consultar sus vacunas registradas de sus mascotas</h6>
      <input type="hidden" class="form form-control" value="<?php echo $cedula;?>" name="cedulaPe" style="margin-bottom:20px;">
			<input type="text" class="form form-control" name="cedulaU" style="margin-bottom:20px;">
			<input style="background-color: #FAC8CD;" class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Buscar">
		</form>

</div>

<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

 <div>

  <table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Tipo de vacuna</th>
        <th>Fecha de nacimiento</th>
        <th>Lista cantidad</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    		<?php 

				$consultar = new Vacuna();
				$consultar -> consultarVacunasUsuario();

			?>
    </tbody>
  </table>
<!--
  <a href="tcpdf/pdf/vacunas.php" target="blank">
  <button class="btn btn-primary pull-right" style="margin:20px;">Imprimir Suscriptores</button>
  </a>-->
  <!--Se recomienda usar TCPDF para el uso de descargar archivo pdf's-->
  </div>

  </div>