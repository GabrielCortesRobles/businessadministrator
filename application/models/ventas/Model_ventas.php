<?php
class Model_ventas extends CI_Model
{
	//-----------------------------Buscar producto por el codigo interno----------------------------------------------------
		public function buscar_producto($cod_int)
		{
		$sql = "SELECT * FROM producto WHERE codigo_int LIKE '%$cod_int%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
	//-----------------------------Buscar producto por nombre del producto---------------------------------------
		public function buscar_producto1($nom_producto)
		{
		$sql = "SELECT * FROM producto WHERE nom_producto LIKE '%$nom_producto%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
	//-----------------------------Buscar empleado por el codigo----------------------------------------------------
		public function buscar_empleado($codigo_empleado)
		{
		$sql = "SELECT * FROM empleado WHERE codigo_empleado LIKE '%$codigo_empleado%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
		//-----------------------------Buscar empleado por nombre del empleado-----------------------------------
		public function buscar_empleado1($nom_empleado)
		{
		$sql = "SELECT * FROM empleado WHERE nom_empleado LIKE '%$nom_empleado%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
		//-----------------------------Buscar empleado por apellido paterno del empleado-------------------------
		public function buscar_empleado2($ap_empleado)
		{
		$sql = "SELECT * FROM empleado WHERE ap_empleado LIKE '%$ap_empleado%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
		//-----------------------------Buscar cliente por el apellido del materno------------------------------
		public function buscar_cliente($am_cliente)
		{
		$sql = "SELECT * FROM cliente WHERE am_cliente LIKE '%$am_cliente%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
		//-----------------------------Buscar empleado por nombre del cliente-----------------------------------
		public function buscar_cliente1($nom_cliente)
		{
		$sql = "SELECT * FROM cliente WHERE nom_cliente LIKE '%$nom_cliente%';";
		$res = $this->db->query($sql);
		return $res->result();
		}
		//-----------------------------Buscar empleado por apellido paterno del cliente------------------------
		public function buscar_cliente2($ap_cliente)
		{
		$sql = "SELECT * FROM cliente WHERE ap_cliente LIKE '%$ap_cliente%';";
		$res = $this->db->query($sql);
		return $res->result();
		}	
		//--------------------------------Buscar precio por cada uno ---------------------------------------------------------
		public function buscar_precio($id_producto){
			$sql = "SELECT precio_cu FROM producto WHERE id_producto = '$id_producto';";
			$res = $this->db->query($sql);
			return $res->result();
		}
		//--------------------------------Buscar precio por cada uno ---------------------------------------------------------
		public function buscar_precio1($id_producto){
			$sql = "SELECT precio_menudeo FROM producto WHERE id_producto = '$id_producto';";
			$res = $this->db->query($sql);
			return $res->result();
		}
		//--------------------------------Buscar precio por cada uno ---------------------------------------------------------
		public function buscar_precio2($id_producto){
			$sql = "SELECT precio_mayoreo FROM producto WHERE id_producto = '$id_producto';";
			$res = $this->db->query($sql);
			return $res->result();
		}
		//--------------------------------Insertar venta---------------------------------------------------------	
		public function insertar_venta($id_cliente,$id_empleado,$total,$recibido_venta,$cambio_venta,$estado)
		{
			$sql = "insert into ventas (id_cliente,id_empleado,estado,total,cant_recibida,cambio,fecha,hora_venta)
			values ('$id_cliente','$id_empleado','$estado','$total','$recibido_venta','$cambio_venta',CURDATE(),CURTIME())";
			$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
		}
		//--------------------------------Insertar detalleventa----------------------------------------------------------------
		public function insertar_detalleventa($productos)
			{
				$res = $this->db->query("SELECT MAX(id_venta)AS id_venta FROM ventas;");		
				$row = $res->result();
				$id_venta = $row[0]->id_venta;

				foreach($productos as $filas)
				{
					$sql = "INSERT INTO detalle_venta(id_venta, id_producto,cantidad, subtotal)
					VALUES('$id_venta','$filas->id_producto','$filas->cant','$filas->subt');";
					$this->db->query($sql);	
				}
			}	
		//--------------------------------Actualizar las existencias del producto---------------------------------------------------------	
		public function actualizaproductos($productos)
		{
			foreach($productos as $filas)
			{
				$sql = "CALL actualizaexistencias('$filas->id_producto','$filas->cant');";
				$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
			}
		}
			
		//---------------------------------------Busqueda de privilegios para el apartado de cobro en el modulo de venta --------------------------------------------------
		public function privilegios($id)
		{
			$sql = "SELECT * FROM empleado WHERE id_empleado = '$id';";
			$res = $this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
			if($res -> num_rows() > 0)
			{
				return $res -> row();
				//return true;
			}
			else
			{
				return false;
			}
		}
		
		//---------------------------------------Busqueda de privilegios para el apartado de cobro en el modulo de venta --------------------------------------------------
		public function privilegios1($id)
		{
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$id';";
			$res = $this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
			if($res -> num_rows() > 0)
			{
				return $res -> row();
				//return true;
			}
			else
			{
				return false;
			}
		}
		
		//Inicia funcion para agregar el nombre del empleado deacuerdo al usuario en el modulo de venta
		function sesion_venta($id_empleado)
		{
			$sql = "SELECT * FROM empleado 
					WHERE 
					id_empleado = '$id_empleado';";
			$result = $this -> db ->query($sql);

			return $result->result();

		}
		//Inicia funcion para el inicio de sesion del modulo de venta
		function cliente_mostrador()
		{
			
			$sql = "SELECT * FROM cliente 
					WHERE 
					id_cliente = '1';";
			$result = $this -> db ->query($sql);

			return $result->result();

		}
	
	
}
?>