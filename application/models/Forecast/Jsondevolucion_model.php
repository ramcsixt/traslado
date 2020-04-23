<?php
class Jsondevolucion_model extends CI_Model
{

	public function num_reservation()
	{
		//	$this->db->get("reservas")->num_rows();
		$number=$this->db->query("select count(*) as number from json_devoluciones")->row()->number;
		return intval($number);
	}

	public function get_pagination($number_per_page)
	{
		return $this->db->get("json_devoluciones",$number_per_page,$this->uri->segment(3));
	}
	public function store($json)
	{
		$this->db->INSERT("json_devoluciones", $json);
		return $this->db->insert_id();
	}
}
