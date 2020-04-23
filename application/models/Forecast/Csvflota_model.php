<?php
class Csvflota_model extends CI_Model
{

	public function num_csvflota()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$number=$DB2->query("select count(*) as number from json_flota")->row()->number;
		return intval($number);
	}
	public function get_pagination($number_per_page)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		return $DB2->get("json_flota",$number_per_page,$this->uri->segment(3));
	}

	public function duplicate($fecha_registro)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select("count(idjson_flota) as contador");
		$DB2->from("json_flota");
		$DB2->where("fecha",$fecha_registro);
		$consulta = $DB2->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($json)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->INSERT("json_flota", $json);
		return $DB2->insert_id();
	}
}
