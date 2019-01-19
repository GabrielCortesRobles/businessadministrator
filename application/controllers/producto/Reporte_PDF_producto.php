<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reporte_PDF_producto extends CI_Controller
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
		$pdf->SetTitle('Reporte_PDF_producto');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	
		//Configurar fuente
		$pdf->SetFont('times', 'B', 7, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de todos los productos que se encuentran disponibles en el sisma.
		$this->load->model("producto/Model_producto");
		$res = $this->Model_producto->buscar_producto($id);
		//$this->Image('assets/images/Systelecom.png', 5, 5, 30 );
		$pdf->cell(250,15,'REPORTE PRODUCTOS',0,1,'C');
		$pdf->cell(50,10,'NOMBRE DE LA EMPRESA:',0,1);
		$pdf->cell(50,10,'RAZON SOCIAL DE LA EMPRESA:',0,1);
		$pdf->cell(30,5,'PRODUCTO',1,0);
		$pdf->cell(15,5,'MARCA',1,0);
		$pdf->cell(15,5,'CÓD INT.',1,0);
		$pdf->cell(15,5,'COÓD. SAT.',1,0);
		$pdf->cell(15,5,'CANT.',1,0);
		$pdf->cell(45,5,'DESCRIPCIÓN',1,0);
		$pdf->cell(20,5,'PRECIO PZA',1,0);
		$pdf->cell(16,5,'MEDIOMAY',1,0);
		$pdf->cell(16,5,'MAYOREO',1,0);
		$pdf->cell(20,5,'PIEZAS MM',1,0);
		$pdf->cell(20,5,'PIEZAS MA',1,0);
		$pdf->cell(15,5,'ACTIVO',1,1);
		
	
     
		foreach($res as $obj)
		{
			
			$pdf->cell(30,5,$obj->nom_producto,1,0);
			$pdf->cell(15,5,$obj->marca,1,0);
			$pdf->cell(15,5,$obj->codigo_int,1,0);
			$pdf->cell(15,5,$obj->codigo_sat,1,0);
			$pdf->cell(15,5,$obj->cantidad_prod,1,0);
			$pdf->cell(45,5,$obj->descripcion,1,0);
			$pdf->cell(20,5,$obj->precio_cu,1,0);
			$pdf->cell(16,5,$obj->precio_menudeo,1,0);
			$pdf->cell(16,5,$obj->precio_mayoreo,1,0);
			$pdf->cell(20,5,$obj->piezas_mayoreo,1,0);
			$pdf->cell(20,5,$obj->piezas_mayoreo,1,0);
			$pdf->cell(15,5,$obj->activo,1,1);
			
			//$pdf->cell(20,5,$obj->fecha,1,0);
			//$pdf->cell(20,5,$obj->hora,1,1);
	
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_producto.pdf', 'I');  	
    }
}
?>