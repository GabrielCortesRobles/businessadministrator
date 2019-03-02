<?php 
	error_reporting(0);
?>
  <!-----Tabla de busqueda cliente------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Módulo Caja</h2>
	</div>
	<hr>
	<div class='container-fluid'>
	<div class='row'>
	<div class="col-md-8">
	<table class="table table-sm table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col">ID</th>
      <th scope="col">NOMBRE DEL CLIENTE</th>
      <th scope="col">NOMBRE DEL EMPLEADO</th>
      <th scope="col">FECHA</th>
      <th scope="col" hidden>HORA</th>
      <th scope="col">TOTAL</th>
      <th scope="col">OPCION</th>
   </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_venta=$object->id_venta;
		$nom_cliente=$object->nom_cliente;
		$ap_cliente=$object->ap_cliente;
		$am_cliente=$object->am_cliente;
		$nom_empleado=$object->nom_empleado;
		$ap_empleado=$object->ap_empleado;
		$am_empleado=$object->am_empleado;
		$fecha=$object->fecha;
		$hora_venta=$object->hora_venta;
		$total=$object->total;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<td>".$id_venta."</td>";
			echo "<td>".$nom_cliente." ".$ap_cliente." ".$am_cliente."</td>";
			echo "<td>".$nom_empleado." ".$ap_empleado." ".$am_empleado."</td>";
			echo "<td>".$fecha."</td>";
			echo "<td hidden>".$hora_venta."</td>";
			echo "<td>$ ".$total."</td>";
			echo "<td><div class='row justify-content-center'><form action = 'caja/$id_venta' method='POST'>
					<button type='submit' class='btn btn-primary' >Ver</button>
					</form>
					<form action = '<?= base_url() ?>index.php/ventas/Controller_caja/eliminar_venta/$id_venta' method='POST'>
					<button type='submit' class='btn btn-danger' hidden >X</button>
					</form></div></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
<div class="col-md-4">
	<?php
	include('Caja_detalle.php');
	include('Caja_cobro.php');
	?>
</div>
</div>
</div>
	</fieldset>
  </body>
</html>