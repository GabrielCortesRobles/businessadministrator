<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Reporte_excel_cliente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Excel');
    }	
	
	public function ExportarExcel($id)
	{		
		//Cargamos la librería de excel.
        $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Datos');
        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        //$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        
        
		//Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("H1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("I1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("J1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("K1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("L1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("M1")->getFont()->setBold(true);
        ;
        
		//Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A1", 'ID CLIENTE');
        $this->excel->getActiveSheet()->setCellValue("B1", 'NOM. CLIENTE');
        $this->excel->getActiveSheet()->setCellValue("C1", 'AP. PATERNO');
        $this->excel->getActiveSheet()->setCellValue("D1", 'AP. MATERNO');
        $this->excel->getActiveSheet()->setCellValue("E1", 'CALLE.');
		$this->excel->getActiveSheet()->setCellValue("F1", 'NUM. CALLE');
		$this->excel->getActiveSheet()->setCellValue("G1", 'COLONIA');
		$this->excel->getActiveSheet()->setCellValue("H1", 'MUNICIPIO');
		$this->excel->getActiveSheet()->setCellValue("I1", 'CP');
		$this->excel->getActiveSheet()->setCellValue("J1", 'CORREO');
		$this->excel->getActiveSheet()->setCellValue("K1", 'TELEFONO');
		$this->excel->getActiveSheet()->setCellValue("L1", 'SEXO');
		$this->excel->getActiveSheet()->setCellValue("M1", 'ACTIVO');
        
		
		//modelo reportes
		$this->load->model('cliente/Model_cliente');
		$res = $this->Model_cliente->buscar_cliente($id);
		$a = 2;
		foreach($res as $obj){
		
		//$this->excel->getActiveSheet()->setCellValue("A".$a, $obj->idUsuario);	
        $this->excel->getActiveSheet()->setCellValue("A".$a, $obj->id_cliente);
        $this->excel->getActiveSheet()->setCellValue("B".$a, $obj->nom_cliente);
        $this->excel->getActiveSheet()->setCellValue("C".$a, $obj->ap_cliente);
        $this->excel->getActiveSheet()->setCellValue("D".$a, $obj->am_cliente);
        $this->excel->getActiveSheet()->setCellValue("E".$a, $obj->calle);
		$this->excel->getActiveSheet()->setCellValue("F".$a, $obj->num_calle);
		$this->excel->getActiveSheet()->setCellValue("G".$a, $obj->colonia);
		$this->excel->getActiveSheet()->setCellValue("H".$a, $obj->municipio);
		$this->excel->getActiveSheet()->setCellValue("I".$a, $obj->cp);
		$this->excel->getActiveSheet()->setCellValue("J".$a, $obj->correo);
		$this->excel->getActiveSheet()->setCellValue("K".$a, $obj->telefono);
		$this->excel->getActiveSheet()->setCellValue("L".$a, $obj->sexo);
		$this->excel->getActiveSheet()->setCellValue("M".$a, $obj->activo);
        $a++;
		}
		    
		//Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Reporte_cliente.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    }
}
?>