<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Prospecto extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		$idcuenta = $_POST["idcuenta"];

		$dato = array(
			'idcuenta' => $idcuenta
		);
		$this->load->view('Comercial/Prospecto/Index', $dato);
	}

	public function List_view()
	{
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		$busqueda=$_POST["busqueda"];
		$dato=array(
			'prospecto'=>$this->Prospecto_model->list_view($busqueda)
		);

		$this->load->view('Comercial/Prospecto/List_view',$dato);
	}

	public function Create()
	{
		$this->load->model(array(
			'General/Tipoauto_model',
			'General/Sede_model',
			'General/Hora_model',
			'General/Fuente_model'
		));

		$dato=array(
			'tipo_auto'=>$this->Tipoauto_model->list_view(),
			'sede'=>$this->Sede_model->sede_pais(),
			'hora'=>$this->Hora_model->list_view(),
			'fuente'=>$this->Fuente_model->list_view()
		);

		$this->load->view('Comercial/Prospecto/Create',$dato);
	}

	public function View($idprospecto="",$idproducto="")
	{
		$this->load->model(array(
			'Comercial/Prospecto_model',
			'Comercial/Estadoprospecto_model',
			'Comercial/Propietario_model',
			'General/Sede_model',
			'General/Hora_model',
			'General/Producto_model'
		));


		$dato=array(
			'prospecto'=>$this->Prospecto_model->view($idprospecto),
			'estado_prospecto'=>$this->Estadoprospecto_model->list_view(),
			'detail'=>$this->Prospecto_model->detail_view($idprospecto),
			'propietario'=>$this->Propietario_model->list_view(),
			'idprospecto'=>$idprospecto,
			'sede'=>$this->Sede_model->sede_pais(),
			'hora'=>$this->Hora_model->list_view()
		);
		$producto=$this->Producto_model->list_view($idproducto);
		foreach($producto as $prd) {
			$this->load->view($prd->url, $dato);
		}
	}

	public function Mailer()
	{

		$para      = $_POST["correo"];
		$titulo    = 'Link de Registro Prospecto';
		$mensaje   = '<span style="font-size: 16px">Estimado Cliente agradecemos ponerse en contacto con nosotros a continuacion le enviamos el link de registro</span><br>
              <a href="localhost/Prospecto/Create">Registro de Pedido</a>';
		$cabeceras = 'From: webmaster@sixt.com.pe' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//'Reply-To: webmaster@surfordie2020.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		$resultado=mail($para, $titulo, $mensaje, $cabeceras);
		echo $resultado;
		if($resultado){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function Delete()
	{
		$dato=array(
			'idprospecto'=>$_POST["idprospecto"]
		);
		$this->load->view("Comercial/Prospecto/Delete",$dato);
	}

	public function Destroy()
	{
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		$idprospecto=$_POST["idprospecto"];
		$prospecto=array(
			'idestado_prospecto'=>2
		);
		$result=$this->Prospecto_model->edit($idprospecto,$prospecto);

		$prospecto['idprospecto']=$idprospecto;
		$prospecto['idusuario']=$this->session->userdata('idusuario');

		$resultado=$this->Prospecto_model->history_store($prospecto);

		redirect("Comercial/Prospecto");
	}

	public function Store()
	{
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		date_default_timezone_set("America/Lima");
		$habilitar=$_POST['habilitar'];
		$fecha_registro=date("Y-m-d");
		$hora_registro=date("H:i");
		$prospecto=array(
			'nombre'=>$_POST['nombre_apellido'],
			'correo'=>$_POST['correo'],
			'telf_movil'=>$_POST['telf_movil'],
			'idsede_recojo'=>$_POST['recojo'],
			'fecha_recojo'=>$_POST['fecha_recojo'],
			'hora_recojo'=>$_POST['hora_recojo'],
			'idestado_prospecto'=>1,
			'fecha_entrega'=>$_POST['fecha_entrega'],
			'hora_entrega'=>$_POST['hora_entrega'],
			'idpropietario'=>1,
			'idusuario'=>$this->session->userdata('idusuario'),
			'utm_name'=>$_POST["utm_name"],
			'fecha_registro'=>$fecha_registro,
			'hora_registro'=>$hora_registro
		);

		if($habilitar!=1){
			$prospecto['idsede_entrega']=$_POST['entrega'];
		}else{
			$prospecto['idsede_entrega']=$_POST['recojo'];
		}
		//	var_dump($prospecto);
		$idprospecto=$this->Prospecto_model->store($prospecto);

//
		$cont = 0;
		while ($cont < count($_POST["tipo_auto"])) {
			$detail_prospecto=array(
				'idprospecto'=>$idprospecto,
				'idtipo_auto'=>$_POST['tipo_auto'][$cont]
			);
			$cont = $cont + 1;
			$resultado=$this->Prospecto_model->store_details($detail_prospecto);
		}

		$prospecto['idprospecto']=$idprospecto;

		$resultado=$this->Prospecto_model->history_store($prospecto);

		$page = file_get_contents(base_url()."/Mailer/Reserva/Send?idprospecto=".$idprospecto."&correo=".$_POST["correo"]);
		if($page==1){
			header("Location:".$_SERVER['HTTP_REFERER']);
		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}


	}

	public function Update()
	{
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		$idprospecto=$_POST['idprospecto'];
		$prospecto=array(
			'nombre'=>$_POST["nombre"],
			'apellido'=>$_POST["apellido"],
			'correo'=>$_POST["correo"],
			'telf_movil'=>$_POST["movil"],
			'idpropietario'=>$_POST["propietario"],
			'idsede_recojo'=>$_POST["idrecojo"],
			'idsede_entrega'=>$_POST["identrega"],
			'fecha_entrega'=>$_POST["fecha_entrega"],
			'hora_entrega'=>$_POST["hora_entrega"],
			'fecha_recojo'=>$_POST["fecha_recojo"],
			'hora_recojo'=>$_POST["hora_recojo"]
		);
		$result=$this->Prospecto_model->edit($idprospecto,$prospecto);

		$prospecto['idprospecto']=$idprospecto;

		$resultado=$this->Prospecto_model->history_store($prospecto);

		if($result){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function Confirmation()
	{
		$this->load->model(array(
			'Comercial/Busqueda_model'
		));
		$nombre=$_POST["nombre"];
		$correo=$_POST["correo"];
		$movil=$_POST["movil"];
		$dato=array(
			'estado_prospecto'=>$_POST["converter"]
		);
		if($_POST["converter"]==5){

			$dato=array(
				'estado_prospecto'=>$_POST["converter"],
				'cuenta'=>$this->Busqueda_model->similares($nombre,$correo,$movil)
			);
		}else{
			$dato=array(
				'estado_prospecto'=>$_POST["converter"]
			);
		}
		$this->load->view("Comercial/Prospecto/Confirmation",$dato);
	}

	public function Enlazar($idcuenta="")
	{
		$this->load->model(array(
			'Comercial/Prospecto_model',
			'Comercial/Oportunidad_model'
		));
		$idprospecto=$_POST["idprospecto"];
		$prospecto=array(
			'idestado_prospecto'=>$_POST['estado_prospecto']
		);
		$result=$this->Prospecto_model->edit($idprospecto,$prospecto);

		$prospecto['idprospecto']=$idprospecto;
		$prospecto['idusuario']=$this->session->userdata('idusuario');

		$resultado=$this->Prospecto_model->history_store($prospecto);

		$cont = 0;
		while ($cont < count($_POST["idtipo_auto"])) {
			$oportunidad=array(
				'nombre'=>'Oportunidad',
				'idtipo_oportunidad'=>1,
				'identrega'=>$_POST['identrega'],
				'fecha_entrega'=>$_POST['fecha_entrega'],
				'hora_entrega'=>$_POST['hora_entrega'],
				'idrecojo'=>$_POST['idrecojo'],
				'fecha_recojo'=>$_POST['fecha_recojo'],
				'hora_recojo'=>$_POST['hora_recojo'],
				'idusuario'=>$this->session->userdata('idusuario'),
				'idcuenta'=>$idcuenta,
				'idestado'=>1,
				'idetapa_oportunidad'=>1,
				'idtipo_auto'=>$_POST['idtipo_auto'][$cont]

			);
			$idoportunidad=$this->Oportunidad_model->store($oportunidad);
			$cont = $cont + 1;
		}
		if($idprospecto!=""){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function Converter()
	{
		date_default_timezone_set('America/Lima');
		$fecha=date('Y-m-d');
		$hora=date('H:i:s');
		$this->load->model(array(
			'Comercial/Cuenta_model',
			'Comercial/Prospecto_model',
			'Comercial/Oportunidad_model'
		));

		if($_POST['estado_prospecto']==5){
			$cuenta=array(
				'nombre'=>$_POST["nombre"],
				'apellido'=>$_POST["apellido"],
				'idpropietario'=>$_POST["propietario"],
				'correo'=>$_POST["correo"],
				'telefono'=>$_POST["telf_fijo"],
				'celular'=>$_POST["telf_movil"],
				'idestado'=>1,
				'idtipo_cuenta'=>2,
				'utm_name'=>$_POST["utm_name"],
				'idusuario'=>$this->session->userdata('idusuario')
			);
			$idcuenta=$this->Cuenta_model->store($cuenta);
			$cont = 0;
			while ($cont < count($_POST["idtipo_auto"])) {
				$oportunidad=array(
					'nombre'=>'Oportunidad',
					'idtipo_oportunidad'=>1,
					'fecha_in'=>$fecha,
					'hora_in'=>$hora,
					'identrega'=>$_POST['identrega'],
					'fecha_entrega'=>$_POST['fecha_entrega'],
					'hora_entrega'=>$_POST['hora_entrega'],
					'idrecojo'=>$_POST['idrecojo'],
					'fecha_recojo'=>$_POST['fecha_recojo'],
					'hora_recojo'=>$_POST['hora_recojo'],
					'idusuario'=>$this->session->userdata('idusuario'),
					'idcuenta'=>$idcuenta,
					'idestado'=>1,
					'idetapa_oportunidad'=>1,
					'idtipo_auto'=>$_POST['idtipo_auto'][$cont]
				);
				$idoportunidad=$this->Oportunidad_model->store($oportunidad);
				$cont = $cont + 1;
			}
			$idprospecto=$_POST['idprospecto'];
			$prospecto=array(
				'nombre'=>$_POST["nombre"],
				'apellido'=>$_POST["apellido"],
				'correo'=>$_POST["correo"],
				'telf_fijo'=>$_POST["telf_fijo"],
				'telf_movil'=>$_POST["telf_movil"],
				'idestado_prospecto'=>$_POST['estado_prospecto']
			);
			$result=$this->Prospecto_model->edit($idprospecto,$prospecto);

			$prospecto['idprospecto']=$idprospecto;
			$prospecto['idusuario']=$this->session->userdata('idusuario');

			$resultado=$this->Prospecto_model->history_store($prospecto);
		}else{
			$idprospecto=$_POST['idprospecto'];
			$prospecto=array(
				'nombre'=>$_POST["nombre"],
				'apellido'=>$_POST["apellido"],
				'correo'=>$_POST["correo"],
				'telf_fijo'=>$_POST["telf_fijo"],
				'telf_movil'=>$_POST["telf_movil"],
				'idestado_prospecto'=>$_POST['estado_prospecto']
			);
			$result=$this->Prospecto_model->edit($idprospecto,$prospecto);

			$prospecto['idprospecto']=$idprospecto;
			$prospecto['idusuario']=$this->session->userdata('idusuario');

			$resultado=$this->Prospecto_model->history_store($prospecto);
		}
		redirect($_SERVER['HTTP_REFERER']);

	}

	public function Update_massive()
	{
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));

		$cont = 0;
		while ($cont < count($_POST["idprospecto"])) {
			$idprospecto=$_POST["idprospecto"][$cont];
			$prospecto=array(
				'nombre'=>$_POST["nombre"][$cont],
				'telf_movil'=>$_POST["movil"][$cont],
				'correo'=>$_POST["correo"][$cont]
			);

			$cont = $cont + 1;
			$respuesta=$this->Prospecto_model->edit($idprospecto,$prospecto);

			$prospecto['idprospecto']=$idprospecto;
			$prospecto['idusuario']=$this->session->userdata('idusuario');

			$resultado=$this->Prospecto_model->history_store($prospecto);
		}
		if($respuesta){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function View_details()
	{
		$idestado_prospecto=$_POST['idestado_prospecto'];

		$this->load->model(array(
			"Comercial/Prospecto_model"
		));
		switch ($idestado_prospecto) {
			case 1:
				$dato=array(
					'registro'=>$this->Prospecto_model->register()
				);
				$this->load->view("Comercial/Prospecto/Register",$dato);
				break;
			case 2:
				$dato=array(
					'contacto'=>$this->Prospecto_model->contact()
				);
				$this->load->view("Comercial/Prospecto/Contact",$dato);
				break;
			case 3:
				$dato=array(
					'registro'=>$this->Prospecto_model->work()
				);
				$this->load->view("Comercial/Prospecto/Work",$dato);
				break;
			case 4:
				$dato=array(
					'registro'=>$this->Prospecto_model->no_proces()
				);
				$this->load->view("Comercial/Prospecto/No_proces",$dato);
				break;
			case 5:
				$dato=array(
					'registro'=>$this->Prospecto_model->convert()
				);
				$this->load->view("Comercial/Prospecto/Convert",$dato);
				break;
		}
	}

}
