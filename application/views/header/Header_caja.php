<?php
	//condicion para recuperar la sesion
	if ($_SESSION['id_empleado'] == null)
	{
		session_start();
	}
	else
	{
		// transaformacion de la sesión en variables para facilitar su llamado
		$id_empleado = $_SESSION['id_empleado'];
		$nom_empleado = $_SESSION['nom_empleado'];
		$correo = $_SESSION['correo'];
	}
?>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		<title>BA | Caja</title>
		<link rel="shortcut icon" href="<?= base_url() ?>assets/Images/systelecom.ico">
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style='background-color: #27a243;'>
		<a class="navbar-brand" href="#"><?php echo "$nom_empleado"; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true">Busqueda</span>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_iniciocaja/tabla' method='POST'>
									<button class="dropdown-item" type="submit">Lista Productos</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_iniciocaja/tabla_clientes' method='POST'>
									<button class="dropdown-item" type="submit">Lista de Clientes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_iniciocaja/tabla_empleado' method='POST'>
									<button class="dropdown-item" type="submit">Lista Empleados</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_iniciocaja/tabla_proveedor' method='POST'>
									<button class="dropdown-item" type="submit">Lista Proveedor</button>
							</form>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<!-- Boton que direcciona al modulo de caja -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_iniciocaja/modulo_caja' method='POST'>
						<button class="btn btn-secondary" type="submit">Módulo caja</button>
					</form>
				</li>
			</ul>
		</div>
		<!-- Boton desplegable de configuracion -->
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-align-left" aria-hidden="true">Configuración</span>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			
				<h4 class="dropdown-header" align='center'><b>Reportes</b></h4>
				<div class="dropdown-divider"></div>
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/producto/Controller_producto/buscar_producto_caja' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Producto" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/buscar_empleado_caja' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Empleado" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/proveedor/Controller_proveedor/buscar_proveedor_caja' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Proveedor" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/buscar_cliente_caja' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Cliente" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/tiket/Controller_tiket/buscar_tiket' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Tiket" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				<div class="dropdown-divider"></div>
				<div>
				<!-- Cerrar session -->
					<form class="form-inline my-2 my-lg-0" action="http://localhost:8080/systelecoms/index.php/header/Controller_usuario/logout">
						<button class="dropdown-item" type="submit">Cerrar sesión</button>
					</form>
				</div>
			</div>
		</div>
	</nav>
</body>
</html>