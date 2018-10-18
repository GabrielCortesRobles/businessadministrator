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
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		<title></title>
		<!------------Estilo de formulario empresa-------------------->
		<style>
		
			.formulario	
	{
		    background-color: #e9ecefba;
			padding: 30px;
			height: 150%;
			width: 450px;
			margin-left: 40%;
			margin-top: 50px;
			border-radius: 7px;
	}
		</style>
	</head>
	<body>
	<div class='formulario'>
		<fieldset>
		<!------Formulario modificación empresa------>
			<?php echo form_open_multipart('http://localhost:8080/systelecoms/index.php/empresa/Controller_empresa/do_upload');?>
				
					<div align='center'>
						<h2>Modificación Empresa</h2>
					</div>
					<hr>
					<div class="col-md-14">
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa el id de la empresa" name='id_empresa' value='<?php echo $result[0]->id_empresa?>' hidden>
					</div>
					<div class="col-md-14">
						<label>RFC :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa el rfc de la empresa" name='rfc_empresa' value='<?php echo $result[0]->rfc_empresa?>'>
					</div>
					
					<div class="col-md-14">
						<label>Nombre de la empresa :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa Nombre de la empresa" name='nom_empresa' value='<?php echo $result[0]->nom_empresa?>' required>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<label>Seleccione una imagen.....</label>
								<div class="">
									<input type="file" class="btn btn-outline-success" name="imagen_empresa"  size="20" lang="es">
								</div>
						</div>
					
						<div class="col-md-12">
								<label>Razón Social :</label>
								<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa la razón social de la empresa" name='razon_social' value='<?php echo $result[0]->razon_social?>' required>
						</div>
					
					<div class="col-md-12">
						<label>Calle :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la calle" name='calle' value='<?php echo $result[0]->calle?>' required>
					</div>
					
					<div class="row">
						<div class="col-md-3">
							<label>Núm. int:</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='num_calle' value='<?php echo $result[0]->num_calle?>' required>
						</div>

						<div class="col-md-8">
							<label>Colonia :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la colonia" name='colonia' value='<?php echo $result[0]->colonia?>' required>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<label>Municipio :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Municipio" name='municipio' value='<?php echo $result[0]->colonia?>' required>
						</div>
						
						<div class="col-md-4">
							<label>Código postal :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Codigo postal" name='cp' value='<?php echo $result[0]->cp?>' required>
						</div>	
					</div>

					<div class="row">
						<div class="col-md-7">
							<label>Correo electronico :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Correo electronico" name='correo' value='<?php echo $result[0]->correo?>' required>
						</div>	
						
						<div class="col-md-5">
							<label>Teléfono :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Telefono" name='telefono' value='<?php echo $result[0]->telefono?>' required>
						</div>
					</div>

					<div class="col-md-8">
							<label>Regimen Fisxal :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Correo electronico" name='correo' value='<?php echo $result[0]->correo?>' required>
						</div>
						
						<div class="col-md-3">
							Activo :
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="customControlValidation2" name="activo" value='1' checked>
								<label class="custom-control-label" for="customControlValidation2">SI</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input type="radio" class="custom-control-input" id="customControlValidation3" name="activo" value='0'>
								<label class="custom-control-label" for="customControlValidation3">NO</label>
								<div class="invalid-feedback">Selecciona una opcion, por favor</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value='Enviar'>
					</div>
				



			</form>
		</fieldset>
		</div>
	</body>
</html>