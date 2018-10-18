<?php
class Model_caja extends CI_Model
{
	//Insertar venta
	public function insertar_caja($id_usuario,$id_empleado,$correo,$contra,$pass_usucaja,$activo)
		{
			//consulta para insertar venta
			$sql="insert into usuario_caja (id_usuario,id_empleado,correo,pass_usucaja,vpass_usucaja,activo)
			  values ('$id_usuario','$id_empleado','$correo','$contra','$pass_usucaja','$activo')";
			$this->db->query($sql);
		}
	//Buscar 
	public function buscar_contrasena($correo)
		{
			$this->db->where(['correo'=>$correo]);
			$res = $this->db->get('usuario_caja');
			$row = $res->result();
			return $row[0]->pass_usucaja;
		}
	//-----------------------------------------------------Busqueda cliente-------------------------------------------------
	public function buscar_cliente($ap_cliente)
		{
			$sql = "SELECT * FROM ventas AS v, cliente AS c WHERE c.`ap_cliente`='$ap_cliente' AND v.`id_cliente`=c.`id_cliente`;";
			$res = $this->db->query($sql);
			return $res->result();
		}
	//-----------------------------------------------------Busqueda venta-------------------------------------------------
	public function buscar_cliente1($am_cliente)
	{
		$sql = "SELECT * FROM ventas AS v, cliente AS c WHERE c.`ap_cliente`='$am_cliente' AND v.`id_cliente`=c.`id_cliente`;";
		$res = $this->db->query($sql);
		return $res->result();
	}
	//-----------------------------------------------------Busqueda para el módulo de caja-------------------------------------------------
	public function caja()
	{
		$sql = "SELECT v.id_venta, c.nom_cliente, c.ap_cliente, c.am_cliente, e.nom_empleado, e.ap_empleado, e.am_empleado,
				v.fecha, v.hora_venta, v.total
				FROM ventas AS v
				INNER JOIN cliente AS c ON c.id_cliente=v.id_cliente
				INNER JOIN empleado AS e ON e.id_empleado=v.id_empleado WHERE v.estado='pendiente' AND c.nom_cliente LIKE '%%';";
		$res = $this->db->query($sql);
		return $res->result();
	}
	//-----------------------------------------------------Busqueda a detalle para el módulo de caja-------------------------------------------------
	public function caja_detalle($id_venta)
	{
		$sql = "SELECT d.id_detalle, d.id_venta, p.nom_producto, d.cantidad, d.subtotal, v.total 
				FROM detalle_venta AS d
				INNER JOIN producto AS p ON p.id_producto=d.id_producto
				INNER JOIN ventas AS v ON v.id_venta=d.id_venta 
				WHERE v.estado='pendiente' AND d.id_venta='$id_venta';";
		$res = $this->db->query($sql);
		return $res->result();
	}

	public function insertar_cobro($id_venta,$recibido_venta,$cambio_venta)
	{
		$sql = "UPDATE ventas SET cant_recibida='$recibido_venta', cambio='$cambio_venta', estado='Pagado' WHERE id_venta='$id_venta';";
		$this->db->query($sql);
	}

	public function eliminar_venta($id_venta)
	{
		$sql = "DELETE FROM ventas WHERE id_venta='$id_venta';";
		$this->db->query($sql);
	}

	public function eliminar_detalleventa($id_detalle, $id_venta)
	{
		$sql = "CALL baja_detalle ('$id_venta','$id_detalle');";
		$this->db->query($sql);
	}
}
?>