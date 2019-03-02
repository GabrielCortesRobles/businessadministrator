<?php
	error_reporting(0);
  $mysqli = new mysqli('www.rodihsa.com', 'rodihsa_user', '$Y$T3L3C0M@', 'rodihsa_systelecom');

	//condicion para recuperar la sesion
	if ($_SESSION['id_empleado'] == null)
	{
		session_start();
	}
	else
	{
		// transaformacion de la sesión en variables para facilitar su llamado
		$id_empleado = $_SESSION['id_empleado'];
		$nom_empleado = $_SESSION['nom_empleado'];
		$administrador = $_SESSION['administrador'];
		$caja = $_SESSION['caja'];
		$almacen = $_SESSION['almacen'];
		$venta = $_SESSION['venta'];
	}
?>
		<div class='container-fluid'>
			<form class="was-validated" method='POST'>
				<fieldset class='form'>
					<h1 align="center">Venta de Productos</h1>
					<fieldset class='apartado'>
					<div class='container'>
						<label class='form-label' for='facturar'><b>¿Desea facturar?</b></label>
						<input type='button' class='btn btn-outline-primary' name='facturar' value='Si' id='facturar'>
						<input type='button' class='btn btn-outline-danger' name='nofacturar' value='No' id='nofacturar' hidden='true'>
					</div>
					<div class='container justify-content-md-center justify-content-sm-center justify-content-lg-center' id='cliente' hidden='true'>
						<h5 align="center">Datos Cliente</h5>
						<br>
						<div class='row'>
							<div class="form-group row">

								<div class='col-sm-5 col-md-2 col-lg-2'>
									<label for="validationDefault01">ID:</label>
									<input list="clientes" class='form-control' value='<?php echo $venta1[0]->id_cliente?>' name="id_cliente" id="mvid_cliente" >

									<datalist id="clientes">
										<?php
																		
										  $query = $mysqli -> query ("SELECT * FROM cliente");
																			
										  while ($valores = mysqli_fetch_array($query)) {
																				
											echo '<option value="'.$valores[id_cliente].'">'.$valores[id_cliente]." ".$valores[nom_cliente]." ".$valores[ap_cliente]." ".$valores[am_cliente].'</option>';
																					
										  }
										?>
									</datalist>
								</div>
							
								<div class='col-sm-5 col-md-2 col-lg-2'>
									<label>RFC:</label>
									<input type="text" class='form-control' value='<?php echo $venta1[0]->rfc_cliente?>' name="rfc_cliente" id="mvrfc_cliente" readonly />
								</div>

								<div class='col-sm-2 col-md-2 col-lg-2' >
									<label>Nombre:</label>
									<input type="text" class='form-control' value='<?php echo $venta1[0]->nom_cliente?>' name="nom_cliente" id="mvnom_cliente" readonly />
								</div>
								
								<div class='col-sm-4 col-md-2 col-lg-2'>
									<label>AP Paterno:</label>
									<input type="text" class='form-control' value='<?php echo $venta1[0]->ap_cliente?>' name="ap_cliente" id="mvap_cliente" readonly />
								</div>
								
								<div class='col-sm-4 col-md-2 col-lg-2'>
									<label>AP Materno:</label>
									<input type="text" class='form-control' value='<?php echo $venta1[0]->am_cliente?>' name="am_cliente" id="mvam_cliente" readonly />
								</div>
								
								<div class='col-sm-4 col-md-2 col-lg-2' style="padding-top: 1.75em;">
									<label></label><br>
									<input type="button" class="btn btn-outline-success" name="buscar2" value="Buscar" id="buscar2"/>
									<input type="button" class="btn btn-outline-danger" name="limpiar_cliente" value="Limpiar" id="limpiar_cliente"/>
								</div>
								
							</div>
						</div>
					</div>
					</fieldset>
					
<!------------------------------------------------------- Comienza apartado empleado ------------------------------------------------------------------->
				<fieldset class='apartado'>
					<h5 align='center'>Datos Empleado</h5>
					<br>
					<div class='container justify-content-md-center justify-content-sm-center justify-content-lg-center'>
					<div class='row'>
							<div class='col-sm-2 col-md-2 col-lg-2'>
								<label>Clave:</label>
								<input type="text" class='form-control' value='<?php echo $emp[0]->id_empleado?>' name="id_empleado" id="id_empleado"/>
							</div>
							
							<div class='col-sm-5 col-md-2 col-lg-2'>
								<label>Nombre:</label>
								<input type="text" class='form-control' value='<?php echo $emp[0]->nom_empleado?>' name="nom_empleado" id="nom_empleado" required >
							</div>
							
							<div class='col-sm-5 col-md-2 col-lg-2'>
								<label>AP Paterno:</label>
								<input type="text" class='form-control' value='<?php echo $emp[0]->ap_empleado?>' name="ap_empleado" id="ap_empleado" readonly required />
							</div>
							
							<div class='col-sm-5 col-md-2 col-lg-2'>
								<label>AP Materno:</label>
								<input type="text" class='form-control' value='<?php echo $emp[0]->am_empleado?>' name="am_empleado" id="am_empleado" readonly required />
							</div>
							<div class='col-sm-5 col-md-2 col-lg-4' style="padding-top: 1.75em;">
								<input type="button" class="btn btn-outline-info" name="buscar1" value="Buscar" id="buscar1" />
								<input type="button" class="btn btn-outline-danger" name="limpiar_empleado" value="Limpiar" id="limpiar_empleado" />
							</div>
						</div>
					</div>
				</fieldset>
<!------------------------------------------------------- Comienza apartado producto ------------------------------------------------------------------->
					
			<fieldset class='apartado'>
				<h5 align='center'>Producto</h5>
				<div class='row justify-content-md-center'>
					<div class='container'>
						<div class="form-goup row">
							<div class='col-sm-2 col-md-2 col-lg-2' hidden>
								<label>Id_prod:</label>
								<input type="text" class='form-control' name="id_producto" id="id_producto"  />
							</div>
							
							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label>Cód. SAT:</label>
								<input type="text" class='form-control' name="cod" id="cod"  readonly />
							</div>
							
							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label>Cód. interno:</label>
								<input type="text" class='form-control' name="cod_int" id="cod_int" />
							</div>
							
							<div class='col-sm-6 col-md-4 col-lg-4'>
								<label>Nombre:</label>
								<input list="productos" class='form-control' name="nom_producto" id="nom_producto">

								<datalist id="productos">
										<?php
																		
										  $query3 = $mysqli -> query ("SELECT * FROM producto");
																			
										  while ($valores3 = mysqli_fetch_array($query3)) {
																				
											echo '<option value="'.$valores3[nom_producto].'">'.$valores3[nom_producto].'</option>';
																					
										  }
										?>
								</datalist>
							</div>

							<div class='col-sm-12 col-md-4 col-lg-4'>
								<label>Descripción:</label>
								<input type="text" class='form-control' name="desc" id="desc" readonly />
							</div>

						</div>
						
						<div class="form-goup row justify-content-md-center">
							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label>Existencias:</label>
								<input type="text" class='form-control' name="cantidad_prod" id="cantidad_prod" readonly />
							</div>
							
							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label>Cantidad:</label>
								<input type="text" class='form-control' name="cant" id="cant" />
							</div>
							
							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label>Precio:</label>
								<div class="input-group mb-1">
								  <div class="input-group-prepend">
									<span class="input-group-text">$</span>
								  </div>
								  <input type="text" class='form-control' name="prec" id="prec" readonly />
								</div>
							</div>

							<div class='col-sm-3 col-md-2 col-lg-2'>
								<label><b>Total:</b></label>
								<div class="input-group mb-1">
								  <div class="input-group-prepend">
									<span class="input-group-text">$</span>
								  </div>
								  <input type="text" class='form-control' name="totalprod" id="totalprod" readonly />
								</div>
							</div>
						</div>
					<br>
					<div class='row justify-content-md-center'>
						<div class='form-goup row'>
							<div class='col-auto'>
								<input type="button" class="btn btn-outline-primary" value="Agregar" name="Agregar" id="agregar"/>
								<input type="button" class="btn btn-outline-secondary" name="buscar" value="Buscar" id="buscar"/>
							</div>
						</div>
					</div>
				</div>	
			</fieldset>
<!------------------------------------------------------- Comienza la tabla de los productos ------------------------------------------------------------------->
				  
				<div class='container-fluid'>
				<div class='tableprods table-responsive'>
				  <table class='table' align="center" border="1" id="mitabla">
				  <thead class='thead-dark'>
				  <tr><th scope="col">ID</th><th scope="col">Código Int</th><th scope="col">Nombre producto</th><th scope="col">Código SAT</th><th scope="col">Descripción</th>
				  <th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Subtotal</th><th scope="col">Eliminar</th><tr>
				  </thead>
				 
				  </table>
				</div>
				</div>
				  <div class="row justify-content-md-center">
					<div class='col-sm-2 col-md-2 col-lg-2'>
						<!---<b><label>Total:</label></b>--->
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text"><b>Total </b>: $</span>
							</div>
							<input type="text" class='form-control' name="total" id="total" readonly />
						</div>
					</div>
					
					<?php if( ($caja || $administrador ) == 1 ) { ?>
					<div class='col-sm-2 col-md-1 col-lg-1'>
						<input type="button" value="Cobrar" class="btn btn-outline-warning" name='cobrar' id="cobrar"/>
					</div>
					<?php } ?>
				  </div>
				  <br>
					<div id='cobro' hidden>
						
						<div class='row justify-content-md-center'>
							<div class='col-sm-2 col-md-2 col-lg-2'>
								<b><label>Recibido:</label></b>
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type='text' class='form-control' name='recibido_venta' id='recibido_venta'/>
								</div>
							</div>							
							
							<div class='col-sm-2 col-md-2 col-lg-2'>
								<b><label>Cambio:</label></b>
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type='text' class='form-control' name='cambio_venta' id='cambio_venta' readonly />
								</div>
							</div>
						</div>
					</div>
					<br>
				<div class='container-fluid'>
					<div class='row justify-content-sm-center justify-content-md-center justify-content-lg-center'>
						<div class='col-sm-6 col-md-6 col-lg-6' align='center'>
							<input type="button" class="btn btn-outline-danger" value="Cancelar venta" id="cancelarventa"/>
							<input type="button" class="btn btn-primary" value='Enviar venta' id='enviar_venta'>
						</div>
					</div>
				</div>
				</fieldset>
			</form>
		</div>
		<br>
	</body>
</html>
