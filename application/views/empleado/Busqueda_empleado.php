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
  <!-----Vista busqueda empleado-------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Resultado de busqueda Empleado</h2>
	</div>
	<hr>
		<form class="was-validated" action='' method='POST'>
	<br><br>
	<div align='center'>
	<div class="col-md-8">
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">A. PATERNO</th>
      <th scope="col">A. MATERO</th>
      <th scope="col">CALLE</th>
      <th scope="col">N. INTERIOR</th>
      <th scope="col">N. EXTERIOR</th>
      <th scope="col">COLONIA</th>
      <th scope="col">MUNICIPIO</th>
      <th scope="col">C.P.</th>
      <th scope="col">CORREO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">DEPARTAMENTO</th>
      <th scope="col">PRIV. VENTAS</th>
      <th scope="col">PRIV. CAJA</th>
      <th scope="col">PRIV. ALMACEN</th>
      <th scope="col">SEXO</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_empleado=$object->id_empleado;
		$nom_empleado=$object->nom_empleado;
		$ap_empleado=$object->ap_empleado;
		$am_empleado=$object->am_empleado;
		$calle=$object->calle;
		$numero_interior=$object->numero_interior;
		$numero_exterior=$object->numero_exterior;
		$colonia=$object->colonia;
		$id_municipio=$object->id_municipio;
		$cp=$object->cp;
		$correo=$object->correo;
		$telefono=$object->telefono;
		$tipo_empleado=$object->tipo_empleado;
		$privilegio_venta=$object->privilegio_venta;
		$privilegio_caja=$object->privilegio_caja;
		$privilegio_almacen=$object->privilegio_almacen;
		$sexo=$object->sexo;
		$activo=$object->activo;
		if($privilegio_almacen == 1)
		{
			$privilegio_almacen='Si';
		}
		else
		{
			$privilegio_almacen='No';
		}
		if($privilegio_caja == 1)
		{
			$privilegio_caja='Si';
		}
		else
		{
			$privilegio_caja='No';
		}
		if($privilegio_venta == 1)
		{
			$privilegio_venta='Si';
		}
		else
		{
			$privilegio_venta='No';
		}
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'>".$object->id_empleado."</th>";
			echo "<td>".$object->nom_empleado."</td>";
			echo "<td>".$object->ap_empleado."</td>";
			echo "<td>".$object->am_empleado."</td>";
			echo "<td>".$object->calle."</td>";
			echo "<td>".$object->numero_interior."</td>";
			echo "<td>".$object->numero_exterior."</td>";
			echo "<td>".$object->colonia."</td>";
			echo "<td>".$object->id_municipio."</td>";
			echo "<td>".$object->cp."</td>";
			echo "<td>".$object->correo."</td>";
			echo "<td>".$object->telefono."</td>";
			echo "<td>".$object->tipo_empleado."</td>";
			echo "<td>".$privilegio_venta."</td>";
			echo "<td>".$privilegio_caja."</td>";
			echo "<td>".$privilegio_almacen."</td>";
			echo "<td>".$object->sexo."</td>";
			echo "<td>".$object->activo."</td>";
			echo "<td>
			<a href='http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/modificar_empleado/$id_empleado'>Modificar </a>/";
			echo "<a href='http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/eliminar_empleado/$id_empleado'> Eliminar</a></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>
</div>
		</form>
		<br>
<div align='center'>
		<form action = 'http://localhost:8080/systelecoms/index.php/empleado/Reporte_excel_empleado/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/empleado/Reporte_PDF_empleado/ExportarPDF/<?php echo $id?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>
	</fieldset>
	</body>
</html>