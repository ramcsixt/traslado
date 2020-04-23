<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Reserva extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		header("Location: ".base_url('Forecast/Reserva/Principal'));
	}
	public function Principal()
	{

		$this->load->library('pagination');
		$this->load->model(array(
			"Forecast/Reservation_model",
			"Forecast/Branch_model"
		));
		$this->load->view("Forecast/Reserva/Principal/Head");


		$config['base_url']=base_url().'Forecast/Reserva/Principal/';
		$config['total_rows']=$this->Reservation_model->num_reservation();
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
		$result=$this->Reservation_model->get_pagination($config['per_page']);
		$dato['reserva']=$result;
		//$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['branch']=$this->Branch_model->list_view();
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Forecast/Reserva/Principal/List_view",$dato);
		$this->load->view("Forecast/Reserva/Footer",$dato);
	}

	public function Upload()
	{

		$this->load->model(array(
			'Forecast/Branch_model'
		));

		$dato = array(
			'sede' => $this->Branch_model->upload_reservas()
		);

		$this->load->view("Reserva/Upload", $dato);
	}

	public function Read_json()
	{
		$this->load->model(array(
			'Forecast/Reservation_model',
			'Forecast/Jsonreserva_model'
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
				"resource/Upload/json/reservas/" . $nombre_json.".json");
			set_time_limit(1600);
			$data = file_get_contents("resource/Upload/json/reservas/".$nombre_json.".json");
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
			$idjson=$this->Jsonreserva_model->Store($json);
			foreach ($station as $stat => $value) {
				if($stat=="rec"){
					foreach($value as $val => $olue){
						if($val=="out"){
							foreach($olue as $vl => $ll){
								if($vl=="ele"){
									foreach($ll as $json){
										$number_reserva=$json["resn"];
										$cont=$this->Reservation_model->duplicate($number_reserva);
										$contador=$cont->contador;

										//rti
										if(($json["rti"]<1000) && ($json["rti"]>100)){
											$hora="0".$json["rti"];
											$drop_off= strtotime($hora);
										}else if(($json["rti"]<100) && ($json["rti"]>=10)){
											$hora="00".$json["rti"];
											$drop_off= strtotime($hora);
										}else if(($json["rti"]<10) &&($json["rti"]>0)){
											$hora="000".$json["rti"];
											$drop_off= strtotime($hora);
										}else if($json["rti"]==0){
											$hora="000".$json["rti"];
											$drop_off= strtotime($hora);
										}else{
											$drop_off= strtotime($json["rti"]);
										}
										$drop=date("H:i", $drop_off);

										//uti
										if(($json["uti"]<1000) && ($json["uti"]>100)){
											$hora="0".$json["uti"];
											$pick_up= strtotime($hora);
										}else if(($json["uti"]<100) && ($json["uti"]>=10)){
											$hora="00".$json["uti"];
											$pick_up= strtotime($hora);
										}else if(($json["uti"]<10) &&($json["uti"]>0)){
											$hora="000".$json["uti"];
											$pick_up= strtotime($hora);
										}else if($json["uti"]==0){
											$hora="000".$json["uti"];
											$pick_up= strtotime($hora);
										}else{
											$pick_up= strtotime($json["uti"]);
										}
										$pick_up_hor=date("H:i", $pick_up);


										$pick_uda= strtotime($json["uda"] );
										$pick_udadate=date("Y-m-d", $pick_uda);

										$drop_rda= strtotime($json["rda"] );
										$dropoff_date=date("Y-m-d", $drop_rda);

										$reserva=array(
											'reservation_number'=>$json["resn"],
											'status'=>$json["status"],
											'pick_up_branch_code'=>$json["uci"],

											'pick_up_date'=>$pick_udadate,
											'pick_up_hour'=>$pick_up_hor,
											'drop_off_date'=>$dropoff_date,
											'drop_off_hour'=>$drop,
											'drop_off_branch_code'=>$json["rci"],

											'vehicle_acriss'=>$json["grp"],
											'rate'=>$json["prl"],
											'reservation_time_update'=>'',
											'fecha_registro'=>$fecha,
											'hora_registro'=>$hora_registro,
											'idjson_reservas'=>$idjson
										);
										if($contador==0){
											$respuesta=$this->Reservation_model->store($reserva);
										}
										$cantidad_registro=count($json["resn"]);
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
		header("Location: ".base_url('Reserva/Content_json'));
	}

	Public Function Content_json()
	{

		$this->load->library('pagination');

		$this->load->model(array(
			"Sistema/Jsonreserva_model",
			"Sistema/Branch_model",
			'Seguridad/Usuario_model'
		));

		$this->load->view("Reserva/Json/Head");

		$config['base_url']=base_url().'Reserva/Content_json/';
		$config['total_rows']=$this->Jsonreserva_model->num_reservation();
		$config['per_page']=10;
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
		$result=$this->Jsonreserva_model->get_pagination($config['per_page']);
		$dato["usuario"]=$this->Usuario_model->list_view();
		$dato['json_reserva']=$result;
		$dato['branch']=$this->Branch_model->list_view();
		$dato['paginacion']=$this->pagination->create_links();

		$this->load->view("Reserva/Json/Content",$dato);
		$this->load->view("Reserva/Footer");
	}
}
