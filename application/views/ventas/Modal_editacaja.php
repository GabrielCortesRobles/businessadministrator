<!-- Modal -->
<div class="modal fade" id="modal_editacaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div align='center'><h5 class="modal-title" id="exampleModalLongTitle">Articulo</h5></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<div class="modal-body">
				<table border='1'>
					<tr>
						<td>
							<div class='col-md-12'>
								<label>Producto:</label>
								<input type="text" class='form-control' value='<?php echo $editacaja[0]->nom_producto?>' name="cajaproducto" id="cajaproducto" readonly >
							</div>
						</td>
						<td>
							<div class='col-md-12'>
								<label>Cantidad:</label>
								<input type="text" class='form-control' name="cajacantidad" id="cajacantidad">
							</div>
						</td>
						<td>
							<div class='col-md-12'>
								<label>subtotal:</label>
								<input type="text" class='form-control' value='<?php echo $editacaja[0]->subtotal?>' name="cajasubtotal" id="cajasubtotal" readonly>
							</div>
						</td>
					</tr>
				</table>
			</div>
	  </div>
  </div>
</div>