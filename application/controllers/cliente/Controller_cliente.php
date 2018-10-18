<?php
class Controller_cliente extends CI_Controller 
{
	/*-----------------------------------------Insertar cliente----------------------------------------------------------------------------------------------*/
	public function insertar_cliente()
		{
			$rfc_cliente = $this->input->post('rfc_cliente');
			$nom_cliente = $this->input->post('nom_cliente');
			$ap_cliente = $this->input->post('ap_cliente');
			$am_cliente = $this->input->post('am_cliente');
			$curp_cliente = $this->input->post('curp_cliente');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$calle = $this->input->post('calle');
			$numero_interior = $this->input->post('numero_interior');
			$numero_exterior = $this->input->post('numero_exterior');
			$colonia = $this->input->post('colonia');
			$municipio = $this->input->post('municipio');
			$cp = $this->input->post('cp');
			$correo  = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$sexo = $this->input->post('sexo');
			$activo = $this->input->post('activo');
			$this->load->model('cliente/Model_cliente');
			$this->Model_cliente->insertar_cliente($rfc_cliente,$nom_cliente,$ap_cliente,$am_cliente,$curp_cliente,$fecha_nacimiento,$calle,$numero_interior,$numero_exterior,$colonia,
			$municipio,$cp,$correo,$telefono,$sexo,$activo);
			
			
		}
	
	/*----------------------------------------------------Busqueda cliente administrador---------------------------------------------------------------*/
	public function buscar_cliente()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view('cliente/Busqueda_cliente',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda cliente venta---------------------------------------------------------------*/
	public function buscar_cliente_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_ventas");
				$this->load->view('cliente/Busqueda_cliente1',$data);
			}
		}			
	/*----------------------------------------------------Busqueda cliente almacen---------------------------------------------------------------*/
	public function buscar_cliente_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_almacen");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view('cliente/Busqueda_cliente',$data);
			}
		}	
	/*----------------------------------------------------Busqueda cliente caja---------------------------------------------------------------*/
	public function buscar_cliente_caja()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja");
				$this->load->view('cliente/Busqueda_cliente1',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda cliente caja y almacen---------------------------------------------------------------*/
	public function buscar_cliente_caja_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('cliente/Busqueda_cliente',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda cliente caja y venta---------------------------------------------------------------*/
	public function buscar_cliente_caja_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_venta");
				$this->load->view('cliente/Busqueda_cliente1',$data);
			}
		}
	
	/*----------------------------------------------------Busqueda cliente venta y almacen---------------------------------------------------------------*/
	public function buscar_cliente_venta_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("cliente/Model_cliente");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_cliente->buscar_cliente($id);
				$data['id']=$id;
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('cliente/Busqueda_cliente',$data);
			}
		}
	/*---------------------------------------------------Eliminar cliente-----------------------------------------------------------------------------------------------*/
	public function eliminar_cliente($id_cliente)
		{
			$this->load->model("cliente/Model_cliente");
			$this->Model_cliente->eliminar_cliente($id_cliente);
			redirect(base_url() . 'index.php/cliente/Controller_cliente/buscar_cliente');
		}
	/*---------------------------------------------------------------------Modificar cliente---------------------------------------------------------------------------------------*/
	public function modificar_cliente($id_cliente)
		{
			$this->load->model("cliente/Model_cliente");
			$data['result'] = $this->Model_cliente->modificar_cliente($id_cliente);
			$this->load->view("header/Header");
			$this->load->view("cliente/Modal_alta_cliente");
			$this->load->view('cliente/Modificacion_cliente',$data);
		}
	/*-------------------------------------------------------------------Actualizar cliente----------------------------------------------------------------------------------*/
	public function actualizar_cliente()
		{
			$id_cliente = $this->input->post('id_cliente');
			$rfc_cliente = $this->input->post('rfc_cliente');
			$nom_cliente = $this->input->post('nom_cliente');
			$ap_cliente = $this->input->post('ap_cliente');
			$am_cliente = $this->input->post('am_cliente');
			$curp_cliente = $this->input->post('curp_cliente');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$calle = $this->input->post('calle');
			$numero_interior = $this->input->post('numero_interior');
			$numero_exterior = $this->input->post('numero_exterior');
			$colonia = $this->input->post('colonia');
			$municipio = $this->input->post('municipio');
			$cp = $this->input->post('cp');
			$correo  = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$sexo = $this->input->post('sexo');
			$activo = $this->input->post('activo');
		$this->load->model("cliente/Model_cliente");
		$this->Model_cliente->actualizar_cliente($id_cliente,$rfc_cliente,$nom_cliente,$ap_cliente,$am_cliente,$curp_cliente,$fecha_nacimiento,$calle,$numero_interior,$numero_exterior,$colonia,
			$municipio,$cp,$correo,$telefono,$sexo,$activo);
		redirect(base_url() . 'index.php/cliente/Controller_cliente/buscar_cliente');
		}
}
?>