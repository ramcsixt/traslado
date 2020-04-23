<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Busqueda extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Cliente()
	{
	//	$this->load->view('Comercial/Contacto/Index');
		$this->load->model(array(
			'Comercial/Busqueda_model'
		));
		$cliente=$_POST["cliente"];
		$dato=array(
			'resultado'=>$this->Busqueda_model->Cuenta($cliente)
		);
		$this->load->view("Comercial/Busqueda/Cuenta",$dato);
	}
}
