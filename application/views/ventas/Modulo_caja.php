<?php 
	error_reporting(0);
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/Agrega_producto.js"> </script> 
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/modulo_caja.js"> </script> 
    <title></title>
  </head>
  <body>
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
	<div class="table-responsive">
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
			echo "<td><div class='row justify-content-center'><form action = 'http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/caja/$id_venta' method='POST'>
					<button type='submit' class='btn btn-primary' >Ver</button>
					</form>
					<form action = 'http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/eliminar_venta/$id_venta' method='POST'>
					<button type='submit' class='btn btn-danger' >X</button>
					</form></div></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
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