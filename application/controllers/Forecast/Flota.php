<?php
require_once APPPATH.'controllers/Login.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Flota extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logueado')) {
			redirect('/');
		}
	}

	public function Index()
	{
		header("Location: " . base_url('Flota/Principal'));
	}

	Public function Principal()
	{
		$this->load->library('pagination');
		$this->load->model(array(
			"Sistema/Flota_model",
			"Sistema/Branch_model",
			'Seguridad/Usuario_model'
		));
		$this->load->view("Flota/Principal/Head");
		$config['base_url']=base_url().'Flota/Principal/';
		$config['total_rows']=$this->Flota_model->num_flota();
		$config['per_page']=20;
		$config['uri_segment']=3;
		$config['num_links']=5;


		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item "><span class="page-link preload_page">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active "><span class="page-link preload_page">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item "><span class="page-link preload_page">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item "><span class="page-link preload_page">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item "><span class="page-link preload_page">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item "><span class="page-link preload_page">';
		$config['last_tag_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$result=$this->Flota_model->get_pagination($config['per_page']);
		$dato['flota']=$result;
		$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['branch']=$this->Branch_model->list_view();
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Flota/Principal/Content",$dato);
		$this->load->view("Flota/Footer");
	}

	public function Upload()
	{
		$this->load->view("Flota/Upload");
	}


	Public function Read_csv()
	{
		date_default_timezone_set("America/Lima");
		$fecha_registro=date("Y-m-d");
		$hora_registro=date("H:i");
		$this->load->model(array(
			'Sistema/Flota_model',
			'Sistema/Csvflota_model'
		));
		// IP compartido
		$ip_compartido=$_SERVER['HTTP_CLIENT_IP'];
		// IP Proxy
		$ip_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];
		// IP Acceso
		$ip_usuario=$_SERVER['REMOTE_ADDR'];
		move_uploaded_file($_FILES['file_csv']['tmp_name'],
			"resource/Upload/csv/flota/" . $_FILES["file_csv"]["name"]);
		set_time_limit(1600);
		$nombre=$_FILES["file_csv"]["name"]."".$fecha_registro."".$hora_registro;
		$ruta="resource/Upload/csv/flota/".$_FILES['file_csv']['name'];
		$cont=$this->Csvflota_model->duplicate($fecha_registro);
		$contador=$cont->contador;

		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();

		$spreadsheet = $reader->load("resource/Upload/csv/flota/".$_FILES['file_csv']['name']);

		$sheetData = $spreadsheet->getActiveSheet()->toArray();

		$csv=array(
			'nombre'=>$nombre,
			'ruta'=>$ruta,
			'idusuario'=>$this->session->userdata('idusuario'),
			'idbranch'=>"",
			'fecha'=>$fecha_registro,
			'hora'=>$hora_registro,
			'cantidad_registros'=>"",
			'ipproxy'=>$ip_proxy,
			'ipcompartido'=>$ip_compartido,
			'ipusuario'=>$ip_usuario
		);
		$idjson=$this->Csvflota_model->store($csv);
		if($contador<1){
			foreach($sheetData as $val){
				if($val[9]=="Number of Vehicles"){

				}
				else if($val[9]>=4){

				}else{
					$flota=array(
						'branch_code'=>$val[0],
						'central_status'=>$val[1],
						'vehicle_status'=>$val[2],
						'type_short_version'=>$val[3],
						'vehicle_acriss'=>$val[4],
						'vin'=>$val[5],
						'internal_num'=>$val[6],
						'vehicle_plate_number'=>$val[7],
						'rate_subtype'=>$val[8],
						'number_of_vehicles'=>$val[9],
						'fecha_registro'=>$fecha_registro,
						'hora_registro'=>$hora_registro,
						'idjson_flota'=>$idjson
					);
					$respuesta=$this->Flota_model->store($flota);
				}
			}

		}
		redirect("Flota");
	}

	Public Function Csv()
	{
		header("Location: ".base_url('Flota/Content_csv'));
	}

	Public Function Content_csv()
	{

		$this->load->library('pagination');

		$this->load->model(array(
			"Sistema/Csvflota_model",
			'Seguridad/Usuario_model'
		));

		$this->load->view("Flota/Csv/Head");

		$config['base_url']=base_url().'Flota/Content_csv/';
		$config['total_rows']=$this->Csvflota_model->num_csvflota();
		$config['per_page']=10;
		$config['uri_segment']=3;
		$config['num_links']=5;


		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link preload_page">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link preload_page">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link preload_page">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link preload_page">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link preload_page">';
		$config['last_tag_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$result=$this->Csvflota_model->get_pagination($config['per_page']);
		$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['csv_flota']=$result;
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Flota/Csv/Content",$dato);
		$this->load->view("Flota/Footer");
	}
}
