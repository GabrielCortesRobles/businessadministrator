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
		$pdf->SetFont('times', 'B', 10, 'L', true);   
	
		//Agregar página
		$pdf->AddPage(); 
	
		//Imprimir texto

		//Reportes de los empleados.
		$this->load->model("empleado/Model_empleado");
		$res = $this->Model_empleado->buscar_empleado($id);
		$pdf->cell(50,15,'REPORTE EMPLEADO',2,1);
		$pdf->cell(45,5,'RFC',1,0);
		$pdf->cell(23,5,'COD. EMP.',1,0);
		$pdf->cell(28,5,'NOMBRE',1,0);
		$pdf->cell(28,5,'A. PATERNO',1,0);
		$pdf->cell(28,5,'A. MATERNO',1,0);
		$pdf->cell(45,5,'CURP',1,0);
		$pdf->cell(25,5,'CALLE',1,0);
		$pdf->cell(15,5,'NUM.',1,0);
		$pdf->cell(35,5,'COLONIA',1,0);
		$pdf->cell(35,5,'MUNICIPIO',1,0);
		$pdf->cell(15,5,'C.P.',1,0);
		$pdf->cell(50,5,'CORREO',1,0);
		$pdf->cell(25,5,'TELEFONO',1,0);
		$pdf->cell(18,5,'PUESTO',1,0);
		$pdf->cell(15,5,'ACTVO',1,0);
		$pdf->cell(35,5,'USUARIO',1,0);
		$pdf->cell(20,5,'PJ VENTA',1,0);
		$pdf->cell(20,5,'PJ ALMACEN',1,0);
		$pdf->cell(20,5,'PJ CAJA',1,0);
		$pdf->cell(20,5,'FECHA',1,0);
		$pdf->cell(20,5,'HORA',1,1);
	
     
		foreach($res as $obj)
		{
			$pdf->cell(45,5,$obj->rfc_empleado,1,0);
			$pdf->cell(23,5,$obj->codigo_empleado,1,0);
			$pdf->cell(28,5,$obj->nom_empleado,1,0);
			$pdf->cell(28,5,$obj->ap_empleado,1,0);
			$pdf->cell(28,5,$obj->am_empleado,1,0);
			$pdf->cell(45,5,$obj->curp_empleado,1,0);
			$pdf->cell(25,5,$obj->calle,1,0);
			$pdf->cell(15,5,$obj->numero_calle,1,0);
			$pdf->cell(35,5,$obj->colonia,1,0);
			$pdf->cell(35,5,$obj->municipio,1,0);
			$pdf->cell(15,5,$obj->cp,1,0);
			$pdf->cell(50,5,$obj->correo,1,0);
			$pdf->cell(25,5,$obj->telefono,1,0);
			$pdf->cell(18,5,$obj->id_tipoempleado,1,0);
			$pdf->cell(15,5,$obj->activo,1,0);
			$pdf->cell(35,5,$obj->nom_usuario,1,0);
			$pdf->cell(20,5,$obj->privilegio_venta,1,0);
			$pdf->cell(20,5,$obj->privilegio_almacen,1,0);
			$pdf->cell(20,5,$obj->privilegio_caja,1,0);
			$pdf->cell(20,5,$obj->fecha,1,0);
			$pdf->cell(20,5,$obj->hora,1,1);
				
			//$pdf -> Cell(40,5,$obj->Imagen,1,1);
		}
	
		ob_end_clean();
		$pdf -> Output('Reporte_PDF_empleado.pdf', 'I');  	
    }
}
?>