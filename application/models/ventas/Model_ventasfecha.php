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
            INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE MONTH(v.fecha) = MONTH(CURDATE()) AND v.estado ='Pagado';";
            $res = $this->db->query($sql);
            return $res->result();
        }
		
		
		
		
		
		
		
		
		
		
}
?>