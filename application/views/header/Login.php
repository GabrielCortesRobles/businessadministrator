<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
		<!-- Bootstrap JS -->
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		<title>Login</title>
		<link rel="shortcut icon" href="<?= base_url() ?>assets/Images/systelecom.ico">
	</head>
	<body class="body">
		<!-- Inicia el grupo de tarjetas -->
		<div class="card-deck" id="tarjeta">
			<!-- tarjeta de administrador -->
			<div class="card text-white bg-secondary mb-3" style="max-width: 30rem;">
				<div class="card-header">
					<h4>Inicio de sesión</h4>
				</div>
				<div><img class="" src="<?= base_url() ?>assets/Images/administrador_v2.png" alt="Card image cap"></div>
				<div class="card-body">
					<h5 class="card-title">Inicia sesión con tu correo y contraseña.</h5>
					<p class="card-text"></p>
					
					<form class="was-validated" action='http://localhost:8080/systelecoms/index.php/header/Controller_usuario/session' method='POST'>
						<div align="center">
						<!-- Caja de texto para ingresar el correo -->
						<div class="col-md-10">
							<label>Correo: </label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingrese su correo" name='correo' required>
						</div>
						<!-- Caja de texto para ingresar la contraseña -->
						<div class="col-md-10">
							<label>Contraseña: </label>
							<input type="password" class="form-control is-valid" id="customControlValidation4" placeholder="Ingrese su contraseña" name='pass_usuario' required>
						</div>
						</div>
				</div>
						<!-- Pie de pagina de la tarjeta -->
						<div class="card-footer" align="right">
							<input type="submit" class="btn btn-primary" value='Enviar'>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>