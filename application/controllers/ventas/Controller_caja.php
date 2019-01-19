<?php
error_reporting(0);
class Controller_caja extends CI_controller
{
	/*----------------------------------------------------Insertar caja---------------------------------------------------------------*/
	public function insertar_caja()
		{
			$id_usuario = $this->input->post('id_usuario');
			$id_empleado = $this->input->post('id_empleado');
			$pass_usucaja = $this->input->post('pass_usucaja');
			$contra = sha1($pass_usucaja);
			$correo = $this->input->post('correo');
			$this->load->model('ventas/Model_caja');
			$this->Model_caja->insertar_caja($id_usuario,$id_empleado,$contra,$pass_usucaja,$correo,$activo);
			redirect(base_url() . 'index.php/Controller_inicio/inicio');
		}
	/*----------------------------------------------------Busqueda cliente apellido materno y paterno del cliente---------------------------------------------------------------*/
	public function buscar_cliente()
	{
		$ap_cliente=$_POST['ap_cliente'];
		$am_cliente=$_POST['am_cliente'];
		if ($ap_cliente == true)
		{
			$this->load->model('ventas/Model_caja');
			$res=$this->Model_caja->buscar_cliente($ap_cliente);
		}
		else
		{
			$this->load->model('ventas/Model_caja');
			$res=$this->Model_caja->buscar_cliente1($am_cliente);
		}
		echo json_encode($res);
	}
		
	public function logout()
	{
		unset ( $_SESSION [ 'correo' ]);
		redirect(base_url() . 'index.php/controller_inicio/login'); 
	}
	/*--------------------------------------------------------------------------------------------------------------------------------------------*/
	public function caja($id_venta)
	{
		$this->load->model('ventas/Model_caja');
		$data['res']=$this->Model_caja->caja();
		$data['res1']=$this->Model_caja->caja_detalle($id_venta);
		$this->load->view("header/Header");
		$this->load->view("producto/Modal_alta_producto");
		$this->load->view("empleado/Modal_alta_empleado");
		$this->load->view("proveedor/Modal_alta_proveedores");
		$this->load->view("cliente/Modal_alta_cliente");
		$this->load->view("ventas/Modal_editacaja");
		$this->load->view("ventas/Modulo_caja",$data);
		
	}

	public function insertar_cobro()
	{
		$id_venta=$_POST['id_venta'];
		$recibido_venta=$_POST['recibido_venta'];
		$cambio_venta=$_POST['cambio_venta'];
		$this->load->model('ventas/Model_caja');
		$this->Model_caja->insertar_cobro($id_venta,$recibido_venta,$cambio_venta);
		redirect(base_url() . 'index.php/ventas/Controller_caja/caja'); 
	}
	
	public function eliminar_venta($id_venta)
	{
		$this->load->model('ventas/Model_caja');
		$this->Model_caja->eliminar_venta($id_venta);
		$this->load->view("header/Header");
		$this->load->view("ventas/Modulo_caja",$data);
		redirect(base_url() . 'index.php/ventas/Controller_caja/caja'); 
	}
	
	public function eliminar_detalleventa($id_detalle, $id_venta)
	{
		$this->load->model('ventas/Model_caja');
		$this->Model_caja->eliminar_detalleventa($id_detalle, $id_venta);
		redirect(base_url() . "index.php/ventas/Controller_caja/caja/".$id_venta.""); 
	}
}
?>