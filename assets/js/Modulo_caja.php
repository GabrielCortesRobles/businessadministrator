<?php
$mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

$salida = "";
$query = "SELECT v.id_venta, c.nom_cliente, c.ap_cliente, c.am_cliente, e.nom_empleado, e.ap_empleado, e.am_empleado,
			v.fecha, v.hora_venta, v.total
			FROM detalle_venta AS d
			INNER JOIN ventas AS v ON v.id_venta=d.id_venta
			INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
			INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE v.estado='pendiente' AND c.nom_cliente LIKE '%%';";

if(isset($_POST['consulta']))
{
	$q = $mysqli->real_escape_string($_POST['consulta']);
	utf8_encode($q);
	$query = "SELECT v.id_venta, c.nom_cliente, c.ap_cliente, c.am_cliente, e.nom_empleado, e.ap_empleado, e.am_empleado,
v.fecha, v.hora_venta, v.total
FROM detalle_venta AS d
INNER JOIN ventas AS v ON v.id_venta=d.id_venta
INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE v.estado='pendiente' AND c.nom_cliente LIKE '%".$q."%' ORDER BY nom_cliente ASC;";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0)
{
	$salida.= "<table class='table table-bordered table table-striped'>
					<thead>
						<tr class='bg-primary'>
							<td hidden>ID</td>
							<td>NOMBRE CLIENTE</td>
							<td>NOMBRE EMPLEADO</td>
							<td>FECHA</td>
							<td>HORA</td>
							<td>TOTAL</td>
						</tr>
					</thead>
					<tbody>";
					
	while($fila = $resultado->fetch_assoc())
	{
		$salida.= "<tr>
						<td hidden>".$fila['id_venta']."</td>
						<td>".$fila['nom_cliente']." ".$fila['ap_cliente']." ".$fila['am_cliente']."</td>
						<td>".$fila['nom_empleado']." ".$fila['ap_empleado']." ".$fila['am_empleado']."</td>
						<td>".$fila['fecha']."</td>
						<td>".$fila['hora_venta']."</td>
						<td>$".$fila['total']."</td>
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