<?php

	session_start();

	if(!$_SESSION["validar"]){

		header("location:ingreso");
		exit();

	}

	include "views/modules/botonera.php";
	include "views/modules/cabezote.php";

?>

<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

 <div>

  <table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Reservar</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     	<?php

     		$reservar = new Articulo();
     		$reservar -> mostrarArticulosController();
     		$reservar -> guardarReserva();

     	?>
    </tbody>
  </table>

  <!--<a href="tcpdf/pdf/suscriptores.php" target="blank">
  <button class="btn btn-warning pull-right" style="margin:20px;">Imprimir Suscriptores</button>
  </a>-->
  <!--Se recomienda usar TCPDF para el uso de descargar archivo pdf's-->
  </div>

  </div>