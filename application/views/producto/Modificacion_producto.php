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
  <form class="was-validated" action = 'http://localhost:8080/systelecoms/index.php/producto/Controller_producto/actualizar_producto' method='POST'>
  <div class='formulario'>
	<div align='center'>
	<h2>Modificacion Producto</h2>
	</div>
	<hr>
    <div class="col-md-12">
		<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa nombre del producto" name='id_producto' hidden value='<?php echo $result[0]->id_producto?>' >
    </div>
	
	<div class='row'>
		<div class="col-md-6">
		  <label>Nombe del producto :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa nombre del producto" name='nom_producto' value='<?php echo $result[0]->nom_producto?>' required>
		</div>
		
		<div class="col-md-6">
		  <label>Marca :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa su marca" name='marca' value='<?php echo $result[0]->marca?>' required>
		</div>
	</div>
	
	<div class='row'>
		<div class="col-md-6">
			<label>Proveedor :</label>
			<select class="custom-select" name='id_proveedor' required>
				<option value="<?php echo $result[0]->id_proveedor?>"><?php echo $result[0]->nom_empresa?></option>
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
		  <label>Codigo interno :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa su codigo interno" name='codigo_int' value='<?php echo $result[0]->codigo_int?>' required>
		</div>
	</div>
	
	<div class='row'>
		<div class="col-md-6">
			<label>codigo del SAT :</label>
			<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa el codigo del SAT" name='codigo_sat' value='<?php echo $result[0]->codigo_sat?>' required>
		</div>
		
		<div class="col-md-6">
			<label for="customControlValidation4">cantidad:</label>
			<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa su cantidad" name='cantidad_prod' value='<?php echo $result[0]->cantidad_prod?>' required>
		</div>
	</div>
	
    <div class="col-md-14">
		<label for="customControlValidation4">Descripción :</label>
		<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa una descripción" name='descripcion' value='<?php echo $result[0]->descripcion?>'>
    </div>
	
	<div class='row'>
		<div class="col-md-6">
		  <label for="customControlValidation4">*Precio por pieza :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio por pieza" name='precio_cu' value='<?php echo $result[0]->precio_cu?>' required>
		</div>
	</div>
	
	<div class='row'>
		<div class="col-md-6">
		  <label for="customControlValidation4">*Precio mediomayoreo :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de menudeo" name='precio_menudeo' value='<?php echo $result[0]->precio_menudeo?>' required>
		</div>
		
		<div class="col-md-6">
		  <label for="customControlValidation4">*A partir de:</label>
		  <input type="number" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas medio mayoreo" name='piezas_mediomayoreo' value='<?php echo $result[0]->piezas_mediomayoreo?>' required>
		</div>
	</div>
	
	<div class='row'>
		<div class="col-md-6">
		  <label>*Precio mayoreo :</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de mayoreo" name='precio_mayoreo' value='<?php echo $result[0]->precio_mayoreo?>' required>
		</div>
		
		<div class="col-md-6">
		  <label for="customControlValidation4">* Apartir de:</label>
		  <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas de mayoreo" name='piezas_mayoreo' value='<?php echo $result[0]->piezas_mayoreo?>' required>
		</div>
	</div>
	
	<div class="col-md-6">
		*Activo:
		<div class="custom-control custom-radio">
			<input type="radio" class="custom-control-input" name="activo" id='activo_modprod1' checked>
			<label class="custom-control-label" for="activo_modprod1">Si</label>
		</div>
		<div class="custom-control custom-radio mb-3">
			<input type="radio" class="custom-control-input"  name="activo" id='activo_modprod'>
			<label class="custom-control-label" for="activo_modprod">No</label>
			
		</div>
	</div>
	
	<div class="modal-footer">
        <input type="submit" class="btn btn-primary" value='Enviar'>
      </div>

</form>
</fieldset>
</div>
</html>