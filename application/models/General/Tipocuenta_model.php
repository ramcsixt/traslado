<?php

class Tipocuenta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("tipo_cuenta");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function option_view($idtipo_cuenta)
	{
		$this->db->select("*");
		$this->db->from("tipo_documento");
		$this->db->where("tipo_documento.idtipo_cuenta", $idtipo_cuenta);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
