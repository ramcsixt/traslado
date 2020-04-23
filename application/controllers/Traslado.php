<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Traslado extends CI_Controller
{

	public function Index()
	{
		$this->load->model(array(
			'General/Tipoauto_model',
			'General/Sede_model',
			'General/Hora_model'
		));

		$dato = array(
			'tipo_auto' => $this->Tipoauto_model->list_view(),
			'sede' => $this->Sede_model->sede_pais(),
			'hora' => $this->Hora_model->list_view(),
			'utm_source' => $_GET["utm_source"],
			'utm_campaing' => $_GET["utm_campaing"]
		);

		if ($_GET["utm_campaing"] == 3) {
			$this->load->view('Traslado/Prospecto/Index', $dato);
		} else {
			$this->load->view('Traslado/Prospecto/Index', $dato);
		}
	}

	public function hora(){
		date_default_timezone_set("America/Lima");
		echo date("H:i");
	}

	public function contar_dias()
	{
		$fecha_minima="";
		$contador=0;
		if($_GET["fecha_recurrente"]!=""){
			$mods=explode(",",$_GET["fecha_recurrente"]);
			$fecha_minima=min($mods)."<br>";
			$contador=count($mods);
		}
		$dato=array(
			'fecha_minima'=>$fecha_minima,
			'contador'=>$contador
		);
		echo json_encode($dato);
	}
}
