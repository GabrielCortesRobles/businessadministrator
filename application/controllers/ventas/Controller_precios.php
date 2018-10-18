<?php
class Controller_precios extends CI_controller{
	/*----------------------------------------------------Funcion de precios para mostrar el precio segun sea la cantidad---------------------------------------------------------------*/
		public function precios()
		{
			$id_producto=$_POST['id_producto'];
			$cant=$_POST['cant'];
			//$precio_menudeo=$_POST['precio_menudeo'];
			//$precio_mayoreo=$_POST['precio_mayoreo'];
			if ($cant <= 20)
			{
				$this->load->model('ventas/Model_ventas');
				$res=$this->Model_ventas->buscar_precio($id_producto);
			}
			else
			{
				if( $cant >= 21 and $cant <= 50 )
				{
					$this->load->model('ventas/Model_ventas');
					$res=$this->Model_ventas->buscar_precio1($id_producto);
						
				}
				else
				{
				
					if($cant >= 51) 
					{
					$this->load->model('ventas/Model_ventas');
					$res=$this->Model_ventas->buscar_precio2($id_producto);
					}
				}
			}
			echo json_encode($res);
		}
}
?>