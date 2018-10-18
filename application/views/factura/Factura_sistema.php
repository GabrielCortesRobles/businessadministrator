<!DOCTYPE html>
<html>
   <head>
       <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	   <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script>
    <style>
	<!-----------Estilo de formulario pre-factura------------>
		.form
	
	{
		background-color: #e9ecefba;
		width: 50%;
		border-radius: 7px;
		margin:  auto;
		margin-bottom: 10px;
	}
	#factura
	{
		margin-left: auto;
		margin-right: auto;
	}

	</style>
   </head>
   <body>
   <!----------------Formulario Módulo de pre-facturación---------------------->
	  <form class="was-validated" action='http://localhost:8080/systelecoms/index.php/Controller_factura_sistema/insertar_factura' method='POST'>
			<fieldset class='form'>
				  <h1 id="p1" align="center">Módulo de Facturación</h1>
					<div class="card bg-light mb-3" style="max-width: 40rem;" id='factura'>
					  <div class="card-header">Datos del emisor</div>
						<div class="card-body">
								<div class='col-md-8'>
									<label for="validationDefault02">RFC*:</label>
									<input type="text" class='form-control' name="rfc_empresa" id="rfc_empresa" value='<?php echo $result[0]->rfc_empresa?>' readonly />
								</div>
								<div class='col-14'>
									<label for="validationDefault01">Nombre o razón social:</label>
									<input type="text" class='form-control' name="nom_razonsocial" id="nom_razonsocial" value='<?php echo $result[0]->razon_social?>'/>
								</div>
							<div class="form-group row">
								<div class='col-8'>
									<label for="validationDefault02">Régimen Fiscal*:</label>
									<input type="text" class='form-control' name="regimen_fiscal" id="regimen_fiscal"  />
								</div>
								
								<div class='col-4'>
									<label for="validationDefault02">Tipo de Factura*:</label>
									<input type="text" class='form-control' name="tipo_factura" id="tipo_factura" />
								</div>
							</div>

						</div>
					</div>
				 

					<div class="card bg-light mb-3" style="max-width: 40rem;" id='factura'>
						<div class="card-header">Datos del Receptor</div>
						<div class="card-body">
							<div class="form-group row">
								<div class='col-8'>
									<label for="validationDefault02"> Cliente Frecuente*:</label>
									<input type="text" class='form-control' name="cliente_frecuente" id="cliente_frecuente"  />
								</div>
								<div class='col-4'>
									<label for="validationDefault02">Uso de la Factura*:</label>
									<input type="text" class='form-control' name="uso_factura" id="uso_factura"/>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card bg-light mb-3" style="max-width: 40rem;" id='factura'>
						<div class="card-header">Conceptos</div>
							<div class="card-body">
								<label> Concepto</label><br>
									<div class="form-goup row">
										<div class='col-5'>
											<label for="validationDefault02">Clave de producto o servicio*:</label>
											<input type="text" class='form-control' name="clave_producto" id="clave_producto"  />
										</div>
										<div class='col-4'>
											<label for="validationDefault02">Clave de unidad*:</label>
											<input type="text" class='form-control' name="clave_unidad" id="clave_unidad" />
										</div>
										<div class='col-3'>
											<label for="validationDefault02">Cantidad*:</label>
											<input type="text" class='form-control' name="cantidad" id="cantidad" />
										</div>
									</div>
									<div class="form-goup row">
										<div class='col-6'>
											<label for="validationDefault02">Unidad*:</label>
											<input type="text" class='form-control' name="unidad" id="unidad"  />
										</div>
										<div class='col-6'>
											<label for="validationDefault02">Número de Identificación*:</label>
											<input type="text" class='form-control' name="num_identificacion" id="num_idenctificacion"/>
										</div>
									</div>
										<div class='col-14'>
											<label for="validationDefault02">Descripción*:</label>
											<input type="text" class='form-control' name="descripcion" id="descripcion" />
										</div>
									<div class="form-goup row">
										<div class='col-4'>
											<label for="validationDefault02">Valor Unitario*:</label>
											<input type="text" class='form-control' name="valor_unitario" id="valor_unitario"/>
										</div>
										<div class='col-4'>
											<label for="validationDefault02">Importe*:</label>
											<input type="text" class='form-control' name="importe" id="importe"  />
										</div>
										<div class='col-4'>
											<label for="validationDefault02">Descuento:</label>
											<input type="text" class='form-control' name="descuento" id="descuento"/>
										</div>
									</div>
									<br>
									<label>Adicionales</label>
									<br>
									<div class="form-check form-check-inline">
										<div class='custom-control custom-checkbox col-md-3'>
											<input type='checkbox' class='custom-control-input' value='1' name='adicionales_impuestos' id='customControlValidation9'>
											<label class='custom-control-label' for='customControlValidation9'>Impuestos</label>
										</div>
										
										<div class='custom-control custom-checkbox col-md-6 offset-md-1'>
											<input type='checkbox' class='custom-control-input' value='1' name='adicionales_informacion' id='customControlValidation10'>
											<label class='custom-control-label' for='customControlValidation10'>Información aduanera</label>
										</div>

										<div class='custom-control custom-checkbox col-md-4 offset-md-1'>
											<input type='checkbox' class='custom-control-input' value='1' name='adicionales_cuenta' id='customControlValidation11'>
											<label class='custom-control-label' for='customControlValidation11'>Cuenta predial</label>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card bg-light mb-3" style="max-width: 40rem;" id='factura'>
						<div class="card-header">Impuestos</div>
							<div class="card-body">
								<div class="col-md-3">
									Tipo :
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="customControlValidation5" name="tipo" value='retencion' checked>
										<label class="custom-control-label" for="customControlValidation5">Retención</label>
									</div>
									<div class="custom-control custom-radio mb-3">
										<input type="radio" class="custom-control-input" id="customControlValidation6" name="tipo" value='traslado'>
										<label class="custom-control-label" for="customControlValidation6">Traslado</label>
										<div class="invalid-feedback">Selecciona una opcion, por favor</div>
									</div>
								</div>
				
								<label>Traslado</label>
								<div class="form-goup row">
									<div class='col-4'>
										<label for="validationDefault02">Base*:</label>
										<input type="text" class='form-control' name="base" id="base"  />
									</div>
									<div class='col-4'>
										<label for="validationDefault02">Impuesto*:</label>
										<input type="text" class='form-control' name="impuesto" id="impuesto"  />
									</div>
									<div class='col-4'>
										<label for="validationDefault02">¿Tasa o cuota?*:</label>
										<input type="text" class='form-control' name="tasa_cuota" id="tasa_cuota" />
									</div>
								</div>
								<div class="form-goup row">
									<div class='col-6'>
										<label for="validationDefault02">Valor de la tasa o cuota*:</label>
										<input type="text" class='form-control' name="valor_tasa" id="valor_tasa"  />
									</div>
									<div class='col-6'>
										<label for="validationDefault02">Importe*:</label>
										<input type="text" class='form-control' name="impuestos_importe" id="impuestos_importe" />
									</div>
								</div>
								<br>
								<div class='row justify-content-md-center'>
									<div class='form-goup row'>
										<div class='col-auto'>
											<input type="submit" class="btn btn-outline-primary" value="Aceptar" name="Aceptar" id="aceptar"/>
											<input type="button" class="btn btn-outline-danger" name="buscar" value="Cancelar" id="cancelar"/>
										</div>
									</div>
								</div>
								<br>
								<!-------------Generar factura en PDF--------------->
								<div class='row justify-content-md-center'>
									<div class='form-goup row'>
										<div class='col-auto'>
											<input type="button" class="btn btn-outline-secondary" name="buscar" value="Generar reporte PDF" id="cancelar"/>
											<input type="button" class="btn btn-outline-success" name="buscar" value="Generar reporte en EXCEL" id="cancelar"/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
			<br><br>
		</fieldset>
	</form>
</body>
</html>
