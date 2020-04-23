<?php
class Usuario_model extends CI_Model {

	public function list_view($state="")
{
	$this->db->select("	usuario.idusuario,
							usuario.nombre,
							usuario.apellido,
							usuario.username,
							usuario.`password`,
							usuario.idcargo,
							usuario.idestado,
							usuario.f_nacimiento,
							usuario.correo,
							usuario.idtipo_tabla,
							usuario.idsexo,
							GROUP_CONCAT( DISTINCT rol.idrol, '#', modulo.nombre SEPARATOR '@' ) AS roles ");
	$this->db->from("usuario");
	if($state!="") {
		$this->db->where("usuario.idestado", $state);
	}else{
		$this->db->where("usuario.idestado", 1);
	}
	$this->db->join("rol","usuario.idusuario = rol.idusuario","LEFT");
	$this->db->join("modulo","rol.idmodulo = modulo.idmodulo","LEFT");
	$this->db->group_by("usuario.idusuario");
	$consulta = $this->db->get();
	$resultado = $consulta->result();
	return $resultado;
}

	public function duplicate($campo,$correo)
	{
		$this->db->select("count(us.idusuario) as contador");
		$this->db->from("usuario as us");
		$this->db->where($campo,$correo);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function store($usuario)
	{
		$this->db->INSERT("usuario",$usuario);
		return $this->db->insert_id();
	}

	public function view($idusuario)
	{
		$this->db->select('*');
		$this->db->from("usuario as us");
		$this->db->where("us.idusuario",$idusuario);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	//Edita Datos, Actualiza Contraseña y Elimina Usuarios dependiendo la funciona asignada esde el controlador
	public function update($idusuario,$usuario)
	{
		$this->db->where("idusuario",$idusuario);
		$consulta=$this->db->update("usuario",$usuario);
		return $consulta;
	}

	public function sesion($correo)
	{
		$this->db->select('*,count(idusuario) as contador');
		$this->db->from('usuario');
		$this->db->where('correo', $correo);
		$this->db->group_by("usuario.idusuario");
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
}
