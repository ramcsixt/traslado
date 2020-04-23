<?php
require_once APPPATH.'controllers/Login.php';
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Dashboard extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logueado')){
			redirect('/');
		}
	}
	public function Index()
	{
		$this->load->view('Comercial/Dashboard/Index');
	}
}
