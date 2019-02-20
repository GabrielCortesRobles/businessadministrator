<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

?>
<fieldset class='form' id='fieldset'>

<!-- Modal alta empleado -->
<div class="modal fade" id="alta_empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" id='1'>
    <div class="modal-content" id='2'>
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle">Alta Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form class="was-validated" name='formulario' method='POST' id='3'>
  
    <div class="col-md-14">
      <label>*Nombre :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Ingresa Nombre" name='nom_empleado' required>
    </div>
	
	<div class="row">
    <div class="col-md-6">
      <label>*Apellido paterno :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Apellido paterno" name='ap_empleado' required>
    </div>
	
	<div class="col-md-6">
		<label>*Apellido Materno :</label>
		<input type="text" class="form-control is-valid" id="" placeholder="Apellido materno" name='am_empleado' required>
    </div>
	</div>
	
	<div class="row">
    <div class="col-md-6">
      <label>*CURP :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="CURP" name='curp_empleado' required>
    </div>
	
	<div class="col-md-6">
		<label>*RFC :</label>
		<input type="text" class="form-control is-valid" id="" placeholder="RFC" name='rfc_empleado' required>
    </div>
	</div>
	
	<div class="row">	
	<div class="col-md-6">
		<label>*Fecha de nacimiento :</label>
		<input type="date" class="form-control is-valid" id="" name='fecha_nacimiento' required>
    </div>
	</div>
	
	<div class="col-md-14">
      <label>*Calle :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Nombre de la calle" name='calle' required>
    </div>
	
	<div class="row">
    <div class="col-md-3">
      <label>*N. interno :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Num. interno" name='numero_interior' required>
    </div>
	
    <div class="col-md-3">
      <label>*N. externo :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Num. externo" name='numero_exterior' required>
    </div>

    <div class="col-md-6">
      <label>*Colonia :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Nombre de la colonia" name='colonia' required>
	</div>
    </div>
	
	<div class="row">
    <div class="col-md-8">
      <label>*Municipio :</label>
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
      <label>*Codigo postal :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Codigo postal" name='cp' required>
    </div>	
	</div>

	<div class="row">
    <div class="col-md-6">
      <label>*Correo electronico :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Correo electronico" name='correo' required>
    </div>	
	
    <div class="col-md-6">
      <label>*Telefono :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Telefono" name='telefono' required>
    </div>
  </div>

  	<div class="row">
  <div class="col-md-6">
	<label>*Departamento :</label>
    <select class="custom-select" name='id_tipoempleado' required>
      <option value="">Selecciona un puesto, por favor</option>
        <?php
										
          $query = $mysqli -> query ("SELECT * FROM tipo_empleado");
											
          while ($valores = mysqli_fetch_array($query)) {
												
            echo '<option value="'.$valores[id_tipoempleado].'">'.$valores[tipo_empleado].'</option>';
													
          }
        ?>
    </select>
  </div>
  
  	<div class="col-md-3">
	*Sexo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="sexo1" name="sexo" value='Hombre' checked>
		<label class="custom-control-label" for="sexo1">Hombre</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input" id="sexo" name="sexo" value='Mujer'>
		<label class="custom-control-label" for="sexo">Mujer</label>
		<div class="invalid-feedback">Seleccione su sexo, por favor</div>
	</div>
	</div>

	<div class="col-md-3">
	*Activo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="activo1" name="activo" checked>
		<label class="custom-control-label" for="activo1">SI</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input" id="activo" name="activo">
		<label class="custom-control-label" for="activo">NO</label>
		<div class="invalid-feedback">Selecciona una opcion, por favor</div>
	</div>
	</div>
	</div>
	
	<div>
		<label>Desea crear una cuenta de usuario para este empleado.</label>
		<div class="col-md-2">
			<input type="button" class="btn btn-success" value="Crear cuenta" name="cuenta" id="cuenta">
		</div>
	</div>
	
	<div id="permisos" name='permisos' hidden>
	<label>Configuracion de cuenta de usuario. (opcional).</label>
		<div class='row'>
			<div class='col-md-6'>
				<label>Contraseña :</label>
				<input type='password' class='form-control is-valid' id='' placeholder='Contraseña' name='contrasena' >
			</div>
		</div>
		<label>Seleccione privilegios los para el empleado. (opcional).</label>
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_venta' id='privilegio_venta'>
				<label class='form-check-label' for='privilegio_venta'>Venta</label>
		</div>
			
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_almacen' id='privilegio_almacen'>
				<label class='form-check-label' for='privilegio_almacen'>Almacen</label>
		</div>

		<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='privilegio_caja' id='privilegio_caja'>
				<label class='form-check-label' for='privilegio_caja'>Caja</label>
		</div>
	
	</div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_empleado'>
      </div>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
  </div>
</div>
</fieldset>