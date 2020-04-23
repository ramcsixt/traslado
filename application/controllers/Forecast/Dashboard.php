<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Dashboard extends CI_Controller
{

	public function Index()
	{
		$this->load->view("Forecast/Layout/General");
		$this->load->view('Forecast/Dashboard/Index');
		$this->load->view("Forecast/Footer");
	}
}
