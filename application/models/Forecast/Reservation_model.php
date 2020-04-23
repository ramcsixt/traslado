<?php
class Reservation_model extends CI_Model
{

	public function list_view()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		$DB2->select("reservas.reservation_number, 
							reservas.`status`, 
							concat(branch_pickup.nombre,' ','(',branch_pickup.ciudad,')') as name_branch_pinckup, 
							reservas.pick_up_date, 
							reservas.pick_up_hour, 
							concat(branch_dropoff.nombre,' ','(',branch_dropoff.ciudad,')') as name_branch_dropoff, 
							reservas.drop_off_date, 
							reservas.drop_off_hour, 
							reservas.vehicle_acriss, 
							reservas.rate");
		$DB2->from('reservas');
		$DB2->join("branch as branch_pickup","reservas.pick_up_branch_code = branch_pickup.idbranch");
		$DB2->join("branch as branch_dropoff","reservas.drop_off_branch_code = branch_dropoff.idbranch");
		$consulta = $DB2->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function num_reservation()
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		//	$this->db->get("reservas")->num_rows();
			$number=$DB2->query("select count(*) as number from reservas")->row()->number;
			return intval($number);
	}

	public function get_pagination($number_per_page)
	{
		$ci=&get_instance();
		$DB2 = $this->bi=$ci->load->database('bi', TRUE);
		return $DB2->get("reservas",$number_per_page,$this->uri->segment(3));
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
