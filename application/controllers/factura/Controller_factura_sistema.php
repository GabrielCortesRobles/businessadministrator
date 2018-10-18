<?php
class Controller_factura_sistema extends CI_controller
{
		/*----------------------------------------------------Función para mostrar las vistas---------------------------------------------------------------*/
		public function factura()
			{
				$this->load->model("factura/Model_factura");
				$data['result'] = $this->Model_factura->datos_factura();
				$this->load->view('header/Header');
				$this->load->view('factura/Factura_sistema',$data);
			}
		/*----------------------------------------------------Función de insertar factura---------------------------------------------------------------*/
		public function insertar_factura()
			{
			$rfc_empresa = $this->input->post('rfc_empresa');
			$nom_razonsocial = $this->input->post('nom_razonsocial');
			$regimen_fiscal = $this->input->post('regimen_fiscal');
			$tipo_factura = $this->input->post('tipo_factura');
			$cliente_frecuente = $this->input->post('cliente_frecuente');
			$uso_factura = $this->input->post('uso_factura');
			$clave_producto = $this->input->post('clave_producto');
			$clave_unidad = $this->input->post('clave_unidad');
			$cantidad = $this->input->post('cantidad');
			$unidad = $this->input->post('unidad');
			$num_identificacion = $this->input->post('num_identificacion');
			$descripcion = $this->input->post('descripcion');
			$valor_unitario = $this->input->post('valor_unitario');
			$importe = $this->input->post('importe');
			$descuento = $this->input->post('descuento');
			$adicionales_impuestos = $this->input->post('adicionales_impuestos');
			$adicionales_informacion = $this->input->post('adicionales_informacion');
			$adicionales_cuenta= $this->input->post('adicionales_cuenta');
			$tipo = $this->input->post('tipo');
			$base = $this->input->post('base');
			$impuesto = $this->input->post('impuesto');
			$tasa_cuota = $this->input->post('tasa_cuota');
			$valor_tasa = $this->input->post('valor_tasa');
			$impuestos_importe = $this->input->post('impuestos_importe');
			$fecha = date("Y-m-d");
			date_default_timezone_set('America/Mexico_City');
			$hora = date("H:i:s");
			
			$this->load->model('factura/Model_factura');
			$this->Model_factura->insertar_factura($rfc_empresa, $nom_razonsocial, $regimen_fiscal,$tipo_factura
			,$cliente_frecuente,$uso_factura,$clave_producto,$clave_unidad,$cantidad,$unidad,$num_identificacion,
			$descripcion,$valor_unitario,$importe,$descuento,$adicionales_impuestos,$adicionales_informacion
			,$adicionales_cuenta,$tipo,$base,$impuesto,$tasa_cuota,$valor_tasa,$impuestos_importe,$fecha,$hora);
			redirect(base_url() . 'index.php/Controller_factura_sistema/factura');
			
			}
	
}
?>