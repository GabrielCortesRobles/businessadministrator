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
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		<script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
		<title>BA | Administrador</title>
		<link rel="shortcut icon" href="<?= base_url() ?>assets/Images/systelecom.ico">
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style='background-color: #E67E22;'>
		<a class="navbar-brand" href="#"><?php echo "$nom_empleado"; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Nuevo
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_producto">
								Producto
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_empleado">
								Empleado
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_proveedor">
								Proveedores
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_cliente">
								Cliente
							</button>
						</div>
					</div>
				</li>
	  
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true">Busqueda</span>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_inicio/tabla' method='POST'>
									<button class="dropdown-item" type="submit">Lista Productos</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_inicio/tabla_clientes' method='POST'>
									<button class="dropdown-item" type="submit">Lista de Clientes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_inicio/tabla_empleado' method='POST'>
									<button class="dropdown-item" type="submit">Lista Empleados</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_inicio/tabla_proveedor' method='POST'>
									<button class="dropdown-item" type="submit">Lista Proveedor</button>
							</form>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true">Ventas</span>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventashoy' method='POST'>
									<button class="dropdown-item" type="submit">Ventas del día</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventasfecha' method='POST'>
									<button class="dropdown-item" type="submit">Ventas por fecha</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventasultimomes' method='POST'>
									<button class="dropdown-item" type="submit" name>Ventas ultimo mes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventasultimoano' method='POST'>
									<button class="dropdown-item" type="submit" name>Ventas ultimo año</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventasultimasemana' method='POST'>
									<button class="dropdown-item" type="submit">Ventas de la semana</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventaspendientes' method='POST'>
									<button class="dropdown-item" type="submit">Ventas pendientes</button>
							</form>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<!-- Boton que direcciona al modulo de ventas -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/header/Controller_inicio/venta' method='POST'>
							<button class="btn btn-secondary" type="submit">Módulo venta</button>
					</form>
				</li>
				
				<li class="nav-item">
					<!-- Boton que direcciona al modulo de caja -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/caja' method='POST'>
							<button class="btn btn-secondary" type="submit">Módulo caja</button>
					</form>
				</li>
				
				<li class="nav-item">
					<!-- Boton que direcciona al modulo de ventas -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/factura/Controller_factura_sistema/factura' method='POST'>
							<button class="btn btn-secondary" type="submit">Módulo Factura</button>
					</form>
				</li>
				
			</ul>
		</div>
		<!-- Boton desplegable de Busqueda -->
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-align-left" aria-hidden="true">Configuración</span>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header" align='center'>Reportes</h6>
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/producto/Controller_producto/buscar_producto' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Producto" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/buscar_empleado' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Empleado" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/proveedor/Controller_proveedor/buscar_proveedor' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Proveedor" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/buscar_cliente' method='POST'>
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
						
							<form class="form-inline my-2 my-lg-0" action='http://localhost:8080/systelecoms/index.php/empresa/Controller_empresa/modificar_empresa' method='POST'>
								<button class="dropdown-item" type="submit">Empresa</button>
							</form>
					</div>
				
				<div>
				<!-- restauracion de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="http://localhost:8080/systelecoms/mysql/index.php">
						<button class="dropdown-item" type="submit">Restore</button>
					</form>
				</div>
				<div>
				<!-- respaldo de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="http://localhost:8080/systelecoms/mysql/Backup.php">
						<button class="dropdown-item" type="submit">Backup</button>
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