<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Traslados extends CI_Controller
{

	public function Send()
	{
		date_default_timezone_set("America/Lima");
		$fecha_registro=date("Y-m-d");
		$hora_registro=date("H:i");

		$ip_compartido=$_SERVER['HTTP_CLIENT_IP'];
		$ip_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];
		$ip_usuario=$_SERVER['REMOTE_ADDR'];

		if($ip_usuario!=""){
			$ippublica=$ip_usuario;
		}else if($ip_compartido!=""){
			$ippublica=$ip_compartido;
		}else{
			$ippublica=$ip_proxy;
		}


		$this->load->model(array(
			'Sistema/Mailer_model'
		));
	//	$idprospecto=$_GET["idprospecto"];
		$correo = $_GET["correo"];
		$idprospecto = $_GET["idprospecto"];
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = true;
		$mail->Username = 'german.torres@sixt.com.pe';
		$mail->Password = 'J4c1$14dm1n';
		$mail->setFrom('crm@sixtperu.pe', 'CRM');
		//Set an alternative reply-to address
		$mail->addReplyTo('crm@sixtperu.pe', 'CRM');

		//Set who the message is to be sent to
		$mail->addAddress($correo);

		//Set the subject line
		$mail->Subject = 'Solicitud de Traslado';

		$mail->msgHTML(file_get_contents(base_url()."/Mailer/Traslados/Datos_send?idprospecto=".$idprospecto));

		if ($mail->send()) {
			$correo=array(
				'tipo_envio'=>"Registro de Prospecto",
				'ip_publica'=>$ippublica,
				'idusuario'=>17,
				'estado'=>1,
				'fecha_registro'=>$fecha_registro,
				'hora_registro'=>$hora_registro,
				'correo'=>$_GET["correo"]
			);
			$this->Mailer_model->store($correo);
			echo 1;
		} else {
			$correo=array(
				'tipo_envio'=>"Registro de Prospecto",
				'ip_publica'=>$ippublica,
				'idusuario'=>17,
				'estado'=>2,
				'fecha_registro'=>$fecha_registro,
				'hora_registro'=>$hora_registro,
				'correo'=>$_GET["correo"]
			);
			$this->Mailer_model->store($correo);
			echo 0;
		}
	}

	public function Datos_send()
	{
		$idprospecto=$_GET["idprospecto"];
		$this->load->model(array(
			'Comercial/Prospecto_model'
		));

		$dato=array(
			'prospecto'=>$this->Prospecto_model->view_traslados($idprospecto)
		);

		$this->load->view("Mailer/Send_traslado",$dato);
	}
}
