<?php
class Model_ventasfecha extends CI_Model
{
		public function buscarventas($fecha1,$fecha2)
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE v.fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_venta";
            $res = $this->db->query($sql);
            return $res->result();
        }
		
		public function buscarventas1()
		{
			//Consulta para buscar provedor en la base de datos
			$sql ="SELECT nom_empresa, razon_social FROM empresas";	
			$query = $this->db->query($sql);
			return $query->result();
		}
		public function ventashoy()
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE v.fecha=CURDATE() AND v.estado ='Pagado';";
            $res = $this->db->query($sql);
            return $res->result();
        }
		
			public function ultimomes()
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE MONTH(fecha) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) AND v.estado ='Pagado' ORDER BY d.id_detalle ASC;";
            $res = $this->db->query($sql);
            return $res->result();
        }
		
				public function ultimoano()
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE YEAR(fecha) = YEAR(DATE_ADD(CURDATE(),INTERVAL -1 YEAR)) AND v.estado ='Pagado' ORDER BY d.id_detalle ASC;";
            $res = $this->db->query($sql);
            return $res->result();
        }
			
				public function ultimasemana()
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE YEARWEEK(fecha)= YEARWEEK(DATE_SUB(CURRENT_DATE(), INTERVAL 1 WEEK)) AND v.estado ='Pagado' ORDER BY d.id_detalle ASC;";
            $res = $this->db->query($sql);
            return $res->result();
        }
		
		public function ventaspendientes()
		{
			//consulta para insertar venta
			$sql="SELECT v.id_venta, CONCAT(c.nom_cliente,' ', c.ap_cliente,' ',c.am_cliente) AS cliente,
            CONCAT( e.nom_empleado,' ',e.ap_empleado,' ',e.am_empleado) AS empleado,
            p.nom_producto, d.cantidad, d.subtotal, v.estado, v.fecha, v.hora_venta 
            FROM detalle_venta AS d
            INNER JOIN producto AS p ON p.id_producto=d.id_producto
            INNER JOIN ventas AS v ON v.id_venta=d.id_venta
            INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE  v.estado ='Pendiente' ORDER BY d.id_detalle ASC;";
            $res = $this->db->query($sql);
            return $res->result();
        }
		public function eliminar_venta($id_venta)
		{
			$sql = "DELETE FROM detalle_venta WHERE id_venta='$id_venta';";
            $this->db->query($sql);
            $sql2 = "DELETE FROM ventas WHERE id_venta='$id_venta';";
		    $this->db->query($sql2);
        }
        
        //Funcion para cancelar la venta y restaurar las existencias
        public function cancelarventa($id_venta)
        {
            $res = $this->db->query("SELECT id_producto, cantidad FROM detalle_venta WHERE id_venta='$id_venta';");		
				$row = $res->result();
				$id_producto = $row[0]->id_producto;
            if($id_producto != "")
            {
				foreach($row as $filas)
				{
					$sql = "CALL cancelaventa('$filas->id_producto','$filas->cantidad');";
                    $this->db->query($sql);
                }
            }
        }

	public function eliminar_detalleventa($id_detalle, $id_venta)
	{
        $res = $this->db->query("SELECT id_producto, cantidad FROM detalle_venta WHERE id_detalle='$id_detalle';");		
        $row = $res->result();
        foreach($row as $filas)
				{
					$sql = "CALL cancelaventa('$filas->id_producto','$filas->cantidad');";
					$this->db->query($sql);	
                }
                
		$sql2 = "CALL baja_detalle ('$id_venta','$id_detalle');";
		$this->db->query($sql2);
	}
}
?>