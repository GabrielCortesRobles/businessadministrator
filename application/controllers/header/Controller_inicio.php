<?php
class Controller_inicio extends CI_controller
{

	//vista principal del sitema
	public function inicio()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("header/Inicio");
			}
		}
	//vista para la tabla dinamica de productos del sitema
	public function tabla()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header");
				$this->load->view("ventas/Tabla_dinamica_producto");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
	//vista para la tabla dinamica de clientes del sitema
	public function tabla_clientes()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header");
				$this->load->view("cliente/Tabla_dinamica_cliente");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modal_sesion_ventas");
				$this->load->view("ventas/Modal_sesion_ventas");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_empleado()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header");
				$this->load->view("empleado/Tabla_dinamica_empleado");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modal_sesion_ventas");
				$this->load->view("ventas/Modal_sesion_ventas");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_proveedor()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header");
				$this->load->view("proveedor/Tabla_dinamica_proveedor");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modal_sesion_ventas");
			}
		}
	//vista principal del sitema
	public function venta()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->model('ventas/Model_ventas');
				$venta['venta'] = $this->Model_ventas->sesion_venta($id_empleado);
				$venta['venta1'] = $this->Model_ventas->cliente_mostrador();
				$this->load->view("header/Header");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modulo_venta1",$venta);
			}
		}
	
	//vista del logeo del sitema
	public function login()
		{
			$this->load->view("header/Login");
		}
	//vista del Modulo de caja
	public function modulo_caja()
		{
			$this->load->view("header/Header");
			$this->load->view("producto/Modal_alta_producto");
			$this->load->view("empleado/Modal_alta_empleado");
			$this->load->view("proveedor/Modal_alta_proveedores");
			$this->load->view("cliente/Modal_alta_cliente");
			$this->load->view("ventas/Modulo_caja");
		}
}
?>