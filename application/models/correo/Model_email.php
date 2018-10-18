<?php
	class Model_email extends CI_Model
	{
		/*----------------------------------------------------Función de consulta venta---------------------------------------------------------------*/
		public function ventas_dia ()
			{
				/*--------------------------------------------------Consulta de busqueda en la base de datos---------------------------------------------------------------*/
				$sql = "SELECT p.nom_producto, c.nom_cliente, e.nom_empleado, v.precio, v.cantidad_prod,
						v.cant_recibida, v.cambio, v.fecha, v.hora_venta, v.codigo_venta, v.subtotal, v.total
						FROM 
						ventas AS v, producto AS p, cliente AS c, empleado AS e 
						WHERE v.fecha=CURDATE() AND v.id_producto=p.id_producto AND v.id_cliente=c.id_cliente AND v.id_empleado=e.id_empleado;";
				$res = $this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
				return $res->result();
			}
		
	}
?>