<?php
		class Controller_buscar_cliente extends CI_controller{
		/*------------ función de busqueda cliente por el nombre o apellido materno o apellido paterno------------------------*/
			public function buscar_cliente()
			{
				//$nom_cliente = "FERNANDO";
				//$am_cliente=$_POST['am_cliente'];
				$id_cliente=$_POST['id_cliente'];
				//$ap_cliente=$_POST['ap_cliente'];
				/*if ($nom_cliente != "")
				{*/
					$this->load->model('ventas/Model_ventas');
					$res=$this->Model_ventas->buscar_cliente1($id_cliente);
				/*}
				elseif($ap_cliente == true)
				{
					$this->load->model('ventas/Model_ventas');
					$res=$this->Model_ventas->buscar_cliente2($ap_cliente);
						
				}
				else 
				{
					$this->load->model('ventas/Model_ventas');
					$res=$this->Model_ventas->buscar_cliente($am_cliente);
				}*/
				echo json_encode($res);
			}
}
?>