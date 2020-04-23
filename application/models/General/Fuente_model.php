<?php
class Fuente_model extends CI_Model
{


	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("utm_source");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
