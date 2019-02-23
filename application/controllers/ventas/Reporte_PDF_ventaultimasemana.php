<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reporte_PDF_ventaultimasemana extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
    }
	
	 public function ExportarPDF() 
	{ 
		$pdf = new TCPDF('L','mm','A4');    
  
		//Información del Documento
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('systelecoms');
		$pdf->SetTitle('Reporte_PDF_ventaultimasemana');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	
		//Configurar fuente
		$pdf->SetFont('times', 'B', 20, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de todas las zonas que se encuentran disponibles en el .
		$this->load->model("ventas/Model_ventasfecha");
		$res = $this->Model_ventasfecha->ultimasemana();
		$res2 = $this->Model_ventasfecha->buscarventas1();
		$pdf->Image('assets/images/Systelecom.png', '', '', 50, 25, '', '', '', false, 250, '', false, false, 1, false, false, false);
		$pdf->cell(250,15,'REPORTE VENTAS DE LA ULTIMA SEMANA',0,1,'C');
		$pdf->SetFont('times', 'B', 12, 'L', true);   
	
		 foreach($res2 as $obj)
		 {
			$pdf->cell(250,15,'',0,1,'C');
			$pdf->cell(60,10,'NOMBRE DE LA EMPRESA: ',0,0);
			$pdf->cell(100,10,$obj->nom_empresa,0,0);
			
		 } 
		 
		$pdf->cell(30,10,'FECHA:',0,0);
		$pdf->cell(25,10,$fecha,0,1);
		 
	
		 
		 foreach($res2 as $obj)
		 {
		
			$pdf->cell(60,15,'RAZON SOCIAL DE LA EMP: ',0,0);
			$pdf->cell(50,15,$obj->razon_social,0,1);
		 } 
		
		$pdf->SetFont('times', 'B', 9, 'L', true);   
	
		$pdf->cell(25,5,'NO. VENTA',1,0);
		$pdf->cell(50,5,'NOMBRE DEL CLIENTE',1,0);
		$pdf->cell(50,5,'NOMBRE DEL EMPLEADO',1,0);
		$pdf->cell(50,5,'PRODUCTO',1,0);
		$pdf->cell(20,5,'CANTIDAD',1,0);
		$pdf->cell(20,5,'SUBTOTAL',1,0);
		$pdf->cell(20,5,'FECHA',1,0);
		$pdf->cell(15,5,'HORA',1,1);
		 
		foreach($res as $obj)
		{
			$pdf->cell(25,5,$obj->id_venta,1,0);
			$pdf->cell(50,5,$obj->cliente,1,0);
			$pdf->cell(50,5,$obj->empleado,1,0);
			$pdf->cell(50,5,$obj->nom_producto,1,0);
			$pdf->cell(20,5,$obj->cantidad,1,0);
			$pdf->cell(20,5,$obj->subtotal,1,0);
			$pdf->cell(20,5,$obj->fecha,1,0);
			$pdf->cell(15,5,$obj->hora_venta,1,1);
			
			
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_ventaultimasemana.pdf', 'I');  	
    }
}
?>