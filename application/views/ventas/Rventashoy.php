<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>VENTAS DEL DÍA DE HOY</h2>
	</div>
	<hr>
		<div align='left'>
	<form action = "http://localhost:8080/systelecoms/index.php/ventas/Reporte_PDF_ventahoy/ExportarPDF/<?php echo $id?>">
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
	</form>
	</div>
	<br>
	<div class="col-md-12">
	
	<table class="table table-sm table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col">N. venta</th>
      <th scope="col">NOMBRE DEL CLIENTE</th>
      <th scope="col">NOMBRE DEL EMPLEADO</th>
	  <th scope="col">PRODUCTO</th>
	  <th scope="col">CANTIDAD</th>
	  <th scope="col">SUBTOTAL</th>
      <th scope="col">ESTADO</th>
      <th scope="col">FECHA</th>
      <th scope="col">HORA</th>
   </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_venta=$object->id_venta;
		$cliente=$object->cliente;
		$empleado=$object->empleado;
		$nom_producto=$object->nom_producto;
		$cantidad=$object->cantidad;
		$subtotal=$object->subtotal;
		$estado=$object->estado;
		$fecha=$object->fecha;
		$hora_venta=$object->hora_venta;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<td>".$id_venta."</td>";
			echo "<td>".$cliente."</td>";
			echo "<td>".$empleado."</td>";
			echo "<td>".$nom_producto."</td>";
			echo "<td>".$cantidad."</td>";
			echo "<td>".$subtotal."</td>";
			echo "<td>".$estado."</td>";
			echo "<td>".$fecha."</td>";
			echo "<td>".$hora_venta."</td>";
			echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</form>
