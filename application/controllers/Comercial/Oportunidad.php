<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Oportunidad extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		$idcuenta=$_POST["idcuenta"];

		$dato=array(
			'idcuenta'=>$idcuenta
		);
		$this->load->view('Comercial/Oportunidad/Index',$dato);
	}

	public function List_view()
	{
		$idcuenta=$_POST["idcuenta"];
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));
		$dato=array(
			'oportunidad'=>$this->Oportunidad_model->list_view($idcuenta)
		);

		$this->load->view("Comercial/Oportunidad/List_view",$dato);
	}

	public function View($idoportunidad="")
	{
		$this->load->model(array(
			'Comercial/Oportunidad_model',
			'Comercial/Cuenta_model'
		));
		$dato=array(
			'oportunidad'=>$this->Oportunidad_model->view($idoportunidad),
			'details_oportunity'=>$this->Oportunidad_model->view_detail($idoportunidad),
			'idoportunidad'=>$idoportunidad
		);

		$this->load->view('Comercial/Oportunidad/View',$dato);
	}

	public function Create()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model',
			'General/Tipooportunidad_model',
			'General/Tipoauto_model',
			'General/Sede_model',
			'General/Hora_model',
			'General/Fuente_model'
		));

		$idcuenta=$_POST["idcuenta"];
		$dato=array(
			'idcuenta'=>$idcuenta,
			'cuenta'=>$this->Cuenta_model->view($idcuenta),
			'list_cuenta'=>$this->Cuenta_model->list_view($busqueda=""),
			'select_top'=>$this->Tipooportunidad_model->list_view(),
			'tipo_auto'=>$this->Tipoauto_model->list_view(),
			'sede'=>$this->Sede_model->sede_pais(),
			'hora'=>$this->Hora_model->list_view(),
		);
		$this->load->view("Comercial/Oportunidad/Create",$dato);
	}

	public function Store()
	{
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));
		date_default_timezone_set("America/Lima");
		$fecha=date("Y-m-d");
		$hora=date("H:i");

		$habilitar=$_POST['habilitar'];

		$cont = 0;
		while ($cont < count($_POST["tipo_auto"])) {
			$oportunidad=array(
				'idcuenta'=>$_POST['idcuenta'],
				'nombre'=>'Cotizacion',
				'idtipo_oportunidad'=>1,
				'idrecojo'=>$_POST['recojo'],
				'fecha_recojo'=>$_POST["fecha_recojo"],
				'hora_recojo'=>$_POST["hora_recojo"],
				'idusuario'=>$this->session->userdata('idusuario'),
				'idestado'=>1,
				'idetapa_oportunidad'=>1,
				'fecha_entrega'=>$_POST["fecha_entrega"],
				'hora_entrega'=>$_POST["hora_entrega"],
				'fecha_in'=>$fecha,
				'hora_in'=>$hora,
				'idtipo_auto'=>$_POST['tipo_auto'][$cont]
			);

			if($habilitar!=1){
				$oportunidad['identrega']=$_POST['entrega'];
			}else{
				$oportunidad['identrega']=$_POST['recojo'];
			}
			$cont = $cont + 1;
			$idoportunidad=$this->Oportunidad_model->store($oportunidad);
		}


		if($idoportunidad!=''){
			redirect("Comercial/Oportunidad");
		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
		//var_dump($prospecto);
	}

	public function delete()
	{
		$dato=array(
			'idoportunidad'=>$_POST["idoportunidad"]
		);

		$this->load->view("Comercial/Oportunidad/Delete",$dato);
	}

	public function destroy()
	{
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));

		$idoportunidad=$_POST["idoportunidad"];

		$oportunidad=array(
			'idestado'=>2
		);
		$resultado=$this->Oportunidad_model->update($idoportunidad,$oportunidad);

		if($resultado){
			redirect("Comercial/Oportunidad");
		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}

	}

	public function Confirmation()
	{
		$dato=array(
			'idoportunidad'=>$_POST["idoportunidad"]
		);

		$this->load->view("Comercial/Oportunidad/Confirmation",$dato);
	}

	public function Conf_oportunidad()
	{
		$this->load->model(array(
			'Comercial/Oportunidad_model'
		));

		$idoportunidad=$_POST["idoportunidad"];

		$oportunidad=array(
			'idetapa_oportunidad'=>5
		);
		$resultado=$this->Oportunidad_model->update($idoportunidad,$oportunidad);

		if($resultado){
			redirect("Comercial/Oportunidad");
		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}

	}
}
