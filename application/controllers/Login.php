<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Login extends CI_Controller {

	public function Index($v="")
	{
		/*$dato=array(
			'error'=>$this->session->flashdata('error'),
			'username'=>$this->session->flashdata('username'),
			'type'=>$_GET["type"]

		);
		if($v=="v2"){
			$this->load->view('Login/v2/Index',$dato);
		}else{
			$this->load->view('Login/v1/Index',$dato);
		}*/

		echo "<h1>Listo podemos comenzar</h1>";

	}

	public function Verificador()
	{
		$this->load->model(array(
			'General/Usuario_model',
			'Comercial/Contacto_model'
		));
		$type=$_POST["type"];
		$correo=$_POST["correo"];
		$password=$_POST["password"];

		$usuario=$this->Usuario_model->sesion($correo);
		if($usuario->contador>0){
			if($password==$usuario->password){
				$usuario_data = array(
					'idusuario' => $usuario->idusuario,
					'username'=>$usuario->username,
					'nombre' => $usuario->nombre." ".$usuario->apellido,
					'logueado' => TRUE
				);
				$this->session->set_userdata($usuario_data);
				redirect('Dashboard');
			}else{
				$this->session->set_flashdata('error','La Contraseña es Incorrecta');
			//	$this->session->set_flashdata('username',$correo);
				redirect("/",'refresh');
			}
		}else{
			$this->session->set_flashdata('error','El Correo electronico no existe en el Sistema');
			redirect("/",'refresh');
		}
	}

	public function Cerrar_sesion() {
		$usuario_data = array(
			'logueado' => FALSE
		);
		$this->session->set_userdata($usuario_data);
		redirect('/','refresh');
	}

}
