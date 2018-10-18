<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Reporte_excel_empleado extends CI_Controller
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
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(23);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
        
        
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
        $this->excel->getActiveSheet()->getStyle("N1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("O1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("P1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("Q1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("R1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("S1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("T1")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("U1")->getFont()->setBold(true);
        
		//Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A1", 'RFC');
        $this->excel->getActiveSheet()->setCellValue("B1", 'CODIGO DE EMPLEADO');
        $this->excel->getActiveSheet()->setCellValue("C1", 'NOMBRE');
        $this->excel->getActiveSheet()->setCellValue("D1", 'A. PATERNO');
        $this->excel->getActiveSheet()->setCellValue("E1", 'A. MATERNO');
        $this->excel->getActiveSheet()->setCellValue("F1", 'CURP');
        $this->excel->getActiveSheet()->setCellValue("G1", 'FECHA DE NACIMIENTO');
        $this->excel->getActiveSheet()->setCellValue("H1", 'CALLE');
        $this->excel->getActiveSheet()->setCellValue("I1", 'NUM. CALLE');
		$this->excel->getActiveSheet()->setCellValue("J1", 'COLONIA');
		$this->excel->getActiveSheet()->setCellValue("K1", 'MUNICIPIO');
        $this->excel->getActiveSheet()->setCellValue("L1", 'CODIGO POSTAL');
        $this->excel->getActiveSheet()->setCellValue("M1", 'CORREO');
        $this->excel->getActiveSheet()->setCellValue("N1", 'TELEFONO');
        $this->excel->getActiveSheet()->setCellValue("O1", 'PUESTO');
        $this->excel->getActiveSheet()->setCellValue("P1", 'SEXO');
        $this->excel->getActiveSheet()->setCellValue("Q1", 'ACTIVO');
        $this->excel->getActiveSheet()->setCellValue("R1", 'NOMBRE DE USUARIO');
        $this->excel->getActiveSheet()->setCellValue("S1", 'PRIV. VENTA');
        $this->excel->getActiveSheet()->setCellValue("T1", 'PRIV. ALMACEN');
        $this->excel->getActiveSheet()->setCellValue("U1", 'PRIV. CAJA');
		
		//modelo reportes
		$this->load->model('empleado/Model_empleado');
		$res = $this->Model_empleado->buscar_empleado($id);
		$a = 2;
		foreach($res as $obj){
		
        $this->excel->getActiveSheet()->setCellValue("A".$a, $obj->rfc_empleado);
        $this->excel->getActiveSheet()->setCellValue("B".$a, $obj->codigo_empleado);
        $this->excel->getActiveSheet()->setCellValue("C".$a, $obj->nom_empleado);
        $this->excel->getActiveSheet()->setCellValue("D".$a, $obj->ap_empleado);
        $this->excel->getActiveSheet()->setCellValue("E".$a, $obj->am_empleado);
        $this->excel->getActiveSheet()->setCellValue("F".$a, $obj->curp_empleado);
        $this->excel->getActiveSheet()->setCellValue("G".$a, $obj->fecha_nacimiento);
        $this->excel->getActiveSheet()->setCellValue("H".$a, $obj->calle);
        $this->excel->getActiveSheet()->setCellValue("I".$a, $obj->numero_calle);
		$this->excel->getActiveSheet()->setCellValue("J".$a, $obj->colonia);
		$this->excel->getActiveSheet()->setCellValue("K".$a, $obj->municipio);
		$this->excel->getActiveSheet()->setCellValue("L".$a, $obj->cp);
		$this->excel->getActiveSheet()->setCellValue("M".$a, $obj->correo);
		$this->excel->getActiveSheet()->setCellValue("N".$a, $obj->telefono);
		$this->excel->getActiveSheet()->setCellValue("O".$a, $obj->tipo_empleado);
		$this->excel->getActiveSheet()->setCellValue("P".$a, $obj->sexo);
		$this->excel->getActiveSheet()->setCellValue("Q".$a, $obj->activo);
		$this->excel->getActiveSheet()->setCellValue("R".$a, $obj->nom_usuario);
		if($obj->privilegio_venta == 1)
		{
			$obj->privilegio_venta = "Si";
		}
		else
		{
			$obj->privilegio_venta = "No";
		}
		$this->excel->getActiveSheet()->setCellValue("S".$a, $obj->privilegio_venta);
		if($obj->privilegio_almacen == 1)
		{
			$obj->privilegio_almacen = "Si";
		}
		else
		{
			$obj->privilegio_almacen = "No";
		}
		$this->excel->getActiveSheet()->setCellValue("T".$a, $obj->privilegio_almacen);
		if($obj->privilegio_caja == 1)
		{
			$obj->privilegio_caja = "Si";
		}
		else
		{
			$obj->privilegio_caja = "No";
		}
		$this->excel->getActiveSheet()->setCellValue("U".$a, $obj->privilegio_caja);
        $a++;
		}
		    
		//Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Reporte_Empleado.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    }
}
?>