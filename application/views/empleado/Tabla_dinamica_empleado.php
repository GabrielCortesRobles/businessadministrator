<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
        <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/Tabla_dinamica_empleado.js"></script>
		<title>Busqueda Clientes</title>
	</head>
	<body>
	<!------Tabla dinamica--------------->
		<div class='container'>
			<div class='col-md-4' id='form'>
				<h4><label>Buscar:</label></h4>
				<input type='text' class='form-control' name='caja_busqueda' id='caja_busqueda' placeholder='ingresa criterio de busqueda'>
			</div>
			<hr>
			<div class='col-md-12'>
				<div class="table-responsive" id='datos'>
				
				</div>
			</div>
		</div>
		
	</body>
</html>