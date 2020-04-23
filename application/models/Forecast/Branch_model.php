<?php

class Branch_model extends CI_Model
{

	public function upload_reservas()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);

		$DB2->select('*');
		$DB2->from('branch');
		$DB2->where('pais', 'PE');
		$consulta = $DB2->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function list_view()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select('*');
		$DB2->from('branch');
		$consulta = $DB2->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function duplicate($number_reserva)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select('count(idreservas) as contador');
		$DB2->from('reservas');
		$DB2->where('reservation_number',$number_reserva);
		$consulta = $DB2->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($reserva)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$respuesta=$DB2->INSERT("reservas", $reserva);
		return $respuesta;
	}
}
