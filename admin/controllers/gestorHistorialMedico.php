<?php 

/**
 * 
 */
class historiaMedica{
	
	#agregar historial medico
	public function agregarHistorial(){

		if(isset($_POST["animal"])){

			$datosController = array("animal" => $_POST["animal"],
									 "cedula" => $_POST["cedulaD"],
									 "tipoanimal" => $_POST["tipoAnimal"],
									 "raza" => $_POST["raza"],
									 "peso" => $_POST["peso"],
									 "fechan" => $_POST["fechaNacimiento"],
									 "sexo" => $_POST["sexo"],
									 "fechac" => $_POST["fechaConsulta"],
									 "ultima" => $_POST["ultimaVisita"],
									 "antecedentes" => $_POST["antecedentes"],
									 "sintomas" => $_POST["sintomas"],
									 "diagnostico" => $_POST["diagnostico"],
									 "tratamiento" => $_POST["tratamiento"]);

			$respuesta = historiaMedicaModel::agregarHistorialModel($datosController, "historialm");

			if($respuesta == "ok"){

				echo '<script>
						swal({
						title: "¡OK!",
						text: "Historial agregado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';

			}else{
				echo '<div class="alert alert-warning"><b>A ocurrido un error</div>';
			}

		}//fin isset
	}//fin agregar historial

	#visualizar historial medico
	public function visualizarHistorial(){

		$respuesta = historiaMedicaModel::visualizarHistorialMedica("historialm");

		foreach ($respuesta as $row => $item) {
			
			echo '<tr>
					<td style="width:50px;">'.$item["nombrea"].'</td>
			        <td>'.$item["cedula"].'</td>
			        <td style="width:50px;">'.$item["ultima"].'</td>
					<td>'.$item["diagnostico"].'</td>
					<td>'.$item["tratamiento"].'</td>
			        <td style="width:100px">
			        	<a href="#historiamedica'.$item["id"].'" data-toggle="modal">
			        		<span class="btn btn-info fa fa-pencil modificarMascota">
			        		</span>
			        	</a>
			        	<a href="index.php?action=historiamedica&idBorrarMascota='.$item["id"].'">
			        		<span class="btn btn-danger fa fa-times eliminarrMascota" style="margin-left:10px;">
			        		</span>
		        		</a>
		        	</td>
	        	</tr>

	        		<div id="historiamedica'.$item["id"].'" class="modal fade">
			      	
			      	<div class="modal-dialog modal-content">
			      		
			      		<div class="modal-header" style="border:1px solid #eee">

			      			<button type="button" class="close" data-dismiss="modal">&times;</button>
			      			
			      			<h3 class="modal-title">Editar Mascota</h3>
			      		
			      		</div>
			      		
			      		<div class="modal-footer" style="border:1px solid #eee">

			      			 <form style="padding: 20px" method="post">
        
						        <input type="hidden" name="idHistorial" value="'.$item["id"].'">

						        <div class="form-group">
						          <label style="float:left">Ultima visita:</label>
						          <input type="date" name="editarUltima" value="'.$item["ultima"].'" class="form-control" required>
						        </div>

						       <div class="form-group">
						       <label style="float:left">Antecedentes:</label>
						          <input type="text" name="editarAntecedentes" value="'.$item["antecedentes"].'" class="form-control" required>
						       </div>

   						       <div class="form-group">
   						       <label style="float:left">Sintomas:</label>
						          <input type="text" name="editarSintomas" value="'.$item["sintomas"].'" class="form-control" required>
						       </div>

    					       <div class="form-group">
   						       <label style="float:left">Diagnostico:</label>
						          <input type="text" name="editarDiagnostico" value="'.$item["diagnostico"].'" class="form-control" required>
						       </div>

       					       <div class="form-group">
   						       <label style="float:left">Tratamiento:</label>
						          <input type="text" name="editarTratamiento" value="'.$item["tratamiento"].'" class="form-control" required>
						       </div>

						       <div>
			   					       <div class="form-group">
									       <label style="float:left">Nombre Mascota:</label>
								          <input type="text" readonly value="'.$item["nombrea"].'" class="form-control">
								       </div>
   			   					       <div class="form-group">
									       <label style="float:left">Cedula:</label>
								          <input type="text" readonly value="'.$item["cedula"].'" class="form-control">
								       </div>
	   					       			<div class="form-group">
									       <label style="float:left">Tipo Animal:</label>
								          <input type="text" readonly value="'.$item["tipoanimal"].'" class="form-control">
								       </div>
   	   					       			<div class="form-group">
									       <label style="float:left">Raza:</label>
								          <input type="text" readonly value="'.$item["raza"].'" class="form-control">
								       </div>
   	   					       			<div class="form-group">
									       <label style="float:left">Peso:</label>
								          <input type="text" readonly value="'.$item["peso"].'Kg" class="form-control">
   					       				</div>
  	   					       			<div class="form-group">
									       <label style="float:left">Fecha de nacimiento:</label>
								          <input type="text" readonly value="'.$item["fechan"].'" class="form-control">
								       </div>
       	   					       		<div class="form-group">
									       <label style="float:left">Sexo:</label>
								          <input type="text" readonly value="'.$item["sexo"].'" class="form-control">
								       </div>
   	   					       			<div class="form-group">
									       <label style="float:left">Fecha de consulta:</label>
								          <input type="text" readonly value="'.$item["fechac"].'" class="form-control">
								       </div>
						       </div>						       

						       <div class="form-group text-center">
						       		<input type="submit" id="guardarMascota" value="Actualizar Historial" class="btn btn-primary">
						       </div>
						      
						      </form>

			      		</div>
			      	
			      	</div>
			      
			      </div>

	        	';

		}

	}

	#editar historial

	public function editarHistorial(){

		if(isset($_POST["editarUltima"])){

			$datosController = array("ultima" => $_POST["editarUltima"],
									 "antecedentes" => $_POST["editarAntecedentes"],
									 "diagnostico" => $_POST["editarDiagnostico"],
									 "sintomas" => $_POST["editarSintomas"],
									 "tratamiento" => $_POST["editarTratamiento"],
									 "id" => $_POST["idHistorial"]);

			$respuesta = historiaMedicaModel::editarHistorialMedico($datosController, "historialm");

				if($respuesta == "ok"){
					echo '<script>
						swal({
						title: "¡OK!",
						text: "Historial editado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';
				}else{

					echo '<div class="alert alert-warning"><b>A ocurrido un error</div>';
				
				}	
			}


	}

	#borrar historial

	public function borrarHistorial(){

		if(isset($_GET["idBorrarMascota"])){

			$datos = $_GET["idBorrarMascota"];

			$respuesta = historiaMedicaModel::borrarHistorialModel($datos, "historialm");

			if($respuesta == "ok"){

				echo '<script>
						swal({
						title: "¡OK!",
						text: "Historial borrado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';

			}

		}

	}

}