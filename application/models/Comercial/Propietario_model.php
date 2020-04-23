<?php
class Propietario_model extends CI_Model
{
	public function list_view()
	{
		$this->db->select("*");
		$this->db->from("propietario");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
