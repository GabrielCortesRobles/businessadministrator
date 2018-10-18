<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Reporte_excel_proveedor extends CI_Controller
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
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        
        
		//Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
        ;
        
		//Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A1", 'ID');
        $this->excel->getActiveSheet()->setCellValue("B1", 'RFC');
        $this->excel->getActiveSheet()->setCellValue("C1", 'NOM. EMPRESA');
        $this->excel->getActiveSheet()->setCellValue("D1", 'DIRECCIÓN');
        $this->excel->getActiveSheet()->setCellValue("E1", 'CORREO');
        $this->excel->getActiveSheet()->setCellValue("F1", 'TELEFONO');
		$this->excel->getActiveSheet()->setCellValue("G1", 'ACTIVO');
        
		
		//modelo reportes
		$this->load->model('proveedor/Model_proveedor');
		$res = $this->Model_proveedor->buscar_proveedor($id);
		$a = 2;
		foreach($res as $obj){
		
		//$this->excel->getActiveSheet()->setCellValue("A".$a, $obj->idUsuario);	
        $this->excel->getActiveSheet()->setCellValue("A".$a, $obj->id_proveedor);
        $this->excel->getActiveSheet()->setCellValue("B".$a, $obj->rfc_proveedor);
        $this->excel->getActiveSheet()->setCellValue("C".$a, $obj->nom_empresa);
        $this->excel->getActiveSheet()->setCellValue("D".$a, $obj->direccion);
        $this->excel->getActiveSheet()->setCellValue("E".$a, $obj->correo);
		$this->excel->getActiveSheet()->setCellValue("F".$a, $obj->telefono);
		$this->excel->getActiveSheet()->setCellValue("G".$a, $obj->activo);
        $a++;
		}
		    
		//Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Reporte_Proveedor.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    }
}
?>