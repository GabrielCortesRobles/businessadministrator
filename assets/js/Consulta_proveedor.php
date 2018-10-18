<?php
$mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

$salida = "";
$query = "SELECT * FROM proveedor ORDER BY nom_empresa ASC;";

if(isset($_POST['consulta']))
{
	$q = $mysqli->real_escape_string($_POST['consulta']);
	utf8_encode($q);
	$query = "SELECT * FROM proveedor
WHERE nom_empresa LIKE '%".$q."%' OR correo LIKE '%".$q."%' OR telefono LIKE '%".$q."%' ORDER BY nom_empresa ASC;";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0)
{
	$salida.= "<table class='table table-bordered table table-striped'>
					<thead>
						<tr class='bg-primary'>
							<td>Nombre</td>
							<td>RFC</td>
							<td>Dirección</td>
							<td>Correo electronico</td>
							<td>Telefono</td>
						</tr>
					</thead>
					<tbody>";
					
	while($fila = $resultado->fetch_assoc())
	{
		$salida.= "<tr>
						<td>".utf8_encode($fila['nom_empresa'])."</td>
						<td>".$fila['rfc_proveedor']."</td>
						<td>".$fila['direccion']."</td>
						<td>".$fila['correo']."</td>
						<td>".$fila['telefono']."</td>
					</tr>";
	}
	$salida.= "</tbody>
				</table>";
}
else
{
	$salida.= "No se encontro resultado :'(";
}

echo $salida;

$mysqli->close();
?>