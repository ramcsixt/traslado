<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function Index()
	{
		$this->load->view('Dashboard/Index');
	}
}
