<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <!--   <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">-->
    <title>TIKET</title>
	    <style>
		.form
	
	{
		background-color: #e9ecefba;
		width: 30%;
		border-radius: 7px;
		margin: auto;
		margin-bottom: 5px;
	}

	</style>
  </head>
  <body>
	<fieldset class='form'>
		<br>
	
	<hr>
		<form class="was-validated" action='' method='POST' align="center">
	<br>
		<div>
							
	<?php
	foreach ($res as $object){
		$imagen_empresa = $object->imagen_empresa;
		$nom_empresa = $object->nom_empresa;
		$codigo_venta = $object->codigo_venta;
		$rfc_empresa=$object->rfc_empresa;
		$razon_social=$object->razon_social;
		$calle=$object->calle;
		$numero=$object->numero;
		$colonia=$object->colonia;
		$municipio=$object->numero;
		$codigo_postal=$object->codigo_postal;
		$telefono=$object->telefono;
		$correo=$object->correo;
		$regimen_fiscal=$object->regimen_fiscal;
		$nombre=$object->nom_empleado.$object->ap_empleado.$object->am_empleado;
		$nombres=$object->nom_cliente.$object->ap_cliente.$object->am_cliente;
		$fecha = date("Y-m-d");
		date_default_timezone_set('America/Mexico_City');
		$hora = date("H:i:s");
		$id_producto=$object->id_producto;
		$cantidad_prod=$object->cantidad_prod;
		$precio=$object->precio;
		
		
		echo "<tbody>";
		echo "<tr>";
			echo "<th scope='row'><img src='".$object->imagen_empresa."'></th><br><br>";
			echo "<td><h3>".$object->nom_empresa."</h3></td>"."_____________________________________________________________<br>";
			echo "<td><h6>CODIGO VENTA: ".$object->codigo_venta."</h6></td>";
			echo "<td><h6>R.F.C.: ".$object->rfc_empresa."</h6></td>";
			echo "<td><h6>RAZÓN SOCIAL: ".$object->razon_social."</h6></td>";
			echo "<td><h6>DIRECCIÓN: ".$object->calle." ".$object->numero."</h6></td>";
			echo "<td><h6>".$object->colonia."".",".$object->municipio."</h6></td>";
			echo "<h6>, ESTADO DE MÉXICO.</h6>";
			echo "<td><h6>C.P. : ".$object->codigo_postal.", TELEFONO: ".$object->telefono."</h6></td>";
			echo " ";
			echo "<td><h6>E-MAIL :</h6>".$object->correo."</td><br>";
			echo "REGIMEN FISCAL: "."<br>";
			echo "<td>".$object->regimen_fiscal."</td><br>";
			echo "_____________________________________________________________"."<br>";
			echo "<td><h6>HORA:</h6>".$hora."</td><br>";
			echo "FECHA: ";
			echo "<td>".$fecha."</td><br>";
			echo "LO ATENDIO: ";
			echo "<td>".$object->nom_empleado." ".$object->ap_empleado." ".$object->am_empleado."</td>.<br>";
			echo "<td><h6>CLIENTE:".$object->nom_cliente." ".$object->ap_cliente." ".$object->am_cliente."</h6></td><br>";
			echo "";
			echo "_____________________________________________________________"."<br>";
			echo "<td>"."Producto  |  Cantidad  |   PrecioUn  |      Importe"."</td><br>";
			echo "<td>".$object->id_producto."  ".$object->cantidad_prod."  ".$object->precio."</td>";
		echo "</tr>";
	echo "</tbody>";
	}
	?>


		</form>
		<br>
<!--<div align='center'>
		<form action = 'http://localhost:8080/systelecoms/index.php/Reporte_excel_producto/ExportarExcel/<?php echo $id?>' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "http://localhost:8080/systelecoms/index.php/Reporte_PDF_producto/ExportarPDF/<?php echo $id?>" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
</div>-->
	</fieldset>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>