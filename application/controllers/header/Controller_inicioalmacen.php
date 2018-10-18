<?php
class Controller_inicioalmacen extends CI_controller
{

	//vista inicial de usuario almacen
	public function inicio_almacen()
		{	//condicion para la proteccion de las vistas
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/controller_inicio/login');
			}
			else
			{
				$this->load->view("header/Header_almacen");
				$this->load->view("header/Inicio");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
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
				$this->load->view("header/Header_almacen");
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
				$this->load->view("header/Header_almacen");
				$this->load->view("cliente/Tabla_dinamica_cliente");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
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
				$this->load->view("header/Header_almacen");
				$this->load->view("empleado/Tabla_dinamica_empleado");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
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
				$this->load->view("header/Header_almacen");
				$this->load->view("proveedor/Tabla_dinamica_proveedor");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
			}
		}

}
?>