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
    <title></title>
	<!---------Estilo Fomulario modificación empleado------------>
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
	<!-----------------Formulario modificación empleado----------------->
  <form class="was-validated" action = 'http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/actualizar_empleado' method='POST'>
  <div class='formulario'>
	<div align='center'>
	<h2>Modificación Empleado</h2>
	</div>
	<hr>
    <div class="col-md-12"  hidden>
      <label>ID :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa nombre del producto" name='id_empleado' value='<?php echo $result[0]->id_empleado?>'>
    </div>
	
    <div class="col-md-14">
      <label>Nombre :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa Nombre" name='nom_empleado' value='<?php echo $result[0]->nom_empleado?>' required>
    </div>
	
	<div class="row">
    <div class="col-md-6">
      <label>Apellido paterno :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Apellido paterno" name='ap_empleado' value='<?php echo $result[0]->ap_empleado?>' required>
    </div>
	
	<div class="col-md-6">
		<label>Apellido Materno :</label>
		<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Apellido materno" name='am_empleado' value='<?php echo $result[0]->am_empleado?>' required>
    </div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
		  <label>*CURP :</label>
		  <input type="text" class="form-control is-valid" id="" placeholder="CURP" name='curp_empleado' value='<?php echo $result[0]->curp_empleado?>' required>
		</div>
		
		<div class="col-md-6">
			<label>*RFC :</label>
			<input type="text" class="form-control is-valid" id="" placeholder="RFC" name='rfc_empleado' value='<?php echo $result[0]->rfc_empleado?>' required>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<label>*Fecha de nacimiento :</label>
			<input type="date" class="form-control is-valid" id="" name='fecha_nacimiento' value='<?php echo $result[0]->fecha_nacimiento?>' required>
		</div>
	</div>
	
	<div class="col-md-14">
      <label>Calle :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la calle" name='calle' value='<?php echo $result[0]->calle?>' required>
    </div>
	
	<div class="row">
    <div class="col-md-4">
      <label>Num. Interior :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_interior' value='<?php echo $result[0]->numero_interior?>' required>
    </div>
    <div class="col-md-4">
      <label>Num. Exterior :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_exterior' value='<?php echo $result[0]->numero_exterior?>' required>
    </div>

    <div class="col-md-8">
      <label>Colonia :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la colonia" name='colonia' value='<?php echo $result[0]->colonia?>' required>
    </div>
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
	<label>Area :</label>
    <select class="custom-select" name='id_tipoempleado' required>
      <option value="<?php echo $result[0]->id_tipoempleado?>"><?php echo $result[0]->tipo_empleado?></option>
        <?php
										
          $query = $mysqli -> query ("SELECT * FROM tipo_empleado");
											
          while ($valores = mysqli_fetch_array($query)) {
												
            echo '<option value="'.$valores[id_tipoempleado].'">'.$valores[tipo_empleado].'</option>';
													
          }
        ?>
    </select>
  </div>
	
  	<div class="col-md-3">
	Sexo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="customControlValidation5" name="sexo" value='Hombre' checked>
		<label class="custom-control-label" for="customControlValidation5">Hombre</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input" id="customControlValidation6" name="sexo" value='Mujer'>
		<label class="custom-control-label" for="customControlValidation6">Mujer</label>
		<div class="invalid-feedback">Seleccione su sexo, por favor</div>
	</div>
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
	
	<div id="permisos" name='permisos'>
		<label>Configuracion de cuenta de usuario. (opcional).</label>
		<div class='row'>		
			<div class='col-md-6'>
				<label>Contraseña :</label>
				<input type='password' class='form-control is-valid' id='' placeholder='Contraseña' name='contrasena' value=''>
			</div>
		</div>
		<label>Seleccione privilegios los para el empleado. (opcional).</label>
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_venta' value='1' id='privilegio_venta'>
				<label class='form-check-label' for='privilegio_venta'>Venta</label>
		</div>
			
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_almacen' value='1' id='privilegio_almacen'>
				<label class='form-check-label' for='privilegio_almacen'>Almacen</label>
		</div>

		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_caja' value='1' id='privilegio_caja'>
				<label class='form-check-label' for='privilegio_caja'>Caja</label>
		</div>
	
	</div>
	
	</div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value='Enviar'>
      </div>

</form>
</fieldset>
  </body>
</html>