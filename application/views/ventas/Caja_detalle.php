	<div class="col-md-12">
	<div class="table-responsive">
	<table class="table table-sm table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col" hidden>ID DETALLE</th>
      <th scope="col" hidden>ID VENTA</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">SUBTOTAL</th>
      <th scope="col">OPCIONES</th>
   </tr>
  </thead>
	<?php
	foreach ($res1 as $object){
		$id_detalle=$object->id_detalle;
		$id_venta=$object->id_venta;
		$nom_producto=$object->nom_producto;
		$cantidad=$object->cantidad;
		$subtotal=$object->subtotal;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<td hidden>".$id_detalle."</td>";
			echo "<td hidden>".$id_venta."</td>";
			echo "<td>".$nom_producto."</td>";
			echo "<td>".$cantidad."</td>";
			echo "<td>$ ".$subtotal."</td>";
			echo "<td><center><div class='row justify-content-center'><form>
					<input type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal_editacaja' value='M' id='editacaja'>
					<form action = 'http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/eliminar_detalleventa/$id_detalle/$id_venta' method='POST'>
					<button type='submit' class='btn btn-danger' >X</button>
					</form></div></center></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>