<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/Cliente/Login.php';
class Solicitudes extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('Cliente/Login');
		}
	}

	public function Index()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model'
		));
		$idcuenta=$this->session->userdata('idcuenta');

		$cuenta=$this->Cuenta_model->contacto($idcuenta);

		$dato=array(
			'nombre_cuenta'=>$cuenta->nombre
		);
		$this->load->view('Cliente/Requerimiento/Index',$dato);
	}

	public function Detail_index()
	{
		$idcuenta=$this->session->userdata('idcuenta');
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));
		$dato=array(
			'oportunidad'=>$this->Oportunidad_model->list_view($idcuenta)
		);

		$this->load->view("Comercial/Oportunidad/List_view",$dato);
	}

	public function Create()
	{
		$this->load->view("Cliente/Requerimiento/Create");
	}

	public function Edit()
	{
		$idrequerimiento=$_POST["idrequerimiento"];

		$dato=array(
			'idrequerimiento'=>$idrequerimiento
		);
		$this->load->view("Cliente/Requerimiento/Edit",$dato);
	}

}
