<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reporte_PDF_proveedor extends CI_Controller
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
		$pdf->SetTitle('Reporte_PDF_proveedor');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	
		//Configurar fuente
		$pdf->SetFont('times', 'B', 10, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de todas las zonas que se encuentran disponibles en el .
		$this->load->model("proveedor/Model_proveedor");
		$res = $this->Model_proveedor->buscar_proveedor($id);
		$pdf->cell(10,5,'ID',1,0);
		$pdf->cell(45,5,'RFC EMPRESA',1,0);
		$pdf->cell(45,5,'NOM. EMPRESA',1,0);
		$pdf->cell(60,5,'DIRECCIÓN',1,0);
		$pdf->cell(60,5,'CORREO',1,0);
		$pdf->cell(25,5,'TELEFONO',1,0);
		$pdf->cell(15,5,'ACTIVO',1,1);
		
	
     
		foreach($res as $obj)
		{
			$pdf->cell(10,5,$obj->id_proveedor,1,0);
			$pdf->cell(45,5,$obj->rfc_proveedor,1,0);
			$pdf->cell(45,5,$obj->nom_empresa,1,0);
			$pdf->cell(60,5,$obj->direccion,1,0);
			$pdf->cell(60,5,$obj->correo,1,0);
			$pdf->cell(25,5,$obj->telefono,1,0);
			$pdf->cell(15,5,$obj->activo,1,1);
			
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_proveedor.pdf', 'I');  	
    }
}
?>