<?php
class Model_usuario extends CI_Model
{
	//Inicia funcion para el inicio de sesion de empleado
	function sesion_empleado($correo,$pass_usuario)
		{
					$pass = sha1($pass_usuario);
					$sql = "SELECT * FROM empleado 
							WHERE 
							id_empleado = '$correo' OR correo = '$correo'
							AND contrasena = '$pass';";
					$consulta = $this -> db ->query($sql);

					if($consulta -> num_rows() > 0){
							return $consulta -> row();
							//return true;
						}
					else{
							return false;
						}

		}
		
	//Inicia funcion para los privilegios
	function privilegios($id_usuario)
		{
			$sql = "select * usuario from where correo = '$id_usuario';";
			$res = $this -> db ->query ($sql);
			return $res->result();
		}
}
?>