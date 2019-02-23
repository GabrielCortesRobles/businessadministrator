<?php
class Model_producto extends CI_Model
{
	//Insertar prodcuto
	public function insertar_producto($nom_producto,$marca,$id_proveedor,$codigo_int,$codigo_sat,$cantidad_prod,$descripcion,$precio_adquisicion,$precio_cu,$precio_menudeo,
	$precio_mayoreo, $piezas_mediomayoreo, $piezas_mayoreo,$activo)
		{
			//consulta para insertar producto en la base de datos
			$sql = "insert into producto (nom_producto,marca,id_proveedor,codigo_int,codigo_sat,cantidad_prod,descripcion,precio_adquisicion,precio_cu,precio_menudeo,precio_mayoreo ,piezas_mediomayoreo, piezas_mayoreo,fecha_creacion,ultima_modificacion,activo)
			values ('$nom_producto','$marca','$id_proveedor','$codigo_int','$codigo_sat','$cantidad_prod','$descripcion','$precio_adquisicion','$precio_cu','$precio_menudeo','$precio_mayoreo', '$piezas_mediomayoreo', '$piezas_mayoreo',CURDATE(),CURDATE(),'$activo')";
			$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
	//Buscar producto
	public function buscar_producto($id)
	{
		//Consulta de busqueda del producto en la base de datos
		$sql ="SELECT * FROM producto as p
		LEFT JOIN proveedor AS pro ON 
			p.id_proveedor=pro.id_proveedor
		WHERE id_producto like '%$id%' OR
		p.nom_producto like '%$id%' OR 
		p.id_proveedor like '%$id%' OR 
		p.marca like '%$id%' OR
		p.codigo_int like '%$id%' OR 
		p.codigo_sat like '%$id%' OR 
		p.cantidad_prod like '%$id%' OR 
		p.descripcion like '%$id%' OR
		p.precio_cu like '%$id%' OR
		p.precio_menudeo like '%$id%' OR
		p.precio_mayoreo like '%$id%' OR
		p.piezas_mediomayoreo like '%$id%' OR 
		p.piezas_mayoreo like '%$id%';";	
		$query = $this->db->query($sql);
		return $query->result();
	}
	//Eliminar producto
	public function eliminar_producto($id_producto)
		{
			//consulta para eliminar producto en base de datos
			$sql = "DELETE FROM producto 
					WHERE id_producto=$id_producto";
			$this->db->query($sql);
		}
	//Modificar producto
	public function modificar_producto($id_producto)
		{
			//Consultar producto en la base de datos
			$sql = "SELECT prod.id_producto,prod.nom_producto,prod.marca,prod.id_proveedor,
					prov.nom_empresa,prod.codigo_int,prod.codigo_sat,prod.cantidad_prod,
					prod.descripcion,prod.precio_cu,prod.precio_menudeo,prod.precio_mayoreo,
					prod.activo,prod.piezas_mediomayoreo,prod.piezas_mayoreo
					FROM producto AS prod, proveedor AS prov 
					WHERE id_producto='$id_producto' AND prod.id_proveedor=prov.id_proveedor;";
				$result = $this->db->query($sql);
			return $result->result();
		}
	//Actualizar producto
	public function actualizar_producto($id_producto,$datos)
		{
			$this->db->where(['id_producto'=>$id_producto]);
			$this->db->update('producto',$datos);
		}
		public function buscar_producto1()
	{
		//Consulta de busqueda del producto en la base de datos
		$sql ="SELECT * FROM empresas";	
		$query = $this->db->query($sql);
		return $query->result();
	}
		
}
?>