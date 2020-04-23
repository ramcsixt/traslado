<?php
class Estadoprospecto_model extends CI_Model
{
	public function list_view()
	{
		$this->db->select("*");
		$this->db->from("estado_prospecto");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
