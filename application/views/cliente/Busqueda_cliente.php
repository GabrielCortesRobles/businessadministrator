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
  <!-----Tabla de busqueda cliente------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Resultado de busqueda Cliente</h2>
	</div>
	<hr>
		<form class="was-validated" action='' method='POST'>
	<br><br>
	<div class="col-md-12">
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">NOMBRE DEL CLIENTE</th>
      <th scope="col">APELLIDO PATERNO</th>
      <th scope="col">APELLIDO MATERNO</th>
      <th scope="col">CALLE</th>
      <th scope="col">N. INTERIOR</th>
      <th scope="col">N. EXTERIOR</th>
      <th scope="col">COLONIA</th>
      <th scope="col">MUNICIPIO</th>
      <th scope="col">CÓDIGO POSTAL</th>
      <th scope="col">CORREO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">SEXO</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">OPCIONES</th>
   </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_cliente=$object->id_cliente;
		$nom_cliente=$object->nom_cliente;
		$ap_cliente=$object->ap_cliente;
		$am_cliente=$object->am_cliente;
		$calle=$object->calle;
		$numero_interior=$object->numero_interior;
		$numero_exterior=$object->numero_exterior;
		$coloniaia=$object->colonia;
		$id_municipio=$object->id_municipio;
		$cp=$object->cp;
		$correo=$object->correo;
		$telefono=$object->telefono;
		$sexo=$object->sexo;
		$activo=$object->activo;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'>".$object->id_cliente."</th>";
			echo "<td>".$object->nom_cliente."</td>";
			echo "<td>".$object->ap_cliente."</td>";
			echo "<td>".$object->am_cliente."</td>";
			echo "<td>".$object->calle."</td>";
			echo "<td>".$object->numero_interior."</td>";
			echo "<td>".$object->numero_exterior."</td>";
			echo "<td>".$object->colonia."</td>";
			echo "<td>".$object->id_municipio."</td>";
			echo "<td>".$object->cp."</td>";
			echo "<td>".$object->correo."</td>";
			echo "<td>".$object->telefono."</td>";
			echo "<td>".$object->sexo."</td>";
			echo "<td>".$object->activo."</td>";
			echo "<td>
			<a href='http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/modificar_cliente/$id_cliente'>Modificar </a>/";
			echo "<a href='http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/eliminar_cliente/$id_cliente'> Eliminar</a></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>
		</form>
		<br>
		<!-----------Genenerar reportes en excel y pdf------------>
<div align='center'>
		<form action = 'http://localhost:8080/systelecoms/index.php/cliente/Reporte_excel_cliente/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/cliente/Reporte_PDF_cliente/ExportarPDF/<?php echo $id?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>
	</fieldset>
  </body>
</html>