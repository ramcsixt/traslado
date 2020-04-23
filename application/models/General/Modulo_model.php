<?php
class Modulo_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function list_view($state="")
	{
		$this->db->select('*');
		$this->db->from("modulo");
		if($state!=""){
			$this->db->where("idestado", $state);
		}else{
			$this->db->where("idestado", 1);
		}
		$consulta = $this->db->get();

		$resultado = $consulta->result();
		return $resultado;
	}
}
