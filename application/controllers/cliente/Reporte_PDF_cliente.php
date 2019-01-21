<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reporte_PDF_cliente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
    }
	
	 public function ExportarPDF($id) 
	{ 
		$pdf = new TCPDF('L','mm','A4');    
  
		//Información del Documento
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('systelecoms');
		$pdf->SetTitle('Reporte_PDF_cliente');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	
		//Configurar fuente
		$pdf->SetFont('times', 'B', 20, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de todas las zonas que se encuentran disponibles en el .
		$this->load->model("cliente/Model_cliente");
		$res = $this->Model_cliente->buscar_cliente($id);
		$res2 = $this->Model_cliente->buscar_cliente1();
		$pdf->Image('assets/images/Systelecom.png', '', '', 50, 25, '', '', '', false, 250, '', false, false, 1, false, false, false);
		$pdf->cell(250,15,'REPORTE CLIENTES',0,1,'C');
		$pdf->SetFont('times', 'B', 12, 'L', true);   
	
		 foreach($res2 as $obj)
		 {
			$pdf->cell(250,15,'',0,1,'C');
			$pdf->cell(60,10,'NOMBRE DE LA EMPRESA: ',0,0);
			$pdf->cell(50,10,$obj->nom_empresa,0,1);
			$pdf->cell(60,15,'RAZON SOCIAL DE LA EMP: ',0,0);
			$pdf->cell(50,15,$obj->razon_social,0,1);
		 } 
		
		$pdf->SetFont('times', 'B', 9, 'L', true);   
	
		$pdf->cell(25,5,'ID_CLIENTE',1,0);
		$pdf->cell(60,5,'NOMBRE DEL CLIENTE',1,0);
		$pdf->cell(60,5,'DIRECCIÓN',1,0);
		$pdf->cell(25,5,'CÓD.POST.',1,0);
		$pdf->cell(50,5,'CORREO',1,0);
		$pdf->cell(20,5,'TELEFONO',1,0);
		$pdf->cell(15,5,'ACTIVO',1,1);
		 
		foreach($res as $obj)
		{
			$pdf->cell(25,5,$obj->id_cliente,1,0);
			$pdf->cell(60,5,$obj->nom_cliente.'  '.$obj->ap_cliente.'  '.$obj->am_cliente,1,0);
			$pdf->cell(60,5,$obj->calle.' ,'.$obj->numero_exterior.' ,'.$obj->colonia,1,0);
			$pdf->cell(25,5,$obj->cp,1,0);
			$pdf->cell(50,5,$obj->correo,1,0);
			$pdf->cell(20,5,$obj->telefono,1,0);
			$pdf->cell(15,5,$obj->activo,1,1);
			
			
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_cliente.pdf', 'I');  	
    }
}
?>