<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function Index()
	{
		$dato=array(
			'error'=>$this->session->flashdata('error')
		);
		$this->load->view('Cliente/Login/Index',$dato);
	}

	public function Verificar()
	{
		$this->load->model(array(
			'Cliente/Login_model'
		));

		$correo=$_POST["correo"];
		$password=$_POST["password"];

		$contacto=$this->Login_model->sesion($correo);
		if(is_null($contacto->contador)){
			$this->session->set_flashdata('error','El Correo Electronico ingresado no existe en el Sistema');
			redirect("Cliente/Login",'refresh');
		}else{
			if($password==$contacto->password){
				$contacto_data = array(
					'idcontacto' => $contacto->idcontacto,
					'nombre'=>$contacto->nombre,
					'idcuenta'=>$contacto->idcuenta,
					'logueado' => TRUE,

				);
				$this->session->set_userdata($contacto_data);
				redirect('Cliente/Solicitudes');
			}else{
				$this->session->set_flashdata('error','La Contraseña es Incorrecta');
				redirect("Cliente/Login",'refresh');
			}
		}
	}

	public function Cerrar_sesion()
	{
		$contacto_data = array(
			'logueado' => FALSE
		);
		$this->session->set_userdata($contacto_data);
		redirect('Cliente/Login','refresh');
	}
}
