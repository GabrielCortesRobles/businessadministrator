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
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/Inicio.css">
		<title></title>
	</head>
<body>
	<div id='body'>
		<div id='texto' align='center'>
			<span><h3>Bienvenido <b><?php echo "$nom_empleado"; ?></b></h3></span>
			<br>
			<span><h1><b>¿Que desea hacer?</b></h1></span>
		</div>
	</div>
</body>
</html>