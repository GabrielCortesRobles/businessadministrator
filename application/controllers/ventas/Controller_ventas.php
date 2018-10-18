<?php
class Controller_ventas extends CI_controller
{
		/*----------------------------------------------------Busqueda producto---------------------------------------------------------------*/
		public function buscar_producto()
			{
			$cod_int=$_POST['cod_int'];
			$nom_producto=$_POST['nom_producto'];
			if ($nom_producto == true)
			{
				$this->load->model('ventas/Model_ventas');
				$res=$this->Model_ventas->buscar_producto1($nom_producto);
			}
			else
			{
				$this->load->model('ventas/Model_ventas');
				$res=$this->Model_ventas->buscar_producto($cod_int);
			}
			echo json_encode($res);
			}
		/*----------------------------------------------------Función para recibir venta---------------------------------------------------------------*/
		public function recibe_venta()
			{
				$prods	=json_decode($_POST['datos']);
				$id_cliente	=json_decode($_POST['id_cliente']);
				$total	=json_decode($_POST['total']);
				//echo "vas bien";
				$this->load->model('ventas/Model_ventas');
				$this->Model_ventas->insertar_venta($id_cliente, $total);
			}
		/*----------------------------------------------------Insertar venta---------------------------------------------------------------*/
		public function insertar_venta()
			{
				$productos	=	json_decode($_POST['datos']);
				//$cant			=	json_decode($_POST['cant']);
				//$subt			=	json_decode($_POST['subt']);
				$id_cliente		=	json_decode($_POST['id_cliente']);
				$id_empleado	=	json_decode($_POST['id_empleado']);
				$total			=	json_decode($_POST['total']);
				$recibido_venta	=	json_decode($_POST['recibido_venta']);
				if($recibido_venta == 0)
				{
					$estado='Pendiente';
				}
				else
				{
					$estado='Pagado';
				}
				$cambio_venta	=	json_decode($_POST['cambio_venta']);
			
				//echo $productos,"<br>",$id_cliente,"<br>", $id_empleado,"<br>",$total;
				$this->load->model('ventas/Model_ventas');
				$this->Model_ventas->insertar_venta($id_cliente,$id_empleado,$total,$recibido_venta,$cambio_venta,$estado);
				$this->Model_ventas->insertar_detalleventa($productos);
			
			}
	
	// -------------------------- Modelo --------------------------------------

	function __construct()
		{
			parent::__construct();
			$this -> load -> model('ventas/Model_ventas');
		}
	// Inicia funcion de logeo para el usuario del modulo de ventas
	public function session_ventas()
		{ 	//error_reporting(0);
			$correo = $this->input->post('correo');
			$pass_usuario = $this->input->post('pass_usuario');
			$this->load->model('ventas/Model_ventas');
			$permisos = $this->Model_ventas->sesion_venta($correo, $pass_usuario);
			foreach($permisos as $obj)
			{
				$privilegio_admin = $obj->privilegio_admin;
				$privilegio_venta = $obj->privilegio_venta;
			}
			$venta['venta'] = $this->Model_ventas->sesion_venta($correo, $pass_usuario);
			$venta['venta1'] = $this->Model_ventas->cliente_mostrador();
			
			if($privilegio_admin==1)
			{
				$this->load->view("ventas/Modulo_venta1",$venta);
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
			else
			{
				if($privilegio_venta==1)
				{
					$this->load->view("ventas/Modulo_venta1",$venta);
					$this->load->view("producto/Modal_alta_producto");
					$this->load->view("empleado/Modal_alta_empleado");
					$this->load->view("proveedor/Modal_alta_proveedores");
					$this->load->view("cliente/Modal_alta_cliente");
				}
			}
		}
		
		public function logout()
		{
			session_start();
			$this -> session -> sess_destroy();
			redirect(base_url() . 'index.php/header/Controller_inicio/login'); 
		}
			
}
?>