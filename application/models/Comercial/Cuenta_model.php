<?php
class Cuenta_model extends CI_Model
{
	public function list_view($busqueda)
	{
		$this->db->select("	cuenta.nombre, 
							cuenta.apellido, 
							tipo_cuenta.nombre as tipo_cuenta, 
							cuenta.razon_social, 
							cuenta.correo, 
							cuenta.direccion, 
							cuenta.telefono, 
							cuenta.celular, 
							cuenta.f_nacimiento, 
							cuenta.idestado, 
							concat(usuario.nombre,' ',usuario.apellido) as usuario,
							utm_source.utm_name,
							utm_source.utm_icon,
							cuenta.nro_documento, 
							cuenta.idcuenta");
		$this->db->from("cuenta");
		$this->db->where("cuenta.idestado", 1);
		$this->db->like("cuenta.nombre",$busqueda);
		$this->db->or_like("cuenta.razon_social",$busqueda);
		$this->db->join("tipo_cuenta","cuenta.idtipo_cuenta = tipo_cuenta.idtipo_cuenta","LEFT");
		$this->db->join("utm_source","cuenta.utm_name = utm_source.utm_name","LEFT");
		$this->db->join("usuario","cuenta.idusuario = usuario.idusuario","LEFT");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function view($idcuenta)
	{
		$this->db->select("cuenta.nombre, 
							cuenta.apellido, 
							tipo_cuenta.nombre as tipo_cuenta, 
							cuenta.razon_social, 
							cuenta.idtipo_documento,
							cuenta.correo, 
							cuenta.direccion, 
							cuenta.telefono, 
							cuenta.celular, 
							cuenta.f_nacimiento, 
							cuenta.idestado, 
							concat(usuario.nombre,' ',usuario.apellido) as propietario,
							cuenta.nro_documento, 
							cuenta.idcuenta");
		$this->db->from("cuenta");

		$this->db->where("cuenta.idcuenta", $idcuenta);
		$this->db->join("tipo_cuenta","cuenta.idtipo_cuenta = tipo_cuenta.idtipo_cuenta","LEFT");
		$this->db->join("usuario","cuenta.idusuario = usuario.idusuario","LEFT");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function contacto($idcuenta)
	{
		$this->db->select("*");
		$this->db->from("cuenta");
		$this->db->where("cuenta.idcuenta", $idcuenta);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($cuenta)
	{
		$this->db->INSERT("cuenta", $cuenta);
		return $this->db->insert_id();
	}

	public function update($idcuenta,$cuenta)
	{
		$this->db->where("idcuenta",$idcuenta);
		$resultado=$this->db->UPDATE("cuenta",$cuenta);

		return $resultado;
	}

	public function count_contacto($idcuenta)
	{
		$this->db->SELECT("count(idcontacto) as contador");
		$this->db->from("contacto");
		$this->db->where("idcuenta",$idcuenta);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
}
