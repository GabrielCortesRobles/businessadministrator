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
		$administrador = $_SESSION['administrador'];
		$caja = $_SESSION['caja'];
		$almacen = $_SESSION['almacen'];
		$venta = $_SESSION['venta'];
	}
?>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>BA <?php if( $administrador == 1 ) { echo "| Administrador"; }?>
		<?php if( $caja == 1 ) { echo "| Caja"; }?>
		<?php if( $almacen == 1 ) { echo "| Almacen"; }?>
		<?php if( $venta == 1 ) { echo "| Ventas"; }?>
		</title>
		<link rel="shortcut icon" href="<?= base_url() ?>assets/Images/systelecom.ico">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/Inicio.css">
	   	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ventas.css">
		<!-- Bootstrap CSS -->
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/jquery-3.3.1.js"> </script> 
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/all.js"> </script> 
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/Alta_producto.js"> </script>
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/Alta_cliente.js"> </script> 
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/Empleado.js"></script>
    	<script type = "text/javascript" src = "<?= base_url() ?>assets/js/Alta_empleado.js"></script> 
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/Alta_proveedores.js"> </script> 
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Insertar_venta.js"></script>
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Agrega_producto.js"></script>
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Buscar_producto.js"></script>
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Buscar_precio.js"></script>
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Buscar_cliente.js"></script>
	    <script type = "text/javascript" src = "<?= base_url() ?>assets/js/Buscar_empleado.js"></script>
        <script type = "text/javascript" src = "<?= base_url() ?>assets/js/modulo_caja.js"> </script>
		<script type = "text/javascript" src = "<?= base_url() ?>assets/js/bootstrap.js"></script>
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<a class="navbar-brand"><?php echo "$nom_empleado"; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

			<?php if( ($almacen || $administrador ) == 1 ) { ?>
				<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-plus-circle"></i>
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
			<?php } ?>
	  
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/header/Controller_inicio/tabla' method='POST'>
									<button class="dropdown-item" type="submit">Lista Productos</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/header/Controller_inicio/tabla_clientes' method='POST'>
									<button class="dropdown-item" type="submit">Lista de Clientes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/header/Controller_inicio/tabla_empleado' method='POST'>
									<button class="dropdown-item" type="submit">Lista Empleados</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/header/Controller_inicio/tabla_proveedor' method='POST'>
									<button class="dropdown-item" type="submit">Lista Proveedor</button>
							</form>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-chart-bar"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventashoy' method='POST'>
									<button class="dropdown-item" type="submit">Ventas del día</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventasfecha' method='POST'>
									<button class="dropdown-item" type="submit">Por fecha especifica</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventasultimomes' method='POST'>
									<button class="dropdown-item" type="submit" name>Ventas ultimo mes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventasultimoano' method='POST'>
									<button class="dropdown-item" type="submit" name>Ventas ultimo año</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventasultimasemana' method='POST'>
									<button class="dropdown-item" type="submit">Ventas de la semana</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_reporteventas/ventaspendientes' method='POST'>
									<button class="dropdown-item" type="submit">Ventas pendientes</button>
							</form>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<!-- Boton que direcciona al modulo de ventas -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/header/Controller_inicio/venta' method='POST'>
							<button class="btn btn-secondary" type="submit"><i Class="fas fa-cart-plus"></i> Módulo venta</button>
					</form>
				</li>

				<?php if( ($caja || $administrador ) == 1 ) { ?>
				<li class="nav-item">
					<!-- Boton que direcciona al modulo de caja -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/ventas/Controller_caja/caja' method='POST'>
							<button class="btn btn-secondary" type="submit"><i class="fas fa-cash-register" ></i> Módulo caja</button>
					</form>
				</li>
				
				<li class="nav-item">
					<!-- Boton que direcciona al modulo de ventas -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/factura/Controller_factura_sistema/factura' method='POST'>
							<button class="btn btn-secondary" type="submit"> <i class="fas fa-clipboard-list"></i> Módulo Factura</button>
					</form>
				</li>
				<?php } ?>
				
			</ul>
		</div>
		<!-- Boton desplegable de Busqueda -->
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="fas fa-cogs"></span> Configuración
			</button>
			<div class="dropdown-menu dropdown-menu-left">
			
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header" align='center'>Reportes</h6>
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/producto/Controller_producto/buscar_producto' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Producto" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/empleado/Controller_empleado/buscar_empleado' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Empleado" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/proveedor/Controller_proveedor/buscar_proveedor' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Proveedor" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/cliente/Controller_cliente/buscar_cliente' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Cliente" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/tiket/Controller_tiket/buscar_tiket' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Tiket" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				<?php if( $administrador == 1 ) { ?>
				<div class="dropdown-divider"></div>
			
					<div>
						
							<form class="form-inline my-2 my-lg-0" action='<?= base_url() ?>index.php/empresa/Controller_empresa/modificar_empresa' method='POST'>
								<button class="dropdown-item" type="submit"> <i class="fas fa-industry"></i> Empresa</button>
							</form>
					</div>
				
				<div>
				<!-- restauracion de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="<?= base_url() ?>mysql/index.php">
						<button class="dropdown-item" type="submit"><i class="fas fa-undo"></i> Restore</button>
					</form>
				</div>
				<div>
				<!-- respaldo de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="<?= base_url() ?>mysql/Backup.php">
						<button class="dropdown-item" type="submit"><i class="fas fa-database"></i> Backup</button>
					</form>
				</div>
				<?php } ?>
				<div class="dropdown-divider"></div>
				<div>
				<!-- Cerrar session -->
					<form class="form-inline my-2 my-lg-0" action="<?= base_url() ?>index.php/header/Controller_usuario/logout">
						<button class="dropdown-item" type="submit">Cerrar sesión</button>
					</form>
				</div>
			</div>
		</div>
	</nav>