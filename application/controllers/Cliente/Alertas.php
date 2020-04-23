<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alertas extends CI_Controller
{
	public function Index()
	{
		echo "<strong>Por Ahora no cuenta con Alertas :)</strong>";
	}

	public function Cotizacion()
	{
		$this->load->view("Cliente/Alertas/Cotizacion/Index");
	}
}
