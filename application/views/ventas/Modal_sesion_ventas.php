<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
		<title>Login</title>
	</head>
	<body>
		<!-- Modal -->
		<div class="modal fade" id="sesion_venta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Iniciar sessión con el perfil de ventas.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="was-validated" action='http://localhost:8080/systelecoms/index.php/ventas/Controller_ventas/session_ventas' method='POST'>
						<!-- Cuerpo del modal -->
						<div class="modal-body">
							<!-- Caja de texto para ingresar el correo -->
							<div class="col-md-14">
								<label>Correo: </label>
								<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingrese su correo" name='correo' required>
							</div>
							<!-- Caja de texto para ingresar la contraseña -->
							<div class="col-md-14">
								<label>Contraseña: </label>
								<input type="password" class="form-control is-valid" id="customControlValidation4" placeholder="Ingrese su contraseña" name='pass_usuario' required>
							</div>
		
						</div>
						<!-- Pie de pagina del modal -->
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" value='Enviar'>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>