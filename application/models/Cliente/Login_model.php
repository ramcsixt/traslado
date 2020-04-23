<?php
class Login_model extends CI_Model {

	public function sesion($correo)
	{
		$this->db->select('*,count(idcontacto) as contador');
		$this->db->from('contacto');
		$this->db->where('correo', $correo);
		$this->db->group_by("contacto.idcontacto");
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
}
