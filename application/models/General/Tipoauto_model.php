<?php

class Tipoauto_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("tipo_auto");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
