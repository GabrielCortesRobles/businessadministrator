<?php
class Model_empleado extends CI_Model
{
	/*----------------------------------------------------Insertar empleado---------------------------------------------------------------*/
	public function insertar_empleado($nom_empleado,$ap_empleado,$am_empleado,$calle,$numero_interior,$numero_exterior,
									$colonia,$municipio,$cp,$correo,$telefono,$id_tipoempleado,$sexo,$activo,
									$curp_empleado,$rfc_empleado,$fecha_nacimiento,
									$contrasena,$privilegio_venta,$privilegio_almacen,$privilegio_caja)
		{
		/*----------------------------------------------------Encriptar la contraseña---------------------------------------------------------------*/
		$contra = sha1($contrasena);
		/*----------------------------------------------------Consulta para insertar empleado en la base de datos---------------------------------------------------------------*/
		$sql = "insert into empleado 
		(nom_empleado,ap_empleado,am_empleado,curp_empleado,rfc_empleado,fecha_nacimiento,calle,numero_interior,numero_exterior,
		colonia,id_municipio,cp,correo,telefono,id_tipoempleado,sexo,activo,contrasena,privilegio_venta,privilegio_almacen,privilegio_caja,privilegio_admin,fecha_creacion)
		values 
		('$nom_empleado','$ap_empleado','$am_empleado','$curp_empleado','$rfc_empleado','$fecha_nacimiento','$calle',
		'$numero_interior','$numero_exterior','$colonia','$id_municipio','$cp','$correo','$telefono','$id_tipoempleado','$sexo','$activo','$contra',
		'$privilegio_venta','$privilegio_almacen','$privilegio_caja','0',NOW())";
		$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
	/*----------------------------------------------------Busqueda empleado---------------------------------------------------------------*/
	public function buscar_empleado($id)
		{
			$sql ="SELECT * FROM empleado AS emp
			LEFT JOIN tipo_empleado AS tip ON
			 emp.id_tipoempleado=tip.id_tipoempleado
			WHERE emp.id_empleado LIKE '%$id%'OR
			emp.rfc_empleado LIKE '%$id%' OR 
			emp.nom_empleado LIKE '%$id%' OR 
			emp.ap_empleado LIKE '%$id%' OR 
			emp.am_empleado LIKE '%$id%' OR
			emp.curp_empleado LIKE '%$id%' OR 
			emp.calle LIKE '%$id%' OR
			emp.numero_interior LIKE '%$id%' OR
			emp.colonia LIKE '%$id%' OR
			emp.id_municipio LIKE '%$id%' OR
			emp.cp LIKE '%$id%' OR
			emp.correo LIKE '%$id%' OR
			emp.telefono LIKE '%$id%' OR
			emp.id_tipoempleado LIKE '%$id%' OR
			emp.sexo LIKE '%$id%' OR
			emp.activo LIKE '%$id%';";	
			$query = $this->db->query($sql);
			return $query->result();
		}
	/*----------------------------------------------------Eliminación empleado---------------------------------------------------------------*/	
	public function eliminar_empleado($id_empleado)
		{
			/*---------------------------------------------------Consulta para eliminar empleado en la base de datos------------------------------------------------*/
			$sql = "DELETE FROM empleado 
					WHERE id_empleado=$id_empleado";
			$this->db->query($sql);
		}	
	/*----------------------------------------------------Modificar empleado---------------------------------------------------------------*/	
	public function modificar_empleado($id_empleado)
		{
		/*----------------------------------------------------Consulta de empleado---------------------------------------------------------------*/
			$sql = "SELECT e.id_empleado,e.rfc_empleado,e.nom_empleado,
					e.ap_empleado,e.am_empleado,e.curp_empleado,e.fecha_nacimiento,
					e.calle,e.numero_interior,e.numero_exterior,e.colonia,e.id_municipio,e.cp,e.correo,
					e.telefono,e.id_tipoempleado,t.tipo_empleado,e.sexo,e.activo,
					e.contrasena
					FROM empleado AS e, tipo_empleado AS t 
					WHERE e.id_empleado='$id_empleado' AND e.id_tipoempleado=t.id_tipoempleado;";
			$result= $this->db->query($sql);
			return $result->result();
		}
	/*----------------------------------------------------Actualizar empleado---------------------------------------------------------------*/
	public function actualizar_empleado($id_empleado,$nom_empleado,$ap_empleado,$am_empleado,$calle,$numero_interior,
												$numero_exterior,$colonia,$municipio,$cp,$correo,$telefono,$id_tipoempleado,$sexo,
												$activo,$curp_empleado,$rfc_empleado,$fecha_nacimiento,
												$contrasena,$privilegio_venta,
												$privilegio_almacen,$privilegio_caja)
	{
		/*---------------------------------------------------Encriptar contraseña---------------------------------------------------------------*/
		$contra = sha1($contrasena);
		/*-----------------------------------------------Consulta para actualizar empleado en la base de datos---------------------------------------------------------------*/
		$sql = "UPDATE empleado SET 
		nom_empleado='$nom_empleado',
		ap_empleado='$ap_empleado',
		am_empleado='$am_empleado',
		curp_empleado='$curp_empleado',
		rfc_empleado='$rfc_empleado',
		fecha_nacimiento='$fecha_nacimiento',
		calle='$calle',
		numero_interior='$numero_interior',
		numero_exterior='$numero_exterior',
		colonia='$colonia',
		municipio='$municipio',
		cp='$cp',
		correo='$correo',
		telefono='$telefono',
		id_tipoempleado='$id_tipoempleado',
		sexo='$sexo',
		activo='$activo',
		contrasena='$contra',
		privilegio_venta='$privilegio_venta',
		privilegio_almacen='$privilegio_almacen',
		privilegio_caja='$privilegio_caja',
		privilegio_admin='0',
		ultima_modificacion= NOW()
		WHERE id_empleado='$id_empleado'";
		$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
	}
	
	public function buscar_empleado1()
		{
			//Consulta para buscar provedor en la base de datos
			$sql ="SELECT nom_empresa, razon_social FROM empresas";	
			$query = $this->db->query($sql);
			return $query->result();
		}
	
}
?>