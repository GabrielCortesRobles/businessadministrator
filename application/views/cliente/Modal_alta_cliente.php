<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
	<script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/Alta_cliente.js"> </script> 
    <title>Alta Cliente</title>
  </head>
  <body>
	<fieldset class='form'>


<!-- Modal alta cliente -->
<div class="modal fade" id="alta_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alta Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="was-validated">

	<div class="col-md-14">
			<label>*RFC:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su RFC" name='rfc_cliente' id='rfc_cliente' required>
		</div>
	
    <div class="col-md-14">
      <label>*Nombre del cliente :</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa nombre del cliente" name='nom_cliente' id='nom_cliente' required>
    </div>
	
	<div class='row'>
    <div class="col-md-6">
      <label>*Apellido Paterno :</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa apellido paterno" name='ap_cliente' id='ap_cliente' required>
    </div>
	
    <div class="col-md-6">
      <label>*Apellido Materno: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa apellido materno" name='am_cliente' id='am_cliente' required>
    </div>
	</div>

	<div class='row'>
		<div class="col-md-6">
			<label>*CURP:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su CURP" name='curp_cliente'id='curp_cliente' required>
		</div>
	
		<div class="col-md-6">
			<label>*Fecha de nacimiento:</label>
			<input type="date" class="form-control is-valid" id="fecha_nacimiento" name='fecha_nacimiento' id='fecha_nacimiento' required>
		</div>
	</div>
	
	
		<div class="col-md-14">
			<label>*Calle:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su calle" name='calle' id='calle' required>
		</div>		
	
	
	<div class='row'>
    <div class="col-md-6">
      <label>*Número interior:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingrese su numero interior" name='numero_interior' id='numero_interior' required>
    </div>
	
    <div class="col-md-6">
      <label>*Número exterior:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingrese su numero exterior" name='numero_exterior' id='numero_exterior' required>
    </div>
	</div>
	
    <div class="col-md-14">
      <label>*Colonia:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su colonia" name='colonia' id='colonia' required>
    </div>
  
	
	
	<div class='row'>
    <div class="col-md-8">
      <label>*Municipio: </label>
      <select class="custom-select" name='municipio' required>
			<option value="">Selecciona un municipio, por favor</option>
			<?php
										
				$query = $mysqli -> query ("SELECT * FROM municipios");
											
				while ($valores = mysqli_fetch_array($query)) 
				{
												
					echo '<option value="'.$valores[id_municipio].'">'.$valores[nombre_municipio].'</option>';
													
				}
			?>
		</select>
    </div>
	
	

    <div class="col-md-4">
      <label>*Código Postal: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su código postal" name='cp' id='cp' required>
    </div>
	</div>
   
	
	
	<div class="row">
	 <div class="col-md-6">
      <label>*Correo: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su correo" name='correo_cli' id='correo_cli' required>
    </div>
	
	<div class="col-md-6">
      <label>*Telefono: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su numero telefonico" name='telefono_cli' id='telefono_cli' required>
    </div>
	</div>
	
	<div class="row">
<div class="col-md-6">
	*Sexo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input"  name="sexo" id='sexo_cli1' value='Hombre' checked>
		<label class="custom-control-label" for="sexo_cli1">Hombre</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input"  name="sexo" id='sexo_cli' value='Mujer'>
		<label class="custom-control-label" for="sexo_cli">Mujer</label>
		<div class="invalid-feedback">Seleccione su sexo, por favor</div>
	</div>
	</div>

	
	<div class="col-md-6">
	*Activo:
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" name="activo" id='activo_cli1' checked>
		<label class="custom-control-label" for="activo_cli1">Si</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input"  name="activo" id='activo_cli'>
		<label class="custom-control-label" for="activo_cli">No</label>
		
	</div>
	</div>
	</div>
	</div>
	</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_cliente'>
      </div>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
	  </div>
  </div>

	</fieldset>
  </body>
</html>