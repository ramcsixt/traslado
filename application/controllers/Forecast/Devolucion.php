<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Devolucion extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		header("Location: ".base_url("Devolucion/Principal"));
	}

	public function Principal()
	{
		$this->load->library('pagination');
		$this->load->model(array(
			"Sistema/Devolucion_model",
			"Sistema/Branch_model",
			'Seguridad/Usuario_model'
		));
		$this->load->view("Devolucion/Principal/Head");


		$config['base_url']=base_url().'Devolucion/Principal/';
		$config['total_rows']=$this->Devolucion_model->num_reservation();
		$config['per_page']=20;
		$config['uri_segment']=3;
		$config['num_links']=5;


		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link preload_page">';
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
		$result=$this->Devolucion_model->get_pagination($config['per_page']);
		$dato['devolucion']=$result;
		$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['branch']=$this->Branch_model->list_view();
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Devolucion/Principal/Content",$dato);
		$this->load->view("Devolucion/Footer",$dato);
	}

	public function Upload()
	{
		$this->load->model(array(
			'Sistema/Branch_model'
		));

		$dato = array(
			'sede' => $this->Branch_model->upload_reservas()
		);

		$this->load->view("Devolucion/Upload", $dato);
	}
	public function Read_json()
	{
		$this->load->model(array(
			'Sistema/Devolucion_model',
			'Sistema/Jsondevolucion_model'
		));
		// IP compartido
		$ip_compartido=$_SERVER['HTTP_CLIENT_IP'];
		// IP Proxy
		$ip_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];
		// IP Acceso
		$ip_usuario=$_SERVER['REMOTE_ADDR'];

		date_default_timezone_set("America/Lima");
		$fecha=date("Y-m-d");
		$hora_registro=date("H:i");
		$nombre=$_POST["branch"].$fecha.$hora_registro;
		$nombre_json=md5($_POST["branch"]);
		if($_FILES['file_json']['type']=="application/json"){
			move_uploaded_file($_FILES['file_json']['tmp_name'],
				"resource/Upload/json/devolucion/" . $nombre_json.".json");
			set_time_limit(1600);
			$data = file_get_contents("resource/Upload/json/devolucion/" . $nombre_json.".json");
			$ruta="resource/Upload/json/reserva/".$nombre_json.".json";
			$station = json_decode($data, true);
			$json=array(
				'nombre'=>$nombre,
				'ruta'=>$ruta,
				'idusuario'=>$this->session->userdata('idusuario'),
				'idbranch'=>$_POST["branch"],
				'fecha'=>$fecha,
				'hora'=>$hora_registro,
				'ipproxy'=>$ip_proxy,
				'ipcompartido'=>$ip_compartido,
				'ipusuario'=>$ip_usuario
			);
			$idjson=$this->Jsondevolucion_model->store($json);

			foreach ($station as $stat => $value) {

				if($stat=="rec"){
					foreach($value as $val){

						$rental_number=$val["rental_number"];

						$cont=$this->Devolucion_model->duplicate($rental_number);

						$contador=$cont->contador;

						$hora = strtotime($val["rti"] );
						$hor=date("g:i", $hora);

						$pick_uda= strtotime($val["uda"] );
						$pick_udadate=date("Y-m-d", $pick_uda);

						$drop_rda= strtotime($val["rda"] );
						$dropoff_date=date("Y-m-d", $drop_rda);

						$devolucion=array(
							'vehicle_plate_number'=>$val["amt"],
							'vehicle_model'=>$val["desc"],
							'rental_number'=>$val["mvnr"],

							'pick_up_branch_code'=>$val["uci"],
							'pick_up_date'=>$pick_udadate,
							'drop_off_date'=>$dropoff_date,
							'drop_off_hour'=>$hor,
							'vehicle_acriss'=>$val["grp"],
							'rate'=>$val["prl"],
							'return_time_update'=>'',
							'fecha_registro'=>$fecha,
							'hora_registro'=>$hora_registro,
							'idjson_devoluciones'=>$idjson
						);
						if($contador==0){
							$respuesta=$this->Devolucion_model->store($devolucion);
						}

					}
				}


			}
			redirect("Devolucion");
		}else{
			echo "Error esta intentando subir un tipo de archivo diferente";
		}
	}
	public function Read_json_2()
	{
		$this->load->model(array(
			'Sistema/Branch_model'
		));
		date_default_timezone_set("America/Lima");
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		if($_FILES['file_json']['type']=="application/json"){
			move_uploaded_file($_FILES['file_json']['tmp_name'],
				"resource/Upload/json/" . $_FILES['file_json']['name']);
			set_time_limit(1600);
			$data = file_get_contents("resource/Upload/json/devolucion/".$_FILES['file_json']['name']);
			$station = json_decode($data, true);
			foreach ($station as $stat => $value) {
				if($stat=="rec"){
					foreach($value as $val => $olue){
						if($val=="out"){
							foreach($olue as $vl => $ll){
								if($vl=="ele"){
									foreach($ll as $json){
										$number_reserva=$json["resn"];
										$cont=$this->Branch_model->duplicate($number_reserva);
										$contador=$cont->contador;
										$reserva=array(
											'reservation_number'=>$json["resn"],
											'status'=>$json["status"],
											'pick_up_branch_code'=>$json["uci"],

											'pick_up_date'=>$json["uda"],
											'pick_up_hour'=>$json["uti"],
											'drop_off_date'=>$json["rda"],
											'drop_off_hour'=>$json["rti"],
											'drop_off_branch_code'=>$json["rci"],

											'vehicle_acriss'=>$json["grp"],
											'rate'=>$json["prl"],
											'reservation_time_update'=>'',
											'fecha_registro'=>$fecha,
											'hora_registro'=>$hora
										);
										if($contador==0){
											$respuesta=$this->Branch_model->store($reserva);
										}
									}
								}

							}
						}
					}
				}


			}
			redirect("Reserva");
		}else{
			echo "Error esta intentando subir un tipo de archivo diferente";
		}
	}
	Public Function Json()
	{
		header("Location: ".base_url('Devolucion/Content_json'));
	}

	Public Function Content_json()
	{

		$this->load->library('pagination');

		$this->load->model(array(
			"Sistema/Jsondevolucion_model",
			"Sistema/Branch_model",
			'Seguridad/Usuario_model'
		));

		$this->load->view("Devolucion/Json/Head");

		$config['base_url']=base_url().'Devolucion/Content_json/';
		$config['total_rows']=$this->Jsondevolucion_model->num_reservation();
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
		$result=$this->Jsondevolucion_model->get_pagination($config['per_page']);
		$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['json_devolucion']=$result;
		$dato['branch']=$this->Branch_model->list_view();
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Devolucion/Json/Content",$dato);
		$this->load->view("Devolucion/Footer");
	}
}
