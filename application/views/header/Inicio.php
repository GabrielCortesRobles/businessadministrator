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
	<div id='body'>
		<div id='texto' align='center'>
			<span><h3>Bienvenid@ <b><?php echo "$nom_empleado"; ?></b></h3></span>
			<br>
			<span><h1><b>¿Que desea hacer?</b></h1></span>
		</div>
	</div>
</body>
</html>