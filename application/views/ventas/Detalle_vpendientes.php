<div class="col-sm-12 col-md-12 col-lg-12">
	<table class="table table-sm table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col" hidden>ID DETALLE</th>
      <th scope="col" >ID</th>
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
			echo "<td>".$id_venta."</td>";
			echo "<td>".$nom_producto."</td>";
			echo "<td>".$cantidad."</td>";
			echo "<td>$ ".$subtotal."</td>";
			echo "<td><center><div class='row justify-content-center'>
					<form action = '".base_url()."index.php/ventas/Controller_reporteventas/eliminardetalle_venta/$id_detalle/$id_venta' method='POST'>
					<button type='submit' class='btn btn-danger' ><i class='fas fa-times-circle'></i></button>
					</form></div></center></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>