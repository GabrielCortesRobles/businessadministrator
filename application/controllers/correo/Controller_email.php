<?php
class Controller_email extends CI_Controller
{
	public function tabla()
	{
		$this->load->model('correo/Model_email');
		$res = $this->Model_email->ventas_dia();
		$tabla = "<div id='tabla'>
		<table border='1'>
		<tr>
			<th>Producto</th>
			<th>Cliente</th>
			<th>Empleado</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Pago</th>
			<th>Cambio</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Codigo</th>
			<th>Subtotal</th>
			<th>Total</th>
		</tr>";
		foreach ($res as $object)
		{
			$nom_producto=$object->nom_producto;
			$nom_cliente=$object->nom_cliente;
			$nom_empleado=$object->nom_empleado;
			$precio=$object->precio;
			$cantidad_prod=$object->cantidad_prod;
			$cant_recibida=$object->cant_recibida;
			$cambio=$object->cambio;
			$fecha=$object->fecha;
			$hora_venta=$object->hora_venta;
			$codigo_venta=$object->codigo_venta;
			$subtotal=$object->subtotal;
			$total=$object->total;
			$tabla.="<tbody>
			<tr>
			<th scope='row'>$object->nom_producto</th>
			<td>$object->nom_cliente</td>
			<td>$object->nom_empleado</td>
			<td>$object->precio</td>
			<td>$object->cantidad_prod</td>
			<td>$object->cant_recibida</td>
			<td>$object->cambio</td>
			<td>$object->fecha</td>
			<td>$object->hora_venta</td>
			<td>$object->codigo_venta</td>
			<td>$object->subtotal</td>
			<td>$object->total</td>
			</tr>
			</tbody>";
		}
			$tabla.="</table>
			</div>";
			echo $tabla;

	}
	
	public function enviar(){
		$this->load->model('correo/Model_email');
		$res = $this->Model_email->ventas_dia();
		$tabla = "<div id='tabla'>
		<table border='1'>
		<tr>
			<th>Producto</th>
			<th>Cliente</th>
			<th>Empleado</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Pago</th>
			<th>Cambio</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Codigo</th>
			<th>Subtotal</th>
			<th>Total</th>
		</tr>";
		foreach ($res as $object)
		{
			$nom_producto=$object->nom_producto;
			$nom_cliente=$object->nom_cliente;
			$nom_empleado=$object->nom_empleado;
			$precio=$object->precio;
			$cantidad_prod=$object->cantidad_prod;
			$cant_recibida=$object->cant_recibida;
			$cambio=$object->cambio;
			$fecha=$object->fecha;
			$hora_venta=$object->hora_venta;
			$codigo_venta=$object->codigo_venta;
			$subtotal=$object->subtotal;
			$total=$object->total;
			$tabla.="<tbody>
			<tr>
			<th scope='row'>$object->nom_producto</th>
			<td>$object->nom_cliente</td>
			<td>$object->nom_empleado</td>
			<td>$object->precio</td>
			<td>$object->cantidad_prod</td>
			<td>$object->cant_recibida</td>
			<td>$object->cambio</td>
			<td>$object->fecha</td>
			<td>$object->hora_venta</td>
			<td>$object->codigo_venta</td>
			<td>$object->subtotal</td>
			<td>$object->total</td>
			</tr>
			</tbody>";
		}
			$tabla.="</table>
			</div>";
		
		$this->load->library('phpmailer');

		$mail = new phpmailer();
		$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
		));
		
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;

  //Nombre de usuario y password del correo origen
		$mail->Username = "al221610112@gmail.com"; 
		$mail->Password = "amigosx01";
  //Dirección de correo y el nombre que de la persona que envía el correo
		$mail->From = "al221610112@gmail.com";
		$mail->FromName = "Gabriel";  
		$mail->Timeout=30;
  //Dirección de destino del correo
		//$mail->AddAddress("al221610112@gmail.com");
		//$mail->AddBCC("fernando.romero@systelecom.mx");
		//$mail->AddCC("al221610637@gmail.com");

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html
		$mail->Subject = "Reporte de venta";
		$mail->Body = "$tabla";
		$mail->AltBody = "$tabla";
	
		$exito = $mail->Send();  
		$intentos=1; 
		while ((!$exito) && ($intentos < 5)) {
			sleep(5);
			$exito = $mail->Send();
			$intentos=$intentos+1;		
		}		
		if(!$exito){
			echo "Problemas enviando correo electrónico!";
			echo "<br/>".$mail->ErrorInfo;	
			redirect(base_url() . 'index.php/correo/Controller_email/enviar');
		}
		else{
			echo "Mensaje enviado correctamente!";
			echo $tabla;
		} 
		redirect(base_url() . 'index.php/header/Controller_usuario/logout');
   }
}
 ?>