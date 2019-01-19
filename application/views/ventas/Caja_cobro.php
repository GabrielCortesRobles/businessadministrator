<form action='' method='POST'>
<div>
	<div class='row justify-content-md-center'>
		<div class='col-md-6'>
			<b><label>Recibido:</label></b>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">$</span>
				</div>
				<input type='text' class='form-control' name='recibido_venta' id='recibido_venta'/>
			</div>
		</div>							
		
		<div class='col-md-6'>
			<b><label>Cambio:</label></b>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">$</span>
				</div>
				<input type='text' class='form-control' value='0' name='cambio_venta' id='cambio_venta' readonly />
			</div>
		</div>
	</div>
	<div align="center">
		<div class='col-md-6'>
			<b><label>Total:</label></b>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">$</span>
				</div>
				<input type="text" class='form-control' value="<?php echo $res1[0]->total?>" name="total" id="total" readonly />
			</div>
		</div>
		<div>
			<input type="button" value="Cobrar" class="btn btn-outline-success" name='cobrar_venta' id="cobrar_venta"/>
		</div>
		<input type="text" class="form-control" value="<?php echo $res1[0]->id_venta?>" name="id_venta" id="id_venta" readonly hidden>
	</div>
</div>
</form>
