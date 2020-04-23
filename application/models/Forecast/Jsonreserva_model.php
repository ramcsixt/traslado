<?php
class Jsonreserva_model extends CI_Model
{

	public function num_reservation()
	{
		//	$this->db->get("reservas")->num_rows();
		$number=$this->db->query("select count(*) as number from json_reservas")->row()->number;
		return intval($number);
	}

	public function get_pagination($number_per_page)
	{
		return $this->db->get("json_reservas",$number_per_page,$this->uri->segment(3));
	}
	public function store($json)
	{
		$this->db->INSERT("json_reservas", $json);
		return $this->db->insert_id();
	}
}
