<?php
class Mailer_model extends CI_Model
{
	public function store($correo)
	{
		$resultado=$this->db->INSERT("mailer", $correo);
		return $resultado;
	}
}
