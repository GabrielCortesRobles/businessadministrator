<?php
$mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

$salida = "";
$query = "SELECT p.nom_producto, p.marca, pro.nom_empresa, p.codigo_int, 
			p.codigo_sat, p.descripcion, p.precio_cu, p.precio_menudeo, 
			p.precio_mayoreo 
			FROM producto AS p, proveedor AS pro
			WHERE p.id_proveedor=pro.id_proveedor
			ORDER BY nom_producto ASC;";

if(isset($_POST['consulta']))
{
	$q = $mysqli->real_escape_string($_POST['consulta']);
	utf8_encode($q);
	$query = "SELECT p.nom_producto, p.marca, p.codigo_int, 
p.codigo_sat, p.descripcion, p.precio_cu, p.precio_menudeo, 
p.precio_mayoreo 
FROM producto AS p
WHERE p.nom_producto LIKE '%".$q."%' OR p.marca LIKE '%".$q."%' OR p.codigo_int LIKE '%".$q."%' ORDER BY nom_producto ASC;";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0)
{
	$salida.= "<table class='table table-bordered table table-striped'>
					<thead>
						<tr class='bg-primary'>
							<td>Nombre</td>
							<td>Marca</td>
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
		$salida.= "<tr>
						<td>".utf8_encode($fila['nom_producto'])."</td>
						<td>".$fila['marca']."</td>
						<td>".$fila['codigo_int']."</td>
						<td>".$fila['codigo_sat']."</td>
						<td>".utf8_encode($fila['descripcion'])."</td>
						<td>".$fila['precio_cu']."</td>
						<td>".$fila['precio_menudeo']."</td>
						<td>".$fila['precio_mayoreo']."</td>
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