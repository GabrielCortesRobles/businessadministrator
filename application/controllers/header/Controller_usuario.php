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
			
		//los datos de la consulta se transforman en vaiables para luego incluirlas a la sesion
		$id_empleado = $empleado -> id_empleado;
		$nom_empleado = $empleado -> nom_empleado;
		$administrador = $empleado -> privilegio_admin;
		$caja = $empleado -> privilegio_caja;
		$almacen = $empleado -> privilegio_almacen;
		$venta = $empleado -> privilegio_venta;
		//session_start();
		$_SESSION['id_empleado']= $id_empleado;
		$_SESSION['nom_empleado']= $nom_empleado;
		$_SESSION['administrador']= $administrador;
		$_SESSION['caja']= $caja;
		$_SESSION['almacen']= $almacen;
		$_SESSION['venta']= $venta;				
		redirect(base_url() . 'index.php/header/Controller_inicio/inicio');
			
	}
	
	public function logout()
		{
			session_start();
			$this -> session -> sess_destroy();
			redirect(base_url() . 'index.php/header/Controller_inicio/login'); 
		}
}
?>