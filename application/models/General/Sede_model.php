<?php
class Sede_model extends CI_Model
{


	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("sede");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function sede_pais()
	{
		$this->db->simple_query('SET SESSION group_concat_max_len=1000000');
		$this->db->select("tipo_sede.nombre as tipo_sede,
							GROUP_CONCAT( DISTINCT sede.idsede, '#', pais.nombre, '#', sede.nombre, '#', sede.ciudad SEPARATOR '@' ) AS sedes");
		$this->db->from("sede");
		//$this->db->where("sede.pais",$pais);
		$this->db->join("tipo_sede","sede.idtipo_sede = tipo_sede.idtipo_sede");
		$this->db->join("pais","sede.pais = pais.abreviatura");
		$this->db->group_by("tipo_sede.idtipo_sede");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
