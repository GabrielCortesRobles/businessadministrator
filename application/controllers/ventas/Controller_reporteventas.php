<?php
error_reporting(0);
class Controller_reporteventas extends CI_controller
{
    //En esta funcion se mandan a llamar las vistas para el reporte de venta
    public function ventasfecha()
    {
        $this->load->view('header/Header');
        $this->load->view("producto/Modal_alta_producto");
        $this->load->view("empleado/Modal_alta_empleado");
        $this->load->view("proveedor/Modal_alta_proveedores");
        $this->load->view("cliente/Modal_alta_cliente");
        $this->load->view('ventas/Ventas_fecha');
    }

    //En esta funcion se realiza la busqueda para realizar el reporte
    public function buscarventas()
    {
       $fecha1 = $this->input->post('fecha1');
        $fecha2 = $this->input->post('fecha2');
        $this->load->model('ventas/Model_ventasfecha');
        $data['res']=$this->Model_ventasfecha->buscarventas($fecha1,$fecha2);
		$data['fecha1'] = $fecha1;
		$data['fecha2'] = $fecha2;
        $this->load->view('ventas/Rventasfecha',$data);
    }
	
	public function ventasultimomes()
		{
			    $id = $this->input->post('id');
				$this->load->model('ventas/Model_ventasfecha');
				$data['res']=$this->Model_ventasfecha->ultimomes();
				$data['id'] = $id;
				$this->load->view("header/Header");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('ventas/Rventasultimomes',$data);
			
		}
		
	public function ventashoy()
		{
				 $id = $this->input->post('id');
				$this->load->model('ventas/Model_ventasfecha');
				$data['res']=$this->Model_ventasfecha->ventashoy();
				$data['id'] = $id;
				$this->load->view("header/Header");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('ventas/Rventashoy',$data);
			
		}
	public function ventasultimoano()
		{
			    $id = $this->input->post('id');
				$this->load->model('ventas/Model_ventasfecha');
				$data['res']=$this->Model_ventasfecha->ultimoano();
				$data['id'] = $id;
				$this->load->view("header/Header");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('ventas/Rventasultimoano',$data);
			
		}
		
		public function ventasultimasemana()
		{
			    $id = $this->input->post('id');
				$this->load->model('ventas/Model_ventasfecha');
				$data['res']=$this->Model_ventasfecha->ultimasemana();
				$data['id'] = $id;
				$this->load->view("header/Header");
				$this->load->view("proveedor/Modal_alta_proveedores");
				$this->load->view("cliente/Modal_alta_cliente");
				$this->load->view('ventas/Rventasultimasemana',$data);
			
		}
		
			
	public function ventaspendientes($id_venta)
	{
		$this->load->model('ventas/Model_caja');
		$data['res']=$this->Model_caja->caja();
		$data['res1']=$this->Model_caja->caja_detalle($id_venta);
		$this->load->view("header/Header");
		$this->load->view("proveedor/Modal_alta_proveedores");
		$this->load->view("cliente/Modal_alta_cliente");
		$this->load->view('ventas/Rventas_pendientes',$data);
	}
	
	public function eliminar_venta($id_venta)
	{
		$this->load->model('ventas/Model_ventasfecha');
		$this->Model_ventasfecha->cancelarventa($id_venta);
		$this->Model_ventasfecha->eliminar_venta($id_venta);
		redirect(base_url() . 'index.php/ventas/Controller_reporteventas/ventaspendientes');
	}

	public function eliminardetalle_venta($id_detalle,$id_venta)
	{
		$this->load->model('ventas/Model_ventasfecha');
		$this->Model_ventasfecha->eliminar_detalleventa($id_detalle, $id_venta);
		redirect(base_url() . 'index.php/ventas/Controller_reporteventas/ventaspendientes'); 
	}
	
}
?>