<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
  <!-----Vista busqueda producto-------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Resultado de busqueda Producto</h2>
	<hr>
		<form class="was-validated" action='' method='POST'>
	<br><br>
	<div class="col-md-10">
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col">ID</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">MARCA</th>
      <th scope="col">CÓDIGO INT.</th>
      <th scope="col">CÓDIGO SAT</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">PRECIO POR PIEZA</th>
      <th scope="col">PRECIO DE MENUDEO</th>
      <th scope="col">PRECIO DE MAYOREO</th>
      <th scope="col">PIEZAS DE MEDIOMAYOREO</th>
      <th scope="col">PIEZAS DE MAYOREO</th>
    </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_producto=$object->id_producto;
		$nom_producto=$object->nom_producto;
		$marca=$object->marca;
		$codigo_int=$object->codigo_int;
		$codigo_sat=$object->codigo_sat;
		$cantidad_prod=$object->cantidad_prod;
		$descripcion=$object->descripcion;
		$precio_cu=$object->precio_cu;
		$precio_menudeo=$object->precio_menudeo;
		$precio_mayoreo=$object->precio_mayoreo;
		$piezas_mediomayoreo=$object->piezas_mediomayoreo;
		$piezas_mayoreo=$object->piezas_mayoreo;
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'>".$object->id_producto."</th>";
			echo "<td>".$object->nom_producto."</td>";
			echo "<td>".$object->marca."</td>";
			echo "<td>".$object->codigo_int."</td>";
			echo "<td>".$object->codigo_sat."</td>";
			echo "<td>".$object->cantidad_prod."</td>";
			echo "<td>".$object->descripcion."</td>";
			echo "<td>".$object->precio_cu."</td>";
			echo "<td>".$object->precio_menudeo."</td>";
			echo "<td>".$object->precio_mayoreo."</td>";
			echo "<td>".$object->piezas_mediomayoreo."</td>";
			echo "<td>".$object->piezas_mayoreo."</td>";
			echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>
		</form>
	</div>
		<br>
<div align='center'>
		<form action = 'http://localhost:8080/systelecoms/index.php/producto/Reporte_excel_producto/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/producto/Reporte_PDF_producto/ExportarPDF/<?php echo $id?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>
	</fieldset>
  </body>
</html>