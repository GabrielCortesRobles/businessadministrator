
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script>
    <title></title>
  </head>
  <body>
  <!-----Tabla de busqueda cliente------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Ventas pendientes</h2>
	</div>
	<hr>
	<div class='container-fluid'>
	<div class='row'>
	<div class="col-md-8">
	<div class="table-responsive">
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
      <th scope="col">OPCION</th>
   </tr>
  </thead>
  <?php
	foreach ($res as $obj){
		$id_venta=$obj->id_venta;
		$cliente=$obj->cliente;
		$empleado=$obj->empleado;
		$nom_producto=$obj->nom_producto;
		$cantidad=$obj->cantidad;
		$subtotal=$obj->subtotal;
		$estado=$obj->estado;
		$fecha=$obj->fecha;
		$hora_venta=$obj->hora_venta;
		
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
			echo "<td><form action = 'http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/eliminar_venta/$id_venta' method='POST'>
					<button type='submit' class='btn btn-danger' >X</button>
					</form></div></td>";
			echo "</tr>";
	echo "</tbody>";
	}
	?>

</table>
</div>
</div>
</div>
</div>
	</fieldset>
  </body>
</html>