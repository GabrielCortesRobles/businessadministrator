<?php
	class Controller_empresa extends CI_Controller 
	{
		/*--------------------------------------------Función modificar empresa---------------------------------------------------*/
		public function modificar_empresa()
			{
				$this->load->model("empresa/Model_empresa");
				$data['result'] = $this->Model_empresa->modificar_empresa();
				$this->load->view("header/Header");
				$this->load->view('empresa/Modificacion_empresa',$data);
				$this->load->view("producto/Modal_alta_producto");
				$this->load->view("empleado/Modal_alta_empleado");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view("ventas/Modal_sesion_ventas");
			}
		/*-----------------------------------------Función actualizar empresa----------------------------------------------------------*/
		public function actualizar_empresa()
			{
			$id_empresa = $this->input->post('id_empresa');
			$datos= $this->input->post(array('rfc_empresa','nom_empresa','razon_social','imagen_empresa','calle','num_calle',
			'colonia','municipio','cp','correo','telefono','regimen_fiscal','activo'));
			$this->load->model("empresa/Model_empresa");
			$this->Model_empresa->actualizar_empresa($id_empresa,$datos);
			redirect(base_url() . 'index.php/header/Controller_inicio/inicio');
			}
		/*--------------------------------------------------------Función para subir imagenes-----------------------------------------------------------------*/
        public function __construct()
			{
					parent::__construct();
					$this->load->helper(array('form', 'url'));
			}
        public function index()
			{
					$this->load->model("empresa/Model_empresa");
					$data['result'] = $this->Model_empresa->modificar_empresa();
					$this->load->view("header/Header");
					$this->load->view('empresa/Modificacion_empresa',$data, array('error' => ' '));
					$this->load->view("producto/Modal_alta_producto");
					$this->load->view("empleado/Modal_alta_empleado");
					$this->load->view("proveedor/Modal_alta_proveedores");
					$this->load->view("cliente/Modal_alta_cliente");
					$this->load->view("ventas/Modal_sesion_ventas");
			}
        public function do_upload()
			{
					$config['upload_path']          = './assets/Images/';
					$config['allowed_types']        = 'gif|jpg|JPG|jpeg|png|ico';
					$config['max_size']             = 50000;
					$config['max_width']            = 2000;
					$config['max_height']           = 2000;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('imagen_empresa'))
					{
							$error = array('error' => $this->upload->display_errors());

							redirect(base_url() . 'index.php/empresa/Controller_empresa/modificar_empresa');
							echo "Seleccione otra imagen.";
					}
					else
					{
						$id_empresa = $this->input->post('id_empresa');
						$datos= $this->input->post(array('rfc_empresa','nom_empresa','razon_social','imagen_empresa','calle','num_calle',
						'colonia','municipio','cp','correo','telefono','regimen_fiscal','activo'));
						$this->load->model("empresa/Model_empresa");
						$this->Model_empresa->actualizar_empresa($id_empresa,$datos);
						redirect(base_url() . 'index.php/header/Controller_inicio/inicio');
					}
			}
	}
?>