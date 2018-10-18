<?php
class Controller_tiket extends CI_controller
{
		
		public function buscar_tiket()
		{
			$this->load->model("Model_tiket");
			$id = $this->input->post('criterio');
			$data['res'] = $this->Model_tiket->buscar_tiket($id);
			$data['id']=$id;
			$this->load->view("Header");
			$this->load->view("Modal_alta_producto");
			$this->load->view("Modal_alta_empleado");
			$this->load->view("Modal_alta_usuario");
			$this->load->view("Modal_alta_proveedores");
			$this->load->view("Modal_alta_cliente");
			$this->load->view('Tiket',$data);
		}
		
			
			
}
?>