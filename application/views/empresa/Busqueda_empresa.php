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
	<!---------Vista Busqueda empresa------------->
	<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>Resultado de busqueda Empresa</h2>
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
      <th scope="col">RFC</th>
      <th scope="col">NOMBRE EMPRESA</th>
      <th scope="col">IMAGEN</th>
      <th scope="col">RAZÓN SOCIAL</th>
      <th scope="col">CALLE</th>
      <th scope="col">NUMERO</th>
      <th scope="col">COLONIA</th>
      <th scope="col">MUNICIPIO</th>
      <th scope="col">CÓDIGO POSTAL</th>
      <th scope="col">CORREO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">REGIMEN FISCAL</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">OPCIONES</th>
   </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_cliente=$object->id_empresa;
		$rfc_empresa=$object->rfc_empresa;
		$nom_cliente=$object->nom_empresa;
		$imagen_empresa=$object->imagen_empresa;
		$razon_social=$object->razon_social;
		$calle=$object->calle;
		$num_calle=$object->num_calle;
		$colonia=$object->colonia;
		$municipio=$object->municipio;
		$cp=$object->cp;
		$correo=$object->correo;
		$telefono=$object->telefono;
		$regimen_fiscal=$object->regimen_fiscal;
		$activo=$object->activo;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'>".$object->id_empresa."</th>";
			echo "<td>".$object->rfc_empresa."</td>";
			echo "<td>".$object->nom_empresa."</td>";
			echo "<td>".$object->imagen_empresa."</td>";
			echo "<td>".$object->razon_social."</td>";
			echo "<td>".$object->calle."</td>";
			echo "<td>".$object->num_calle."</td>";
			echo "<td>".$object->colonia."</td>";
			echo "<td>".$object->municipio."</td>";
			echo "<td>".$object->cp."</td>";
			echo "<td>".$object->correo."</td>";
			echo "<td>".$object->telefono."</td>";
			echo "<td>".$object->regimen_fiscal."</td>";
			echo "<td>".$object->activo."</td>";
			echo "<td>
			<a href='http://localhost:8080/systelecoms/index.php/empresa/Controller_empresa/modificar_empresa/$id_cliente'>Modificar </a>/";
			echo "<a href='http://localhost:8080/systelecoms/index.php/empresa/Controller_empresa/eliminar_empresa/$id_cliente'> Eliminar</a></td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>
		</form>
		<br>
<div align='center'>
		<form action = 'http://localhost:8080/systelecoms/index.php/empresa/Reporte_excel_cliente/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/empresa/Reporte_PDF_cliente/ExportarPDF/<?php echo $id?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>
	</fieldset>
  </body>
</html>