<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Reporte_excel_producto extends CI_Controller
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
        
		//Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A1", 'NOMBRE DEL PRODUCTO');
        $this->excel->getActiveSheet()->setCellValue("B1", 'MARCA');
        $this->excel->getActiveSheet()->setCellValue("C1", 'SERIE');
        $this->excel->getActiveSheet()->setCellValue("D1", 'CODIGO');
        $this->excel->getActiveSheet()->setCellValue("E1", 'CANTIDAD');
		$this->excel->getActiveSheet()->setCellValue("F1", 'DESCRIPCION');
		$this->excel->getActiveSheet()->setCellValue("G1", 'PRECIO POR PIEZA');
        $this->excel->getActiveSheet()->setCellValue("H1", 'PRECIO POR MENUDEO');
        $this->excel->getActiveSheet()->setCellValue("I1", 'PRECIO POR MAYOREO');
		
		//modelo reportes
		$this->load->model('producto/Model_producto');
		$res = $this->Model_producto->buscar_producto($id);
		$a = 2;
		foreach($res as $obj){
		
        $this->excel->getActiveSheet()->setCellValue("A".$a, $obj->nom_producto);
        $this->excel->getActiveSheet()->setCellValue("B".$a, $obj->marca);
        $this->excel->getActiveSheet()->setCellValue("C".$a, $obj->codigo_int);
        $this->excel->getActiveSheet()->setCellValue("D".$a, $obj->codigo_sat);
        $this->excel->getActiveSheet()->setCellValue("E".$a, $obj->cantidad_prod);
		$this->excel->getActiveSheet()->setCellValue("F".$a, $obj->descripcion);
		$this->excel->getActiveSheet()->setCellValue("G".$a, $obj->precio_cu);
		$this->excel->getActiveSheet()->setCellValue("H".$a, $obj->precio_menudeo);
		$this->excel->getActiveSheet()->setCellValue("I".$a, $obj->precio_mayoreo);
        $a++;
		}
		    
		//Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Reporte_Producto.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    }
}
?>