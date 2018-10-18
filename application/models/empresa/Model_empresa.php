<?php
	class Model_empresa extends CI_Model
	{
	/*----------------------------------------------------Modificar empresa---------------------------------------------------------------*/
	public function modificar_empresa()
		{
			$id_empresa = 1;
			$sql="SELECT * FROM empresas  ";
			$query = $this->db->query($sql); 
			$this->db->where(['id_empresa'=>$id_empresa]);
			$result= $this->db->get('empresas');
			return $result->result();
		}
	/*----------------------------------------------------Actualizar datos---------------------------------------------------------------*/	
	public function actualizar_empresa($id_empresa,$datos)
		{
			$this->db->where(['id_empresa'=>$id_empresa]);
			$this->db->update('empresas',$datos);
		}
	}
?>