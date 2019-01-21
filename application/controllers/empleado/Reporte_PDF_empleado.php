<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reporte_PDF_empleado extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
    }
	
	 public function ExportarPDF($id) 
	{ 
		$pdf = new TCPDF('L','mm','A2');    
  
		//Información del Documento
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('systelecoms');
		$pdf->SetTitle('Reporte_PDF_empleado');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	
		//Configurar fuente
		$pdf->SetFont('times', 'B', 30, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de los empleados.
		$this->load->model("empleado/Model_empleado");
		$res = $this->Model_empleado->buscar_empleado($id);
		$res2 = $this->Model_empleado->buscar_empleado1();
		$pdf->Image('assets/images/Systelecom.png', '', '', 80, 40, '', '', '', false, 400, '', false, false, 1, false, false, false);
		$pdf->cell(550,15,'REPORTE EMPLEADOS',0,1,'C');
		$pdf->SetFont('times', 'B', 20, 'L', true);   
		
		foreach($res2 as $obj)
		 {
			$pdf->cell(250,30,'',0,1,'C');
			$pdf->cell(100,15,'NOMBRE DE LA EMPRESA:',0,0);
			$pdf->cell(50,15,$obj->nom_empresa,0,1);
			$pdf->cell(100,30,'RAZON SOCIAL DE LA EMP:',0,0);
			$pdf->cell(50,30,$obj->razon_social,0,1);
		 }		
		$pdf->SetFont('times', 'B', 15, 'L', true); 
		$pdf->cell(65,5,'RFC',1,0);
		$pdf->cell(26,5,'No.Emp.',1,0);
		$pdf->cell(90,5,'NOMBRE DEL EMPLEADO',1,0);
		$pdf->cell(65,5,'CURP',1,0);
		$pdf->cell(100,5,'DIRECCION',1,0); 
		$pdf->cell(25,5,'C.P.',1,0);
		$pdf->cell(80,5,'CORREO',1,0);
		$pdf->cell(35,5,'TELEFONO',1,0);
		$pdf->cell(28,5,'PUESTO',1,0);		
		$pdf->cell(20,5,'PVEN.',1,0);
		$pdf->cell(23,5,'PALMA.',1,0);
		$pdf->cell(20,5,'PCAJA',1,1);
		
	
     
		foreach($res as $obj) 
		{
			$pdf->cell(65,5,$obj->rfc_empleado,1,0);
			$pdf->cell(26,5,$obj->id_empleado,1,0);
			$pdf->cell(90,5,$obj->nom_empleado. $obj->ap_empleado. $obj->am_empleado,1,0);
			$pdf->cell(65,5,$obj->curp_empleado,1,0);
			$pdf->cell(100,5,$obj->calle.$obj->numero_exterior.$obj->colonia,1,0);
			$pdf->cell(25,5,$obj->cp,1,0);
			$pdf->cell(80,5,$obj->correo,1,0);
			$pdf->cell(35,5,$obj->telefono,1,0);
			$pdf->cell(28,5,$obj->id_tipoempleado,1,0);
			$pdf->cell(20,5,$obj->privilegio_venta,1,0);
			$pdf->cell(23,5,$obj->privilegio_almacen,1,0);
			$pdf->cell(20,5,$obj->privilegio_caja,1,1);
			
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_empleado.pdf', 'I');  	
    }
}
?>