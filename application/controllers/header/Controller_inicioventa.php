<?php
class Controller_inicioventa extends CI_controller
{
	// --------------------------Constructor para Model_ventas --------------------------------------

	function __construct()
		{
			parent::__construct();
			$this -> load -> model('ventas/Model_ventas');
		}

	//vista inicial de usuario ventas
	public function inicio_ventas()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_ventas");
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
				$this->load->view("header/Header_ventas");
				$this->load->view("ventas/Tabla_dinamica_producto");
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
				$this->load->view("header/Header_ventas");
				$this->load->view("cliente/Tabla_dinamica_cliente");
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
				$this->load->view("header/Header_ventas");
				$this->load->view("empleado/Tabla_dinamica_empleado");
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
				$this->load->view("header/Header_ventas");
				$this->load->view("proveedor/Tabla_dinamica_proveedor");
			}
		}
		
	//vista del modulo de ventas para el perfil de ventas
	public function modulo_venta()
		{
			//condicion para la proeccion de vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/controller_inicio/login');
			}
			else
			{
				$venta['venta'] = $this->Model_ventas->sesion_venta($id_empleado);
				$venta['venta1'] = $this->Model_ventas->cliente_mostrador();
				$this->load->view("header/Header_ventas");
				$this->load->view("ventas/Modulo_venta1",$venta);
			}	
		}
	
	//vista inicial de usuario venta-almacen
	public function inicio_venta_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("header/Inicio");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
		
	//vista para la tabla dinamica de productos del sitema
	public function tabla_venta_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("ventas/Tabla_dinamica_producto");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
	//vista para la tabla dinamica de clientes del sitema
	public function tabla_clientes_venta_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("cliente/Tabla_dinamica_cliente");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_empleado_venta_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("empleado/Tabla_dinamica_empleado");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_proveedor_venta_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("proveedor/Tabla_dinamica_proveedor");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}
		
	//vista del modulo de ventas para el perfil de ventas
	public function modulo_venta_almacen()
		{
			//condicion para la proeccion de vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/controller_inicio/login');
			}
			else
			{
				$venta['venta'] = $this->Model_ventas->sesion_venta($id_empleado);
				$venta['venta1'] = $this->Model_ventas->cliente_mostrador();
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modulo_venta1",$venta);
			}	
		}
		
	//vista inicial de usuario caja-venta
	public function inicio_caja_venta()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_caja_venta");
				$this->load->view("header/Inicio");
			}
		}
		
	//vista para la tabla dinamica de productos del sitema
	public function tabla_cajaventa()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_caja_venta");
				$this->load->view("ventas/Tabla_dinamica_producto");
			}
		}
	//vista para la tabla dinamica de clientes del sitema
	public function tabla_clientes_cajaventa()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_caja_venta");
				$this->load->view("cliente/Tabla_dinamica_cliente");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_empleado_cajaventa()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_caja_venta");
				$this->load->view("empleado/Tabla_dinamica_empleado");
			}
		}
	//vista para la tabla dinamica de empleado del sitema
	public function tabla_proveedor_cajaventa()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_caja_venta");
				$this->load->view("proveedor/Tabla_dinamica_proveedor");
			}
		}
		
	//vista del modulo de ventas para el perfil de ventas
	public function modulo_venta_cajaventa()
		{
			//condicion para la proeccion de vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/controller_inicio/login');
			}
			else
			{
				$venta['venta'] = $this->Model_ventas->sesion_venta($id_empleado);
				$venta['venta1'] = $this->Model_ventas->cliente_mostrador();
				$this->load->view("header/Header_caja_venta");
				$this->load->view("ventas/Modulo_venta1",$venta);
			}	
		}
		
	//vista del Modulo de caja
	public function modulo_caja()
		{
			$this->load->view("header/Header_caja_venta");
			$this->load->view("ventas/Modulo_caja");
		}
}
?>