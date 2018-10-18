<?php
	class Model_tiket extends CI_Model{
		public function buscar_tiket($id)
			{
				$sql ="SELECT * FROM empresas AS e , ventas AS v
				WHERE e.id_empresa like '%$id%'or
				e.rfc_empresa like '%$id%' or 
				e.razon_social like '%$id%' or 
				e.calle like '%$id%' or 
				e.numero like '%$id%' or 
				e.colonia like '%$id%' or 
				e.municipio like '%$id%' or 
				e.codigo_postal like '%$id%' or 
				e.telefono like '%$id%' or
				e.correo like '%$id%' or 
				e.regimen_fiscal like '%$id%' or
				v.codigo_venta like '%$id%' or
				v.nom_empleado like '%$id%' or 
				v.ap_empleado like'%$id%' or
				v.am_empleado like '%$id%' or
				v.nom_cliente like '%$id%' or 
				v.ap_cliente like'%$id%' or
				v.am_cliente like '%$id%'";	
				$query = $this->db->query($sql);
				return $query->result();
			}	
				
	}
?>