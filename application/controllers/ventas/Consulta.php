<?php
$mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

$salida = "";
/*----------------------------------------------------Consulta producto--------------------------------------------------------------*/
$query = "SELECT * FROM producto ORDER BY id_producto;";

if(isset($_POST['consulta']))
{
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT p.nom_producto, p.marca, pro.nom_empresa, p.codigo_int, 
p.codigo_sat, p.descripcion, p.precio_cu, p.precio_menudeo, 
p.precio_mayoreo 
FROM producto AS p, proveedor AS pro 
WHERE p.nom_producto LIKE '%".$q."%' AND p.id_proveedor=pro.id_proveedor;";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0)
{
	$salida. = "<table class='tabla_datos'>
					<thead>
						<tr>
							<td>Nombre</td>
							<td>Marca</td>
							<td>Proveedor</td>
							<td>Cod. Interno</td>
							<td>Cod. SAT</td>
							<td>Descripcion</td>
							<td>Precio c/u</td>
							<td>Precio medio-mayoreo</td>
							<td>Precio mayoreo</td>
						</tr>
					</thead>
					<tbody>";
					
	while($fila = $resultado->fetch_assoc())
	{
		$salida. = "<tr>
						<td>".$fila['nom_producto']."</td>
						<td>".$fila['marca']."</td>
						<td>".$fila['nom_empresa']."</td>
						<td>".$fila['codigo_int']."</td>
						<td>".$fila['codigo_sat']."</td>
						<td>".$fila['descripcion']."</td>
						<td>".$fila['precio_cu']."</td>
						<td>".$fila['precio_menudeo']."</td>
						<td>".$fila['precio_mayoreo']."</td>
					</tr>";
	}
	$salida. = "</tbody>
				</table>";
}
else
{
	$salida. = "No se encontro resultado :(";
}

echo $salida;

$mysqli->close();
?>