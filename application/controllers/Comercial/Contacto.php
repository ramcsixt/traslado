<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Contacto extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		$dato=array(
			'idcuenta'=>$_POST["idcuenta"]
		);
		$this->load->view('Comercial/Contacto/Index',$dato);
	}

	public function List_view()
	{
		$idcuenta=$_POST["idcuenta"];
		$this->load->model(array(
			'Comercial/Contacto_model'
		));
		$dato = array(
			'list_contacto' => $this->Contacto_model->list_view($idcuenta)
		);
		$this->load->view("Comercial/Contacto/List_view", $dato);
	}

	public function Create()
	{
		$this->load->model(array(
			'General/Sexo_model',
			'General/Cargo_model',
			'General/Tipodocumento_model',
			'Comercial/Cuenta_model'
		));
		$idcuenta=$_POST["idcuenta"];

		$dato=array(
			'idcuenta'=>$idcuenta,
			'tipo_documento'=>$this->Tipodocumento_model->list_view(),
			'cargo'=>$this->Cargo_model->list_view(),
			'sexo'=>$this->Sexo_model->list_view(),
			'cuenta'=>$this->Cuenta_model->list_view($busqueda="")
		);
		$this->load->view("Comercial/Contacto/Create",$dato);
	}

	public function Store()
	{
		$this->load->model(array(
			'Comercial/Contacto_model'
		));

		$contacto=array(
			'idtipo_documento'=>$_POST["idtipo_documento"],
			'nombre'=>$_POST["nombre"],
			'idcargo'=>$_POST["idcargo"],
			'correo'=>$_POST["correo"],
			'direccion'=>$_POST["direccion"],
			'celular'=>$_POST["celular"],
			'idsexo'=>$_POST["idsexo"],
			'f_nacimiento'=>$_POST["f_nacimiento"],
			'idcuenta'=>$_POST["idcuenta"],
			'nro_documento'=>$_POST["nro_documento"],
			'idestado'=>1
		);

		$respuesta=$this->Contacto_model->store($contacto);
		if($respuesta!=""){
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}

	public function Update()
	{
		$this->load->model(array(
			'Comercial/Contacto_model'
		));
		$idcontacto=$_POST["idcontacto"];
		$contacto=array(
			'idtipo_documento'=>$_POST["idtipo_documento"],
			'nombre'=>$_POST["nombre"],
			'correo'=>$_POST["correo"],
			'direccion'=>$_POST["direccion"],
			'celular'=>$_POST["celular"],
			'idcuenta'=>$_POST["idcuenta"],
			'nro_documento'=>$_POST["nro_documento"],
			'idestado'=>1
		);
		$respuesta=$this->Contacto_model->update($idcontacto,$contacto);
		if($respuesta!=""){
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}

	public function Delete()
	{
		$idcontacto=$_POST["idcontacto"];

		$dato=array(
			'idcontacto'=>$idcontacto
		);

		$this->load->view("Comercial/Contacto/Delete",$dato);
	}

	public function Destroy()
	{
		$this->load->model(array(
			'Comercial/Contacto_model'
		));

		$idcontacto=$_POST["idcontacto"];

		$contacto=array(
			'idestado'=>2
		);
		$resultado=$this->Contacto_model->update($idcontacto,$contacto);
		if($resultado){
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}

	public function View()
	{
		$this->load->model(array(
			'Comercial/Contacto_model',
			'General/Tipodocumento_model'
		));

		$idcontacto=$_POST["idcontacto"];

		$dato=array(
			'contacto'=>$this->Contacto_model->view($idcontacto),
			'tipo_documento'=>$this->Tipodocumento_model->list_view()
		);

		$this->load->view("Comercial/Contacto/Edit",$dato);
	}

	public function Change_pw()
	{
		$this->load->model(array(
			'Comercial/Contacto_model'
		));
		$idcontacto=$_POST["idcontacto"];

		$contacto=array(
			'password'=>$_POST["password"]
		);
		$resultado=$this->Contacto_model->update($idcontacto,$contacto);
		if($resultado){
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}
}
