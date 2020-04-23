<?php
class Devolucion_model extends CI_Model
{

	public function list_view()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select('*');
		$DB2->from('devoluciones');
		$consulta = $DB2->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function num_reservation()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$number=$DB2->query("select count(*) as number from devoluciones")->row()->number;
		return intval($number);
	}

	public function get_pagination($number_per_page)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		return $DB2->get("devoluciones",$number_per_page,$this->uri->segment(3));
	}

	public function duplicate($rental_number)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select('count(iddevoluciones) as contador');
		$DB2->from('devoluciones');
		$DB2->where('rental_number',$rental_number);
		$consulta = $DB2->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($devolucion)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$respuesta=$DB2->INSERT("devoluciones", $devolucion);
		return $respuesta;
	}
}
