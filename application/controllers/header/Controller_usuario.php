<?php
class Controller_usuario extends CI_controller
{
	/*----------------------------------------------------Insertar usuario---------------------------------------------------------------*/
	public function insertar_usuario()
		{
			$nom_usuario = $this->input->post('nom_usuario');
			$ap_usuario = $this->input->post('ap_usuario');
			$am_usuario = $this->input->post('am_usuario');
			$pass_usuario = $this->input->post('pass_usuario');
			$contra = sha1($pass_usuario);
			$correo = $this->input->post('correo');
			$telefono = $this->input->post('telefono');
			$sexo = $this->input->post('sexo');
			$activo = $this->input->post('activo');
			$administrador = $this->input->post('administrador');
			$ventas = $this->input->post('ventas');
			$almacen = $this->input->post('almacen');
			$caja = $this->input->post('caja');
			$this->load->model('Model_usuario');
			$this->Model_usuario->insertar_usuario($nom_usuario,$ap_usuario,$am_usuario,$contra,$pass_usuario,$correo,$telefono,$sexo,$activo,$administrador,$ventas,$almacen,$caja);
			redirect(base_url() . 'index.php/Controller_inicio/inicio');
		}
		
	// -------------------------- Modelo --------------------------------------

	function __construct()
		{
			parent::__construct();
			$this -> load -> model('header/Model_usuario');
		}
	// Inicia funcion de logeo para el usuario
	public function session()
	{
		$correo = $this->input->post('correo');
		$pass_usuario = $this->input->post('pass_usuario');
		$this->load->model('header/Model_usuario');
		//error_reporting(0);
		

			$empleado = $this->Model_usuario->sesion_empleado($correo, $pass_usuario);
			
			// -------------------------- Condicional para el administrador --------------------------------------
			$privilegio_admin = $empleado -> privilegio_admin;
			if($privilegio_admin == true)
			{
				//los datos de la consulta se transforman en vaiables para luego incluirlas a la sesion
				$id_empleado = $empleado -> id_empleado;
				$correo = $empleado -> correo;
				$nom_empleado = $empleado -> nom_empleado;
				//session_start();
				$_SESSION['id_empleado']= $id_empleado;
				$_SESSION['correo']= $correo;
				$_SESSION['nom_empleado']= $nom_empleado;				
				redirect(base_url() . 'index.php/header/Controller_inicio/inicio');
			}
			else
			{
				// -------------------------- Condicional para ventas y almacen --------------------------------------
				$empleado = $this->Model_usuario->sesion_empleado($correo, $pass_usuario);
					
				//los datos de la consulta se transforman en vaiables para luego incluirlas a la sesion
				$id_empleado = $empleado -> id_empleado;
				$nom_empleado = $empleado -> nom_empleado;
			
				//las variables son incluidas en la sesion
				$_SESSION['id_empleado']= $id_empleado;
				$_SESSION['correo']= $correo;
				$_SESSION['nom_empleado']= $nom_empleado;
				
				$privilegio_venta = $empleado -> privilegio_venta;
				$privilegio_almacen = $empleado -> privilegio_almacen;
				if($privilegio_venta && $privilegio_almacen == true)
				{
					redirect(base_url() . 'index.php/header/Controller_inicioventa/inicio_venta_almacen');
				}
				else
				{
					// -------------------------- Condicional para caja y almacen --------------------------------------
					$privilegio_caja = $empleado -> privilegio_caja;
					$privilegio_almacen = $empleado -> privilegio_almacen;
					if($privilegio_caja && $privilegio_almacen == true)
					{
						redirect(base_url() . 'index.php/header/Controller_iniciocaja/inicio_caja_almacen');
					}
					else
					{
						// -------------------------- Condicional para caja y ventas --------------------------------------
						$privilegio_caja = $empleado -> privilegio_caja;
						$privilegio_venta = $empleado -> privilegio_venta;
						if($privilegio_caja && $privilegio_venta == true)
						{
							redirect(base_url() . 'index.php/header/controller_inicioventa/inicio_caja_venta');
						}
						else
						{
							// -------------------------- Condicional para  ventas --------------------------------------
							$privilegio_venta = $empleado -> privilegio_venta;
							if($privilegio_venta == true)
							{
								redirect(base_url() . 'index.php/header/controller_inicioventa/inicio_ventas');
							}
							else
							{
								// -------------------------- Condicional para  almacen --------------------------------------
								$privilegio_almacen = $empleado -> privilegio_almacen;
								if($privilegio_almacen == true)
								{
									redirect(base_url() . 'index.php/header/Controller_inicioalmacen/inicio_almacen');
								}
								else
								{
									// -------------------------- Condicional para  caja --------------------------------------
									$privilegio_caja = $empleado -> privilegio_caja;
									if($privilegio_caja == true)
									{
										redirect(base_url() . 'index.php/header/Controller_iniciocaja/inicio_caja');
									}
								}
							}
						}
					}
				}
			}		
	}
	
	public function logout()
		{
			session_start();
			$this -> session -> sess_destroy();
			redirect(base_url() . 'index.php/header/Controller_inicio/login'); 
		}
}
?>