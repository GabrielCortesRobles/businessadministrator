<?php
 
  $mysqli = new mysqli('www.rodihsa.com','rodihsa_user','$Y$T3L3C0M@','rodihsa_systelecom');

?>
<fieldset class='form'>

<!-- Modal -->
<div class="modal fade" id="alta_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alta Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="was-validated">
	<div class='row'>
	<div class="col-md-6">
		<label>*Proveedor :</label>
		<select class="custom-select" name='id_proveedor' required>
			<option value="">Selecciona un proveedor, por favor</option>
			<?php
										
				$query = $mysqli -> query ("SELECT * FROM proveedor");
											
				while ($valores = mysqli_fetch_array($query)) 
				{
												
					echo '<option value="'.$valores[id_proveedor].'">'.$valores[nom_empresa].'</option>';
													
				}
			?>
		</select>
	</div>
	
    <div class="col-md-6">
      <label>*Nombe del producto :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa nombre del producto" name='nom_producto' required>
    </div>
	</div>
	
	<div class='row'>
	<div class="col-md-6">
		<label>*Marca :</label>
		<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa marca del producto" name='marca' required>
    </div>
	
    <div class="col-md-6">
      <label>*Codigo interno :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa su codigo interno" name='codigo_int' required>
    </div>
	</div>
	
<div class='row'>
		<div class="col-md-6">
			<label>*Codigo sat :</label>
			<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa el codigo sat" name='codigo_sat' required>
		</div>
	
    <div class="col-md-6">
      <label for="customControlValidation4">*cantidad:</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa su cantidad" name='cantidad_prod' required>
    </div>
  </div>
	
	
    <div class="col-md-14">
      <label for="customControlValidation4">Descripción :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa una descripción" name='descripcion'>
    </div>
	<div class='row'>
    <div class="col-md-6">
      <label for="customControlValidation4">*Precio de adquisición :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de adquisicíón" name='precio_adquisicion' required>
    </div>
	
    <div class="col-md-6">
      <label for="customControlValidation4">*Precio unitario :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio por pieza" name='precio_cu' required>
    </div>
	</div>
	
	
	<div class='row'>
    <div class="col-md-6">
      <label for="customControlValidation4">*Precio mediomayoreo :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de menudeo" name='precio_menudeo' required>
    </div>
	
	<div class="col-md-6">
      <label for="customControlValidation4">*A partir de:</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas medio mayoreo" name='piezas_mediomayoreo' required>
    </div>
	</div>
	
	<div class='row'>
    <div class="col-md-6">
      <label>*Precio mayoreo :</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de mayoreo" name='precio_mayoreo' required>
    </div>
	
	<div class="col-md-6">
      <label for="customControlValidation4">* Apartir de:</label>
      <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas de mayoreo" name='piezas_mayoreo' required>
    </div>
	
	<div class="col-md-6">
	*Activo:
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" name="activo" id='activo_prod1' checked>
		<label class="custom-control-label" for="activo_prod1">Si</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input"  name="activo" id='activo_prod'>
		<label class="custom-control-label" for="activo_prod">No</label>
		
	</div>
	</div>
	
	</div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_producto'>
      </div>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
  </div>
</div>
	</fieldset>