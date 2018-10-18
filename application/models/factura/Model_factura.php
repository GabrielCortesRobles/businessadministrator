<?php
	class Model_factura extends CI_Model{
		/*----------------------------------------------------Insertar venta---------------------------------------------------------------*/
		public function insertar_factura ($rfc_empresa, $nom_razonsocial, $regimen_fiscal,$tipo_factura
			,$cliente_frecuente,$uso_factura,$clave_producto,$clave_unidad,$cantidad,$unidad,$num_identificacion,
			$descripcion,$valor_unitario,$importe,$descuento,$adicionales_impuestos,$adicionales_informacion
			,$adicionales_cuenta,$tipo,$base,$impuesto,$tasa_cuota,$valor_tasa,$impuestos_importe)
			{
				/*------------------------------------------Consulta para insertar en la base de datos-----------------------------------------------------*/
				$sql = "insert into factura (rfc_empresa, nom_razonsocial, regimen_fiscal,tipo_factura
				,cliente_frecuente,uso_factura,clave_producto,clave_unidad,cantidad,unidad,num_identificacion,
				descripcion,valor_unitario,importe,descuento,adicionales_impuestos,adicionales_informacion
				,adicionales_cuenta,tipo,base,impuesto,tasa_cuota,valor_tasa,impuestos_importe,fecha,hora)
				values ('$rfc_empresa', '$nom_razonsocial', '$regimen_fiscal','$tipo_factura'
				,'$cliente_frecuente','$uso_factura','$clave_producto','$clave_unidad','$cantidad','$unidad','$num_identificacion',
				'$descripcion','$valor_unitario','$importe','$descuento','$adicionales_impuestos','$adicionales_informacion'
				,'$adicionales_cuenta','$tipo','$base','$impuesto','$tasa_cuota','$valor_tasa','$impuestos_importe',CURDATE(),CURTIME())";
				$this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
			}
		/*----------------------------------------------Consulta de factura--------------------------------------------------------*/
		public function datos_factura()
			{
				$sql = "SELECT * FROM empresas WHERE id_empresa='1';";
				$result = $this->db->query($sql) OR DIE ("eRROR DE CONSULTA");
				return $result->result();
			}
	}
?>