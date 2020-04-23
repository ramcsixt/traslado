<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Cuenta extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		$this->load->view('Comercial/Cuenta/Index');
	}

	public function List_view()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model'
		));
		$busqueda=$_POST["busqueda"];
		$dato=array(
			'list_cuenta'=>$this->Cuenta_model->list_view($busqueda)
		);
		$this->load->view("Comercial/Cuenta/List_view",$dato);
	}

	public function Delete()
	{
		$dato=array(
			'idcuenta'=>$_POST["idcuenta"]
		);
		$this->load->view("Comercial/Cuenta/Delete",$dato);
	}

	public function Destroy()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model'
		));
		$idcuenta=$_POST["idcuenta"];
		$cuenta=array(
			'idestado'=>2
		);
		$result=$this->Prospecto_model->update($idcuenta,$cuenta);
		redirect("Comercial/Cuenta");
	}

	public function Create()
	{
		$this->load->model(array(
			'General/Tipodocumento_model',
			'General/Tipocuenta_model'
		));

		$dato=array(
			'tipo_documento'=>$this->Tipodocumento_model->list_view(),
			'tipo_cuenta'=>$this->Tipocuenta_model->list_view()
		);

		$this->load->view("Comercial/Cuenta/Create",$dato);
	}

	public function Store()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model'
		//	'General/Tipodocumento_model'
		));
		//$idtipo_documento=$_POST["idtipo_documento"];
		//$opc_store=$this->Tipodocumento_model->option_store($idtipo_documento);
		$cuenta=array(
			'idtipo_documento'=>$_POST["idtipo_documento"],
			'nro_documento'=>$_POST["nro_documento"],
			'idpropietario'=>$_POST["idpropietario"],
			'correo'=>$_POST["correo"],
			'direccion'=>$_POST["direccion"],
			'telefono'=>$_POST["telefono"],
			'celular'=>$_POST["celular"],
			'f_nacimiento'=>$_POST["f_nacimiento"],
			'idestado'=>1,
			'idtipo_cuenta'=>$_POST["idtipo_cuenta"],
			'idusuario'=>$this->session->userdata('idusuario')
		);

		if(isset($_POST["nombre"])){
			$cuenta['nombre']=$_POST['nombre'];
		}else{
			$cuenta['razon_social']=$_POST['razon_social'];
		}
		$respuesta=$this->Cuenta_model->store($cuenta);
		redirect("Comercial/Cuenta");
	}

	public function Edit()
	{
		$this->load->model(array(
			'General/Tipodocumento_model',
			'Comercial/Cuenta_model'
		));
		$idcuenta=$_POST["idcuenta"];
		$dato=array(
			'cuenta'=>$this->Cuenta_model->view($idcuenta),
			'tipo_documento'=>$this->Tipodocumento_model->list_view()
		);

		$this->load->view("Comercial/Cuenta/Edit",$dato);
	}

	public function Update()
	{
		$this->load->model(array(
			'Comercial/Cuenta_model'
			//	'General/Tipodocumento_model'
		));
		//$idtipo_documento=$_POST["idtipo_documento"];
		//$opc_store=$this->Tipodocumento_model->option_store($idtipo_documento);
		$idcuenta=$_POST["idcuenta"];
		$cuenta=array(
			'nombre'=>$_POST["nombre"],
			'apellido'=>$_POST["apellido"],
			'razon_social'=>$_POST["razon_social"],
			'idtipo_documento'=>$_POST["idtipo_documento"],
			'nro_documento'=>$_POST["nro_documento"],
			'idpropietario'=>1,
			'correo'=>$_POST["correo"],
			'celular'=>$_POST["celular"],
			'idestado'=>1
		);
		$respuesta=$this->Cuenta_model->update($idcuenta,$cuenta);
		redirect("Comercial/Cuenta/View/".$idcuenta);
	}

	public function View($idcuenta="")
	{
		$this->load->model(array(
			'General/Tipodocumento_model',
			'Comercial/Cuenta_model'
		));

		$dato=array(
			'cuenta'=>$this->Cuenta_model->view($idcuenta),
			'contador_contacto'=>$this->Cuenta_model->count_contacto($idcuenta),
			'idcuenta'=>$idcuenta,
			'tipo_documento'=>$this->Tipodocumento_model->list_view()
		);

		$this->load->view("Comercial/Cuenta/View",$dato);
	}

	public function View_create()
	{
		$this->load->model(array(
			'General/Tipodocumento_model'
		));
		//ingreso de variables GET o POST
		$idtipo_cuenta=$_POST["idtipo_cuenta"];

		if($idtipo_cuenta!=2){
			$dato=array(
				'idtipo_cuenta'=>$idtipo_cuenta,
				'tipo_documento'=>$this->Tipodocumento_model->list_view()
			);
			$this->load->view("Comercial/Cuenta/Opciones/Corporative_view",$dato);
		}else{
			$dato=array(
				'idtipo_cuenta'=>$idtipo_cuenta,
				'tipo_documento'=>$this->Tipodocumento_model->list_view()
			);
			$this->load->view("Comercial/Cuenta/Opciones/Natural_view",$dato);
		}
	}
}

