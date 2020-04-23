<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Dashboard extends CI_Controller
{

	public function Index()
	{
		$this->load->view('Configuracion/Dashboard/Index');
	}
}
