<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Prospecto extends CI_Controller
{

	public function Index()
	{
		$this->load->model(array(
			'General/Tipoauto_model',
			'General/Sede_model',
			'General/Hora_model'
		));

		$dato=array(
			'tipo_auto'=>$this->Tipoauto_model->list_view(),
			'sede'=>$this->Sede_model->sede_pais(),
			'hora'=>$this->Hora_model->list_view(),
			'utm_source'=>$_GET["utm_source"],
			'utm_campaing'=>$_GET["utm_campaing"]
		);

		if($_GET["utm_campaing"]==2){
			$this->load->view('Reserva/Prospecto/Index',$dato);
		}else{
			$this->load->view('Reserva/Prospecto/Index',$dato);
		}
	}


	public function Store()
	{
		date_default_timezone_set("America/Lima");
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		$fecha_registro=date("Y-m-d");
		$hora_registro=date("H:i");
		$habilitar=$_POST['habilitar'];

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
			'utm_name'=>$_POST["utm_name"],
			'idusuario'=>14,
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
			redirect("Prospecto/Almacenado?correo=".$_POST["correo"]);
		}else{
			echo "Error de Envio";
		}

	}

	public function Almacenado()
	{
		$dato=array(
			'correo'=>$_GET["correo"]
		);

		$this->load->view("Prospecto/Grabado",$dato);
	}

}
