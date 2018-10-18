<?php
class Controller_buscar_empleado extends CI_controller{
		//función para buscar el empleado en la base de datos
		public function buscar_empleado()
		{
			$nom_empleado=$_POST['nom_empleado'];
			$ap_empleado=$_POST['ap_empleado'];
			if ($nom_empleado == true)
			{
				$this->load->model('ventas/Model_ventas');
				$res=$this->Model_ventas->buscar_empleado1($nom_empleado);
			}
			else 
			{
				$this->load->model('ventas/Model_ventas');
				$res=$this->Model_ventas->buscar_empleado2($ap_empleado);
			}
			echo json_encode($res);
		}
			
		//Función para buscar los rivilegios de usuario para el modulo de venta apartado cobrar (caja)
		function __construct()
		{
			parent::__construct();
			$this -> load -> model('ventas/Model_ventas');
		}
		public function privilegios()
		{
			$id = $this->input->post('id');
			$this->load->model('Model_ventas');
			$res=$this->Model_ventas->privilegios($id);
			$privilegio_caja = $res->privilegio_caja;
			if ($privilegio_caja == 1)
			{
			}
			else
			{
				$this->load->model('Model_ventas');
				$res=$this->Model_ventas->privilegios1($id);
				$administrador = $res->administrador;
				if ($administrador == 1)
				{
					
				}				
			}
			echo json_encode($res);
		}
}
?>