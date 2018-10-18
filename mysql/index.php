<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<title>Restauración</title>
	<style>
		.form
	{
		    background-color: #e9ecefba;
			padding: 30px;
			height: 100%;
			width: 40%;
			margin: auto;
			border-radius: 7px;
	}
	</style>
</head>
<body>
	<fieldset class='form'>
		<form action="./Restore.php" method="POST">
			<label>Selecciona un punto de restauración</label>
			<div class='row'>
				<div class='col-md-9'>
					<select class='form-control' name="restorePoint">
						<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
						<?php
							include_once './Connet.php';
							$ruta=BACKUP_PATH;
							if(is_dir($ruta)){
								if($aux=opendir($ruta)){
									while(($archivo = readdir($aux)) !== false){
										if($archivo!="."&&$archivo!=".."){
											$nombrearchivo=str_replace(".sql", "", $archivo);
											$nombrearchivo=str_replace("-", ":", $nombrearchivo);
											$ruta_completa=$ruta.$archivo;
											if(is_dir($ruta_completa)){
											}else{
												echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
											}
										}
									}
									closedir($aux);
								}
							}else{
								echo $ruta." No es ruta válida";
							}
						?>
					</select>
				</div>
				<div class='col-md-2'>
					<button class='btn btn-primary' type="submit" >Restaurar</button>
				</div>
			</div>
		</form>
	</fieldset>
</body>
</html>
