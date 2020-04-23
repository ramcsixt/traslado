<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Datos extends CI_Controller
{

	public function Index()
	{
		$this->load->view("QR/Index");
	}
}
