<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Cuenta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logueado')) {
			redirect('/');
		}
	}

	public function Index()
	{
		$idopcion=$_POST["idopcion"];

		if($idopcion==1){

		}else if($idopcion==2){

		}else if($idopcion==3){
			$dato=array(
				'idcuenta'=>$_POST["idcuenta"]
			);
			$this->load->view("Comercial/Cuenta/Opciones/Accion/Index",$dato);
		}
	}
}
