<?php
class Model_cliente extends CI_Model
{
	/*----------------------------------------------------Insertar cliente---------------------------------------------------------------*/
	public function insertar_cliente($rfc_cliente,
									$nom_cliente,
									$ap_cliente,
									$am_cliente,
									$curp_cliente,
									$fecha_nacimiento,
									$calle,
									$numero_interior,
									$numero_exterior,
									$colonia,
									$municipio,
									$cp,
									$correo,
									$telefono,
									$sexo,
									$activo)
		{
			/*----------------------------------------------------Insertar cliente en la base de datos---------------------------------------------------------------*/
			$sql = "insert into cliente (rfc_cliente,nom_cliente,ap_cliente,am_cliente,curp_cliente,fecha_nacimiento,calle,numero_interior,numero_exterior,colonia,
			municipio,cp,correo,telefono,sexo,activo,fecha_creacion)
			values ('$rfc_cliente','$nom_cliente','$ap_cliente','$am_cliente','$curp_cliente','$fecha_nacimiento','$calle','$numero_interior','$numero_exterior',
			'$colonia','$municipio','$cp','$correo','$telefono','$sexo','$activo',NOW())";
			$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
	/*----------------------------------------------------Busqueda cliente--------------------------------------------------------------*/
	public function buscar_cliente($id)
		{
			$sql ="SELECT * FROM cliente
			WHERE id_cliente like '%$id%'or
			rfc_cliente like '%$id%' or 
			nom_cliente like '%$id%' or 
			ap_cliente like '%$id%' or 
			am_cliente like '%$id%' or 
			curp_cliente like '%$id%' or 
			fecha_nacimiento like '%$id%' or 
			calle like '%$id%' or
			colonia like '%$id%' or 
			municipio like '%$id%' or 
			cp like '%$id%' or
			correo like '%$id%' or 
			telefono like '%$id%' or
			sexo like '%id%' or 
			activo like '%id%'";	
			$query = $this->db->query($sql);
			return $query->result();
		}
	/*----------------------------------------------------Eliminar cliente---------------------------------------------------------------*/
	public function eliminar_cliente($id_cliente)
		{
			/*------------------------------------------consulta para eliminar cliente en la base de datos-------------------------------*/
			$sql = "DELETE FROM cliente 
					WHERE id_cliente=$id_cliente";
			$this->db->query($sql);
		}
	/*----------------------------------------------------Modificar cliente-------------------------------------------------------------*/
	public function modificar_cliente($id_cliente)
		{
			$this->db->where(['id_cliente'=>$id_cliente]);
			$result= $this->db->get('cliente');
			return $result->result();
		}
	/*----------------------------------------------------Acualizar cliente---------------------------------------------------------------*/
	public function actualizar_cliente($id_cliente,$rfc_cliente,$nom_cliente,$ap_cliente,$am_cliente,$curp_cliente,$fecha_nacimiento,$calle,$numero_interior,$numero_exterior,$colonia,
		$municipio,$cp,$correo,$telefono,$sexo,$activo)
		{
			/*----------------------------------------------------Consulta para actualizar el cliente---------------------------------------------------------------*/
			$sql = "UPDATE cliente SET 
			nom_cliente='$nom_cliente',
			ap_cliente='$ap_cliente',
			am_cliente='$am_cliente',
			curp_cliente='$curp_cliente',
			rfc_cliente='$rfc_cliente',
			fecha_nacimiento='$fecha_nacimiento',
			calle='$calle',
			numero_interior='$numero_interior',
			numero_exterior='$numero_exterior',
			colonia='$colonia',
			municipio='$municipio',
			cp='$cp',
			correo='$correo',
			telefono='$telefono',
			sexo='$sexo',
			activo='$activo',
			ultima_modificacion= NOW()
			WHERE id_cliente='$id_cliente'";
			$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
}
?>