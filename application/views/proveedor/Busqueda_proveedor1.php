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
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Visualización Pre-Reporte Proveedores</h2>
	<hr>
		<form class="was-validated" action='' method='POST'>
	<br><br>
	<div class="col-md-10">
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col">ID</th>
      <th scope="col">RFC</th>
      <th scope="col">NOMBRE DE LA EMPESA</th>
      <th scope="col">DIRECCIÓNx</th>
      <th scope="col">CORREO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">ACTIVO</th>
    </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_proveedor=$object->id_proveedor;
		$rfc_proveedor=$object->rfc_proveedor;
		$nom_empresa=$object->nom_empresa;
		$direccion=$object->direccion;
		$correo=$object->correo;
		$telefono=$object->telefono;
		$activo=$object->activo;
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'>".$object->id_proveedor."</th>";
			echo "<td>".$object->rfc_proveedor."</td>";
			echo "<td>".$object->nom_empresa."</td>";
			echo "<td>".$object->direccion."</td>";
			echo "<td>".$object->correo."</td>";
			echo "<td>".$object->telefono."</td>";
			echo "<td>".$object->activo."</td>";
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
		<form action = 'http://localhost:8080/systelecoms/index.php/proveedor/Reporte_excel_proveedor/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/proveedor/Reporte_PDF_proveedor/ExportarPDF/<?php echo $id ?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>
	</fieldset>
  </body>
</html>