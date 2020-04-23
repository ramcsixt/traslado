<?php
class Hora_model extends CI_Model
{


	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("hora");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
