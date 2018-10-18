<?php
class Controller_producto extends CI_Controller 
{
	/*----------------------------------------------------Insertar Producto---------------------------------------------------------------*/
	public function insertar_producto()
		{
			$nom_producto = $this->input->post('nom_producto');
			$marca = $this->input->post('marca');
			$id_proveedor = $this->input->post('id_proveedor');
			$codigo_int = $this->input->post('codigo_int');
			$codigo_sat = $this->input->post('codigo_sat');
			$cantidad_prod = $this->input->post('cantidad_prod');
			$descripcion = $this->input->post('descripcion');
			$precio_adquisicion = $this->input->post('precio_adquisicion');
			$precio_cu = $this->input->post('precio_cu');
			$precio_menudeo = $this->input->post('precio_menudeo');
			$precio_mayoreo = $this->input->post('precio_mayoreo');
			$piezas_mediomayoreo = $this->input->post('piezas_mediomayoreo');
			$piezas_mayoreo = $this->input->post('piezas_mayoreo');
			$activo = $this->input->post('activo');
			
			$this->load->model('producto/Model_producto');
			$this->Model_producto->insertar_producto($nom_producto,$marca,$id_proveedor,$codigo_int,$codigo_sat,$cantidad_prod,
													$descripcion,$precio_adquisicion,$precio_cu,$precio_menudeo,$precio_mayoreo, $piezas_mediomayoreo, $piezas_mayoreo,$activo);		
		}
	/*----------------------------------------------------Busqueda producto administrador---------------------------------------------------------------*/
	public function buscar_producto()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('producto/Busqueda_producto',$data);
			}
		}
	
	/*----------------------------------------------------Busqueda producto caja---------------------------------------------------------------*/
	public function buscar_producto_caja()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja");
				$this->load->view('producto/Busqueda_producto1',$data);
			}
		}
	
	/*----------------------------------------------------Busqueda producto venta---------------------------------------------------------------*/
	public function buscar_producto_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_ventas");
				$this->load->view('producto/Busqueda_producto1',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda producto almacen---------------------------------------------------------------*/
	public function buscar_producto_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('producto/Busqueda_producto',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda proveedor caja y almacen---------------------------------------------------------------*/
	public function buscar_producto_caja_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('producto/Busqueda_producto',$data);
			}
		}	
	
	/*----------------------------------------------------Busqueda proveedor caja y venta---------------------------------------------------------------*/
	public function buscar_producto_caja_venta()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_caja_venta");
				$this->load->view('producto/Busqueda_producto1',$data);
			}
		}
	
	/*----------------------------------------------------Busqueda proveedor venta y almacen---------------------------------------------------------------*/
	public function buscar_producto_venta_almacen()
		{
			$id_empleado = $_SESSION['id_empleado'];
			if ($id_empleado == null)
			{
				redirect(base_url() . 'index.php/header/Controller_inicio/login');
			}
			else
			{
				$this->load->model("producto/Model_producto");
				$id = $this->input->post('criterio');
				$data['res'] = $this->Model_producto->buscar_producto($id);
				$data['id']=$id;
				$this->load->view("header/Header_venta_almacen");
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('producto/Busqueda_producto',$data);
			}
		}
	/*----------------------------------------------------Eliminación producto---------------------------------------------------------------*/
	public function eliminar_producto($id_producto)
		{
			$this->load->model("producto/Model_producto");
			$this->Model_producto->eliminar_producto($id_producto);
			redirect(base_url() . 'index.php/producto/Controller_producto/buscar_producto');
		}
	/*----------------------------------------------------Modificación producto---------------------------------------------------------------*/
	public function modificar_producto($id_producto)
		{
			$this->load->model("producto/Model_producto");
			$data['result'] = $this->Model_producto->modificar_producto($id_producto);
			$this->load->view("header/Header");
			$this->load->view("producto/Modal_alta_producto");
			$this->load->view("empleado/Modal_alta_empleado");
			$this->load->view("proveedor/Modal_alta_proveedores");
			$this->load->view("cliente/Modal_alta_cliente");
			$this->load->view('producto/Modificacion_producto',$data);
		}
	/*----------------------------------------------------Actualizar producto---------------------------------------------------------------*/
	public function actualizar_producto()
		{
		$id_producto = $this->input->post('id_producto');
		$datos= $this->input->post(array('nom_producto','marca','codigo_int','codigo_sat',
		'cantidad_prod','descripcion','precio_cu','precio_menudeo','precio_mayoreo'));
		$this->load->model("producto/Model_producto");
		$this->Model_producto->actualizar_producto($id_producto,$datos);
		redirect(base_url() . 'index.php/producto/Controller_producto/buscar_producto');
		}
}
?>