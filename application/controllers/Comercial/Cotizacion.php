<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Cotizacion extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Create()
	{
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));
		$iddetalle_oportunidad=$_POST["iddetalle_oportunidad"];
		$idoportunidad=$_POST["idoportunidad"];

		$dato=array(
			'iddetalle_oportunidad'=>$iddetalle_oportunidad,
			'idoportunidad'=>$idoportunidad,
			'oportunidad'=>$this->Oportunidad_model->view($idoportunidad),
			'detalle_oportunidad'=>$this->Oportunidad_model->view_detail($idoportunidad)
		);
		$this->load->view('Comercial/Cotizacion/Create',$dato);
	}

}
