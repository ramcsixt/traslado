<?php
class Flota_model extends CI_Model
{

	public function list_view()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$this->db->select('*');
		$this->db->from('flota');
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function num_flota()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$number=$this->db->query("select count(*) as number from flota")->row()->number;
		return intval($number);
	}

	public function get_pagination($number_per_page)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		return $this->db->get("flota",$number_per_page,$this->uri->segment(3));
	}

	public function duplicate($fecha_registro)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$this->db->select('count(idflota) as contador');
		$this->db->from('flota');
		$this->db->where('fecha_registro',$fecha_registro);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($flota)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$respuesta=$this->db->INSERT("flota", $flota);
		return $respuesta;
	}
}
