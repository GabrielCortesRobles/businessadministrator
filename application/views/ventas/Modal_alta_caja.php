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
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script>
    <title>Alta Proveedor</title>
  </head>
  <body>
	<fieldset class='form'>

<!-- Modal -->
<div class="modal fade" id="modal_alta_caja" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Módulo Caja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-body">
		<form class="was-validated" method='POST'>
			<div align="center">
					<div class='col-2'>
						<b><label>Total:</label></b>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" class='form-control' name="total" id="total" readonly />
						</div>
					</div>
				  </div>
				  
				<div id='cobro' hidden>
						
						<div class='row justify-content-md-center'>
							<div class='col-2'>
								<b><label>Recibido:</label></b>
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type='text' class='form-control' name='recibido_venta' id='recibido_venta'/>
								</div>
							</div>							
							
							<div class='col-2'>
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
			
			
			
		</form>
	</div>
	  </div>
  </div>
</div>
	</fieldset>
  </body>
</html>