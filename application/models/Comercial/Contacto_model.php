<?php
class Contacto_model extends CI_Model
{

	public function list_view($idcuenta="",$state="")
	{
		$this->db->SELECT("*");
		$this->db->FROM("contacto");
		if($idcuenta!=""){
			$this->db->WHERE("idcuenta",$idcuenta);
		}
		if($state!=""){
			$this->db->WHERE("idestado",$state);
		}
		$this->db->where("idestado",1);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function sesion($correo)
	{
		$this->db->select('*,count(idcontacto) as contador');
		$this->db->from('contacto');
		$this->db->where('correo', $correo);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function view($idcontacto)
	{
		$this->db->select("*");
		$this->db->from("contacto");
		$this->db->where("idcontacto",$idcontacto);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function update($idcontacto,$contacto)
	{
		$this->db->where("idcontacto",$idcontacto);
		$resultado=$this->db->UPDATE("contacto",$contacto);
		return $resultado;
	}

	public function store($contacto)
	{
		$this->db->INSERT("contacto", $contacto);
		return $this->db->insert_id();
	}
}
