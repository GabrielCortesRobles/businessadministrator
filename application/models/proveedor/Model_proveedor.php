<?php
class Model_proveedor extends CI_Model
{
	//Insertar proveedor
	public function insertar_proveedor($rfc_proveedor,$nom_empresa,
	$direccion,$correo,$telefono,$activo)
		{
			//consulta para insertar proveedor
			$sql = "SELECT alta_proveedor('$rfc_proveedor','$nom_empresa','$direccion',
			'$correo','$telefono','$activo')";
			$query = $this->db->query($sql);
		}
	//Buscar proveedor
	public function buscar_proveedor($id)
		{
			//Consulta para buscar provedor en la base de datos
			$sql ="SELECT * FROM proveedor
			WHERE id_proveedor like '%$id%'or
			rfc_proveedor like '%$id%' or
			direccion like '%$id%' or
			correo like '%$id%' or
			telefono like '%$id%' or
			activo like '%$id%'";	
			$query = $this->db->query($sql);
			return $query->result();
		}
	//Eliminar proveedor
	public function eliminar_proveedor($id_proveedor)
		{
			//Consulta para eliminar proveedor en la base de datos  
			$sql = "DELETE FROM proveedor 
					WHERE id_proveedor=$id_proveedor";
			$this->db->query($sql);
		}
	//Modificar proveedor
	public function modificar_proveedor($id_proveedor)
		{
			$this->db->where(['id_proveedor'=>$id_proveedor]);
			$result= $this->db->get('proveedor');
			return $result->result();
		}
	//Actualizar proveedor
	public function actualizar_proveedor($id_proveedor,$rfc_proveedor,$nom_empresa,
	$direccion,$correo,$telefono,$activo)
		{
			//Cosulta para actualizar proveedor en la base de datos
			$sql = "UPDATE proveedor SET 
			nom_empresa='$nom_empresa',
			rfc_proveedor='$rfc_proveedor',
			direccion='$direccion',
			correo='$correo',
			telefono='$telefono',
			activo='$activo',
			ultima_modificacion= NOW()
			WHERE id_proveedor='$id_proveedor'";
			$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
}
?>