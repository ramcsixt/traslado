<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Traslados extends CI_Controller
{

	public function Index()
	{
		$dato = array(
			'utm_source' => $_GET["utm_source"],
			'utm_campaing' => $_GET["utm_campaing"]
		);
		$this->load->view("Layouts/Traslado");
		$this->load->view("Productos/Traslados/V1/Index");
	}

	public function contar_dias()
	{
		$fecha_minima="";
		$contador=0;
		$dia=0;

		if($_GET["fecha_recurrente"]!=""){
			$mods=explode(",",$_GET["fecha_recurrente"]);
			$fecha_minima=min($mods);
			$dia=1;
			$contador=count($mods);
		}
		$dato=array(
			'fecha_minima'=>$fecha_minima,
			'contador'=>$contador,
			'dia'=>$dia
		);
		echo json_encode($dato);
	}
	public function store_demo(){

		echo "<pre>";
		var_dump($_POST);
		echo "<pre>";
		$page=file_get_contents(base_url()."/Mailer/Traslados/Send?correo=".$_POST["correo"]."&origen=".$_POST["origen"]."&destino=".$_POST["destino"]."&precio_total=".$_POST["precio_total"]);
		if($page){
			echo 1;
		}else{
			echo 2;
		}

	}

	public function store()
	{
		date_default_timezone_set("America/Lima");
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));
		$fecha_registro=date("Y-m-d");
		$hora_registro=date("H:i");

		$prospecto=array(
			'nombre'=>$_POST["nombre_apellido"],
			'correo'=>$_POST["correo"],
			'telf_movil'=>$_POST["telf_movil"],
			'origen'=>$_POST["origen"],
			'fecha_registro'=>$fecha_registro,
			'hora_registro'=>$hora_registro,
			'destino'=>$_POST["destino"],
			'hora_origen'=>$_POST["hora_origen"],
			'precio_total'=>$_POST["precio_total"],
			'precio_distancia'=>$_POST["precio_distancia"],
			'descuento1'=>$_POST["descuento1"],
			'descuento2'=>$_POST["descuento2"],
			'observaciones'=>$_POST["obs"],
			'condiciones'=>$_POST["condiciones"],
			'idestado_prospecto'=>1,
			'idpropietario'=>1,
			'idproducto'=>2,
			'idusuario'=>14
		);
		if(isset($_POST['switch_retorno'])){
			$prospecto['con_retorno']=$_POST['switch_retorno'];
			$prospecto['fecha_retorno']=$_POST["fecha_recojo"];
			$prospecto['hora_retorno']=$_POST["hora_recojo"];
		}
		if(isset($_POST['switch_recurrente'])){
			$prospecto['recurrente']=$_POST["switch_recurrente"];
			$prospecto['fecha_origen']=$_POST["fecha_origen"];
		}else{
			$prospecto['fecha_origen']=$_POST["fecha_origen"];
		}

		$idprospecto=$this->Prospecto_model->store($prospecto);

		if($idprospecto!=""){
			$page = file_get_contents(base_url()."/Mailer/Traslados/Send?idprospecto=".$idprospecto."&correo=".$_POST["correo"]);
			if($page==1){
				//echo 1;
				$this->load->view("Productos/Traslados/V1/Respuesta/Correct");
			}else{
				$this->load->view("Productos/Traslados/V1/Respuesta/Mail_failed");
			}
		}else{
			$this->load->view("Productos/Traslados/V1/Respuesta/No_store");
		}
	}
}
