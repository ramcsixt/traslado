<?php
class Busqueda_model extends CI_Model
{

	public function Cuenta($cliente)
	{
		$this->db->SELECT("*,
							count( idcuenta ) AS contador");
		$this->db->FROM("cuenta");
		$this->db->like('cuenta.nombre',$cliente);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function similares($nombre,$correo,$movil)
	{
		$this->db->SELECT("*,
							count( idcuenta ) AS contador");
		$this->db->FROM("cuenta");
		$this->db->like('cuenta.nombre',$nombre);
		$this->db->or_like('cuenta.correo',$correo);
		$this->db->or_like('cuenta.celular',$movil);
		$this->db->group_by("cuenta.idcuenta");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function Prospecto($cliente)
	{
		$this->db->SELECT("*");
		$this->db->FROM("prospecto");
		$this->db->like('CONCAT(cuenta.nombre," ",cuenta.apellido)',$cliente);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
