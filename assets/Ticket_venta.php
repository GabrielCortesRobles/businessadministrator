<?php


require __DIR__ . '/Ticket.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "EPSON L220 Series"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*-------------------------------------------- cargamos la base de datos --------------------------------------------*/
$mysqli = new mysqli('www.rodihsa.com', 'rodihsa_user', '$Y$T3L3C0M@', 'rodihsa_systelecom');

/*-------------------------------------------- realizamos la consulta para obtener los datos de la empresa --------------------------------------------*/
$query = $mysqli -> query ("SELECT * FROM empresas WHERE id_empresa='1'");
$consulta	=	mysqli_fetch_array($query);
$empresa	=	$consulta['nom_empresa'];
$imagen_empresa	=	$consulta['imagen_empresa'];
$calle	=	$consulta['calle'];
$num_calle	=	$consulta['num_calle'];
$colonia	=	$consulta['colonia'];
$municipio	=	$consulta['municipio'];
$telefono	=	$consulta['telefono'];
$correo	=	$consulta['correo'];
/*
echo "<br>". $empresa;
echo "<br>". $imagen_empresa;
echo "<br>". $calle;
echo "<br>". $num_calle;
echo "<br>". $colonia;
echo "<br>". $municipio;
echo "<br>". $telefono;
echo "<br>". $correo;
*/

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("Images/$imagen_empresa", true);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
	Ahora vamos a imprimir un encabezado
*/

$printer->text("\n"."$empresa" . "\n");
$printer->text("Direccion: $calle $num_calle, $colonia, $municipio" . "\n");
$printer->text("Tel: $telefono" . "\n");
$printer->text("E-mail: $correo" . "\n");
#La fecha también
date_default_timezone_set("America/Mexico_City");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION    P.U   IMP.\n");
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
/*-------------------------------------------- realizamos la consulta para imprimir los productos --------------------------------------------*/
$query2 = $mysqli -> query ("SELECT MAX(id_venta)AS id_venta FROM ventas;");
$res = mysqli_fetch_array($query2);
$id_venta	=	$res['id_venta'];
//echo "<br>". $id_venta;

$query3 = $mysqli -> query ("SELECT p.nom_producto, d.cantidad, d.subtotal 
							FROM detalle_venta AS d
							INNER JOIN producto AS p ON p.id_producto=d.id_producto 
							WHERE id_venta='$id_venta';");

while ($ventas = mysqli_fetch_array($query3))
{
	$producto	=	$ventas['nom_producto'];	
	$cantidad	=	$ventas['cantidad'];	
	$subtotal	=	$ventas['subtotal'];	
	//echo "<br>". $producto;
	//echo "<br>". $cantidad;
	//echo "<br>". $subtotal;
	
	$printer->text("$producto \n");
    $printer->text("$cantidad  piezas    $subtotal   \n");
}
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$id_cliente		=	$_POST['id_cliente'];
$query4 = $mysqli -> query ("SELECT CONCAT(nom_cliente,' ', ap_cliente,' ',am_cliente) AS cliente FROM cliente WHERE id_cliente='$id_cliente';");
$res1 = mysqli_fetch_array($query4);
$cliente	=	$res1['cliente'];

$id_empleado	=	$_POST['id_empleado'];
$query5 = $mysqli -> query ("SELECT CONCAT(nom_empleado,' ', ap_empleado,' ',am_empleado) AS empleado FROM empleado WHERE id_empleado='$id_empleado';");
$res2 = mysqli_fetch_array($query5);
$empleado	=	$res2['empleado'];

$total			=	$_POST['total'];
$recibido_venta	=	$_POST['recibido_venta'];
$cambio_venta	=	$_POST['cambio_venta'];

$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("SUBTOTAL: $total\n");
$printer->text("IVA: $16.00\n");
$printer->text("TOTAL: $total.00\n");
$printer->text("PAGO CON: $recibido_venta\n");
$printer->text("SU CAMBIO ES DE: $cambio_venta\n");
$printer->text("LE ATENDIO: $empleado\n");
$printer->text("COMPRADOR: $cliente\n");


/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

?>