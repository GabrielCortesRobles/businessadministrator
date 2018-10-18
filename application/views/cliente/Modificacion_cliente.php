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
		<style>
			.formulario	
		{
				background-color: #e9ecefba;
				padding: 30px;
				height: 110%;
				width: 450px;
				margin-left: 40%;
				margin-bottom: 50px;
				border-radius: 7px;
		}
		</style>
	</head>
	<body>
		<fieldset>
		<!-----Formulario modificación cliente----->
			<form class="was-validated" action = 'http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/actualizar_cliente' method='POST'>
				<div class='formulario'>
					<div align='center'>
						<h2>Modificacion Cliente</h2>
					</div>
					<hr>
					<div class="col-md-14"  hidden>
						<label>ID :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa id del cliente" name='id_cliente' value='<?php echo $result[0]->id_cliente?>'>
					</div>
					
					<div class="col-md-14">
						<label>RFC:</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa id del cliente" name='rfc_cliente' value='<?php echo $result[0]->rfc_cliente?>'>
					</div>
					
					<div class="col-md-14">
						<label>Nombre :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa Nombre" name='nom_cliente' value='<?php echo $result[0]->nom_cliente?>' required>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label>Apellido paterno :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Apellido paterno" name='ap_cliente' value='<?php echo $result[0]->ap_cliente?>' required>
						</div>
						
						<div class="col-md-6">
							<label>Apellido Materno :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Apellido materno" name='am_cliente' value='<?php echo $result[0]->am_cliente?>' required>
						</div>
					</div>
					
					<div class="col-md-14">
						<label>Calle :</label>
						<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la calle" name='calle' value='<?php echo $result[0]->calle?>' required>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label>Número interior :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_interior' value='<?php echo $result[0]->numero_interior?>' required>
						</div>
						
						<div class="col-md-6">
							<label>Número exterior :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_exterior' value='<?php echo $result[0]->numero_exterior?>' required>
						</div>
					</div>

						<div class="col-md-14">
							<label>Colonia :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la colonia" name='colonia' value='<?php echo $result[0]->colonia?>' required>
						</div>
					
					<div class="row">
						<div class="col-md-8">
							<label>municipio :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Municipio" name='municipio' value='<?php echo $result[0]->colonia?>' required>
						</div>
						
						<div class="col-md-4">
							<label>Codigo postal :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Codigo postal" name='cp' value='<?php echo $result[0]->cp?>' required>
						</div>	
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Correo electronico :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Correo electronico" name='correo' value='<?php echo $result[0]->correo?>' required>
						</div>	
						
						<div class="col-md-6">
							<label>Telefono :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Telefono" name='telefono' value='<?php echo $result[0]->telefono?>' required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							Sexo :
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="customControlValidation6" name="sexo" value='Hombre' checked>
								<label class="custom-control-label" for="customControlValidation6">Hombre</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input type="radio" class="custom-control-input" id="customControlValidation5" name="sexo" value='Mujer'>
								<label class="custom-control-label" for="customControlValidation5">Mujer</label>
								<div class="invalid-feedback">Seleccione su sexo, por favor</div>
							</div>
						</div>
						
						<div class="col-md-6">
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
				</div>



			</form>
		</fieldset>
	</body>
</html>