<?php
class Controller_proveedor extends CI_Controller 
{
	/*----------------------------------------------------Insertar proveedor---------------------------------------------------------------*/
	public function insertar_proveedor()
		{
			$rfc_proveedor = $this->input->post('rfc_proveedor');
			$nom_empresa = $this->input->post('nom_empresa');
			$direccion = $this->input->post('direccion');
			$correo = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$activo = $this->input->post('activo');
			
			$this->load->model('proveedor/Model_proveedor');
			$this->Model_proveedor->insertar_proveedor($rfc_proveedor,$nom_empresa,$direccion,$correo,$telefono,$activo);
			
		}
	/*----------------------------------------------------Busqueda proveedor administrador---------------------------------------------------------------*/
	public function buscar_proveedor()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('proveedor/Busqueda_proveedor',$data);
			}
		}
		
	/*----------------------------------------------------Busqueda proveedor ventas---------------------------------------------------------------*/
	public function buscar_proveedor_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_ventas");
				$this->load->view('proveedor/Busqueda_proveedor1',$data);
			}
			
		}	
	/*----------------------------------------------------Busqueda proveedor almacen---------------------------------------------------------------*/
	public function buscar_proveedor_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('proveedor/Busqueda_proveedor',$data);
			}
		}
			
	/*----------------------------------------------------Busqueda proveedor caja---------------------------------------------------------------*/
	public function buscar_proveedor_caja()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja");
				$this->load->view('proveedor/Busqueda_proveedor1',$data);
			}
		}
	/*----------------------------------------------------Busqueda proveedor caja y venta---------------------------------------------------------------*/
	public function buscar_proveedor_caja_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_venta");
				$this->load->view('proveedor/Busqueda_proveedor1',$data);
			}
		}
	/*----------------------------------------------------Busqueda proveedor venta y almacen---------------------------------------------------------------*/
	public function buscar_proveedor_venta_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('proveedor/Busqueda_proveedor',$data);
			}
		}
	/*----------------------------------------------------Busqueda proveedor venta y almacen---------------------------------------------------------------*/
	public function buscar_proveedor_caja_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("proveedor/Model_proveedor");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_proveedor->buscar_proveedor($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('proveedor/Busqueda_proveedor',$data);
			}
		}
	/*----------------------------------------------------Eliminación proveedor---------------------------------------------------------------*/
	public function eliminar_proveedor($id_proveedor)
		{
			$this->load->model("proveedor/Model_proveedor");
			$this->Model_proveedor->eliminar_proveedor($id_proveedor);
			redirect(base_url() . 'index.php/proveedor/Controller_proveedor/buscar_proveedor');
		}
	/*----------------------------------------------------Modificar proveedor---------------------------------------------------------------*/
	public function modificar_proveedor($id_proveedor)
		{
			$this->load->model("proveedor/Model_proveedor");
			$data['result'] = $this->Model_proveedor->modificar_proveedor($id_proveedor);
			$this->load->view("header/Header");
			$this->load->view("proveedor/Modal_alta_proveedores");
			$this->load->view("cliente/Modal_alta_cliente");       
			$this->load->view("empleado/Modal_alta_empleado");
			$this->load->view("producto/Modal_alta_producto");
			$this->load->view('proveedor/Modificacion_proveedor',$data);
		}
	/*----------------------------------------------------Actualizar proveedor---------------------------------------------------------------*/
	public function actualizar_proveedor()
		{
			$id_proveedor = $this->input->post('id_proveedor');
			$rfc_proveedor = $this->input->post('rfc_proveedor');
			$nom_empresa = $this->input->post('nom_empresa');
			$direccion = $this->input->post('direccion');
			$correo = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$activo = $this->input->post('activo');
			$this->load->model("proveedor/Model_proveedor");
			$this->Model_proveedor->actualizar_proveedor($id_proveedor,$rfc_proveedor,$nom_empresa,$direccion,$correo,$telefono,$activo);
			redirect(base_url() . 'index.php/proveedor/Controller_proveedor/buscar_proveedor');
		}
}
?>