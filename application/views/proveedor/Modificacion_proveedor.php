<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <title></title>
	<style>
		.formulario	
	{
		    background-color: #e9ecefba;
			padding: 30px;
			height: 100%;
			width: 450px;
			margin-left: 40%;
			margin-top: 50px;
			border-radius: 7px;
	}
	</style>
  </head>
	<body>
		<fieldset>
			<form class="was-validated" action = 'http://localhost:8080/systelecoms/index.php/proveedor/Controller_proveedor/actualizar_proveedor' method='POST'>
				<div class='formulario'>
					<div align='center'>
					<h2>Modificacion Proveedor</h2>
					</div>
					<hr>
					<div class="col-md-14" hidden>
					  <label ="customControlValidation4"> </label>
					  <input type="text" class="form-control is-valid" id="id_proveedor" name='id_proveedor' value='<?php echo $result[0]->id_proveedor?>'>
					</div>
					
					<div class="col-md-14">
					  <label ="customControlValidation4">RFC*: </label>
					  <input type="text" class="form-control is-valid" id="rfc_proveedor" placeholder="Ingresa su rfc" name='rfc_proveedor' value='<?php echo $result[0]->rfc_proveedor?>'>
					</div>
					
					<div class="col-md-14">
					  <label>*Nombe de la empresa: </label>
					  <input type="text" class="form-control is-valid" id="nom_empresa" placeholder="Ingresa nombre de la empresa" name='nom_empresa' value='<?php echo $result[0]->nom_empresa?>'>
					</div>
					
					<div class="col-md-14">
					  <label for="customControlValidation4">*Dirección:</label>
					  <input type="text" class="form-control is-valid" id="direccion" placeholder="Ingresa su dirección completa" name='direccion' value='<?php echo $result[0]->direccion?>'>
					</div>
					
					<div class='row'>
					<div class="col-md-6">
					  <label>*Correo:</label>
					  <input type="text" class="form-control is-valid" id="correo" placeholder="Ingresa tu e-mail" name='correo' value='<?php echo $result[0]->correo?>'>
					</div>
					
					<div class="col-md-6">
					  <label>*Telefono:</label>
					  <input type="text" class="form-control is-valid" id="telefono" placeholder="Ingresa su num. telefonico" name='telefono' value='<?php echo $result[0]->telefono?>'>
					</div>
					  </div>
					
					<div class="col-md-3">
					*Activo :
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" id="activo_modprov1" name="activo" value='Si' checked>
						<label class="custom-control-label" for="activo_modprov1">Si</label>
					</div>
					<div class="custom-control custom-radio mb-3">
						<input type="radio" class="custom-control-input" id="activo_modprov" name="activo" value='No' >
						<label class="custom-control-label" for="activo_modprov">No</label>
						<div class="invalid-feedback">Seleccione si esta activo</div>
					</div>
					</div>
					  
					  
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value='Enviar'>
					</div>
				</div>
			</form>
		</fieldset>
	</body>
</html>