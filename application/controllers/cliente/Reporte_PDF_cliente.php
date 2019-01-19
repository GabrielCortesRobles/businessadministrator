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
		$pdf->SetFont('times', 'B', 7, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de todas las zonas que se encuentran disponibles en el .
		$this->load->model("cliente/Model_cliente");
		$res = $this->Model_cliente->buscar_cliente($id);
		$pdf->cell(250,15,'REPORTE DE LOS CLIENTES',0,1,'C');
		$pdf->cell(50,10,'NOMBRE DE LA EMPRESA:',0,1);
		$pdf->cell(50,15,'RAZON SOCIAL DE LA EMPRESA:',0,1);
		$pdf->cell(20,5,'ID_CLIENTE',1,0);
		$pdf->cell(25,5,'NOM. CLIENTE',1,0);
		$pdf->cell(20,5,'AP. CLIENTE',1,0);
		$pdf->cell(20,5,'AM. CLIENTE',1,0);
		$pdf->cell(25,5,'CALLE',1,0);
		$pdf->cell(25,5,'NUM. CALLE',1,0);
		$pdf->cell(30,5,'COLONIA',1,0);
		$pdf->cell(20,5,'MUNICIPIO',1,0);
		$pdf->cell(15,5,'CP',1,0);
		$pdf->cell(35,5,'CORREO',1,0);
		$pdf->cell(20,5,'TELEFONO',1,0);
		$pdf->cell(12,5,'SEXO',1,0);
		$pdf->cell(15,5,'ACTIVO',1,1);
		 
		foreach($res as $obj)
		{
			$pdf->cell(20,5,$obj->id_cliente,1,0);
			$pdf->cell(25,5,$obj->nom_cliente,1,0);
			$pdf->cell(20,5,$obj->ap_cliente,1,0);
			$pdf->cell(20,5,$obj->am_cliente,1,0);
			$pdf->cell(25,5,$obj->calle,1,0);
			$pdf->cell(25,5,$obj->numero_exterior,1,0);
			$pdf->cell(30,5,$obj->colonia,1,0);
			$pdf->cell(20,5,$obj->id_municipio,1,0);
			$pdf->cell(15,5,$obj->cp,1,0);
			$pdf->cell(35,5,$obj->correo,1,0);
			$pdf->cell(20,5,$obj->telefono,1,0);
			$pdf->cell(12,5,$obj->sexo,1,0);
			$pdf->cell(15,5,$obj->activo,1,1);
			
			
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_cliente.pdf', 'I');  	
    }
}
?>