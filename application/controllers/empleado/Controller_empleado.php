<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_empleado extends CI_Controller
{
	/*------------------------Función para mostrar la vista-------------------------*/
	public function empleado()
		{
			$this->load->view("Modal_alta_empleado");
		}
	/*-------------------------------------------Función de insertar empleado-----------------------------*/
	public function insertar_empleado()
		{
			$nom_empleado = $this->input->post('nom_empleado');
			$ap_empleado = $this->input->post('ap_empleado');
			$am_empleado = $this->input->post('am_empleado');
			$calle = $this->input->post('calle');
			$numero_interior = $this->input->post('numero_interior');
			$numero_exterior = $this->input->post('numero_exterior');
			$colonia = $this->input->post('colonia');
			$municipio = $this->input->post('municipio');
			$cp = $this->input->post('cp');
			$correo = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$id_tipoempleado = $this->input->post('id_tipoempleado');
			$sexo = $this->input->post('sexo');
			$activo = $this->input->post('activo');
			$curp_empleado = $this->input->post('curp_empleado');
			$rfc_empleado = $this->input->post('rfc_empleado');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$contrasena = $this->input->post('contrasena');
			$privilegio_venta = $this->input->post('privilegio_venta');
			$privilegio_almacen = $this->input->post('privilegio_almacen');
			$privilegio_caja = $this->input->post('privilegio_caja');
			
			$this->load->Model('empleado/Model_empleado');
			$this->Model_empleado->insertar_empleado($nom_empleado,$ap_empleado,$am_empleado,$calle,$numero_interior,
													$numero_exterior,$colonia,$municipio,$cp,$correo,$telefono,$id_tipoempleado,$sexo,
													$activo,$curp_empleado,$rfc_empleado,$fecha_nacimiento,
													$contrasena,$privilegio_venta,
													$privilegio_almacen,$privilegio_caja);
		}	
	/*----------------------------------------------------Busqueda empleado administrador---------------------------------------------------------------*/
	public function buscar_empleado()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id'] = $id;
				$this->load->view("header/Header");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('empleado/Busqueda_empleado',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda empleado ventas ---------------------------------------------------------------*/
	public function buscar_empleado_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id'] = $id;
				$this->load->view("header/Header_ventas");
				$this->load->view('empleado/Busqueda_empleado1',$data);
			}
		}	
	/*----------------------------------------------------Busqueda empleado almacen ---------------------------------------------------------------*/
	public function buscar_empleado_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id'] = $id;
				$this->load->view("header/Header_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('empleado/Busqueda_empleado',$data);
			}
		}	
	/*----------------------------------------------------Busqueda empleado caja ---------------------------------------------------------------*/
	public function buscar_empleado_caja()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id'] = $id;
				$this->load->view("header/Header_caja");
				$this->load->view('empleado/Busqueda_empleado1',$data);
			}
		}	
	/*----------------------------------------------------Busqueda empleado caja y almacen---------------------------------------------------------------*/
	public function buscar_empleado_caja_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('empleado/Busqueda_empleado',$data);
			}
		}	
	/*----------------------------------------------------Busqueda empleado caja y venta---------------------------------------------------------------*/
	public function buscar_empleado_caja_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_venta");
				$this->load->view('empleado/Busqueda_empleado1',$data);
			}
		}
	/*----------------------------------------------------Busqueda empleado venta y almacen---------------------------------------------------------------*/
	public function buscar_empleado_venta_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("empleado/Model_empleado");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_empleado->buscar_empleado($id);
				$data['id']=$id;
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('empleado/Busqueda_empleado',$data);
			}
		}
	/*----------------------------------------------------Eliminación empleado---------------------------------------------------------------*/		
	public function eliminar_empleado($id_empleado)
		{
			$this->load->model("empleado/Model_empleado");
			$this->Model_empleado->eliminar_empleado($id_empleado);
			redirect(base_url() . 'index.php/header/Controller_inicio/inicio');
		}
	/*----------------------------------------------------Modificación empleado---------------------------------------------------------------*/
	public function modificar_empleado($id_empleado)
		{
			$this->load->model("empleado/Model_empleado");
			$data['result'] = $this->Model_empleado->modificar_empleado($id_empleado);
			$this->load->view("header/Header");
			$this->load->view("producto/Modal_alta_producto");
			$this->load->view("empleado/Modal_alta_empleado");
			$this->load->view("empleado/Modificacion_empleado",$data);
		}
	/*----------------------------------------------------Actualizar emleado---------------------------------------------------------------*/
	public function actualizar_empleado()
		{
			$id_empleado = $this->input->post('id_empleado');
			$nom_empleado = $this->input->post('nom_empleado');
			$ap_empleado = $this->input->post('ap_empleado');
			$am_empleado = $this->input->post('am_empleado');
			$calle = $this->input->post('calle');
			$numero_interior = $this->input->post('numero_interior');
			$numero_exterior = $this->input->post('numero_exterior');
			$colonia = $this->input->post('colonia');
			$municipio = $this->input->post('municipio');
			$cp = $this->input->post('cp');
			$correo = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$id_tipoempleado = $this->input->post('id_tipoempleado');
			$sexo = $this->input->post('sexo');
			$activo = $this->input->post('activo');
			$curp_empleado = $this->input->post('curp_empleado');
			$rfc_empleado = $this->input->post('rfc_empleado');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$contrasena = $this->input->post('contrasena');
			$privilegio_venta = $this->input->post('privilegio_venta');
			$privilegio_almacen = $this->input->post('privilegio_almacen');
			$privilegio_caja = $this->input->post('privilegio_caja');
			$this->load->model('empleado/Model_empleado');
			$this->Model_empleado->actualizar_empleado($id_empleado,$nom_empleado,$ap_empleado,$am_empleado,$calle,$numero_interior,
													$numero_exterior,$colonia,$municipio,$cp,$correo,$telefono,$id_tipoempleado,$sexo,
													$activo,$curp_empleado,$rfc_empleado,$fecha_nacimiento,
													$contrasena,$privilegio_venta,
													$privilegio_almacen,$privilegio_caja);
			redirect(base_url() . 'index.php/empleado/Controller_empleado/buscar_empleado');
		}
}
?>