<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

?>
<fieldset class='form'>

<!-- Modal -->
<div class="modal fade" id="alta_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alta Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-body">
		<form class="was-validated" method='POST'>
			<div class="col-md-14">
				<label ="customControlValidation4">RFC*: </label>
				<input type="text" class="form-control is-valid" id="rfc_proveedor" placeholder="Ingresa su rfc" name='rfc_proveedor' required>
			</div>
			
			<div class="col-md-14">
				<label>*Nombre de la empresa: </label>
				<input type="text" class="form-control is-valid" id="nom_empresa" placeholder="Ingresa nombre de la empresa" name='nom_empresa' required>
			</div>
				
			<div class="col-md-14">
				<label for="customControlValidation4">*Dirección:</label>
				<input type="text" class="form-control is-valid" id="direccion" placeholder="Ingresa su dirección completa" name='direccion' required>
			</div>
			
			<div class='row'>
				<div class="col-md-6">
				  <label for="customControlValidation4">*Correo:</label>
				  <input type="text" class="form-control is-valid" id="correo" placeholder="Ingresa tu e-mail" name='correo' required>
				</div>
				
				<div class="col-md-6">
				  <label for="customControlValidation4">*Telefono:</label>
				  <input type="text" class="form-control is-valid" id="telefono" placeholder="Ingresa su num. telefonico" name='telefono' required>
				</div>
			</div>
			
			<div class="col-md-3">
				*Activo :
				<div class="custom-control custom-radio">
					<input type="radio" class="custom-control-input" id="activo_prov1" name="activo_prov" checked>
					<label class="custom-control-label" for="activo_prov1">SI</label>
				</div>
				<div class="custom-control custom-radio mb-3">
					<input type="radio" class="custom-control-input" id="activo_prov" name="activo_prov">
					<label class="custom-control-label" for="activo_prov">NO</label>
					<div class="invalid-feedback">Selecciona una opcion, por favor</div>
				</div>
			</div>
		</form>
	</div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_proveedor'>
      </div>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
  </div>
</div>
</fieldset>