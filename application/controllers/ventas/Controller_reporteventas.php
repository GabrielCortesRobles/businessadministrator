<?php
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
}
?>