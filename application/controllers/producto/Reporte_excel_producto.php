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
        $this->excel->getActiveSheet()->setCellValue('A1', 'Un poco de texto');
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
    
        $this->excel->getActiveSheet()->mergeCells('A1:D1');

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(65);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        
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
        
		//Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A3", 'ID');
        $this->excel->getActiveSheet()->setCellValue("B3", 'NOMBRE DEL PRODUCTO');
        $this->excel->getActiveSheet()->setCellValue("C3", 'MARCA');
        $this->excel->getActiveSheet()->setCellValue("D3", 'CÓD. INT.');
        $this->excel->getActiveSheet()->setCellValue("E3", 'CÓD. SAT');
        $this->excel->getActiveSheet()->setCellValue("F3", 'CANTIDAD');
		$this->excel->getActiveSheet()->setCellValue("G3", 'DESCRIPCION');
		$this->excel->getActiveSheet()->setCellValue("H3", 'PRECIO POR PIEZA');
        $this->excel->getActiveSheet()->setCellValue("I3", 'PRECIO POR MENUDEO');
        $this->excel->getActiveSheet()->setCellValue("J3", 'PRECIO POR MAYOREO');
		
		//modelo reportes
		$this->load->model('producto/Model_producto');
		$res = $this->Model_producto->buscar_producto($id);
		$a = 2;
		foreach($res as $obj){
		
        $this->excel->getActiveSheet()->setCellValue("A".$a, $obj->id_producto);
        $this->excel->getActiveSheet()->setCellValue("B".$a, $obj->nom_producto);
        $this->excel->getActiveSheet()->setCellValue("C".$a, $obj->marca);
        $this->excel->getActiveSheet()->setCellValue("D".$a, $obj->codigo_int);
        $this->excel->getActiveSheet()->setCellValue("E".$a, $obj->codigo_sat);
        $this->excel->getActiveSheet()->setCellValue("F".$a, $obj->cantidad_prod);
		$this->excel->getActiveSheet()->setCellValue("G".$a, $obj->descripcion);
		$this->excel->getActiveSheet()->setCellValue("H".$a, $obj->precio_cu);
		$this->excel->getActiveSheet()->setCellValue("I".$a, $obj->precio_menudeo);
		$this->excel->getActiveSheet()->setCellValue("J".$a, $obj->precio_mayoreo);
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