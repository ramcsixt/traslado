<?php
class Rol_model extends CI_Model {


	public function list_view($idusuario)
	{
		$this->db->select('	modulo.idmodulo,
							modulo.nombre,
							modulo.url,
							modulo.idestado,
							modulo.icono');
		$this->db->from("modulo");
		$this->db->where("not exists(SELECT rol.idmodulo from rol where modulo.idmodulo = rol.idmodulo and rol.idusuario = ".$idusuario.")");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function modulos_disponibles($idusuario)
	{
		$this->db->select("	modulo.idmodulo, 
							modulo.nombre, 
							modulo.url, 
							modulo.idestado, 
							modulo.icono,
							rol.idrol, 
							rol.idusuario");
		$this->db->from("modulo");
		$this->db->where("rol.idusuario",$idusuario);
		$this->db->join("rol","modulo.idmodulo = rol.idmodulo");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;

	}

	public function store($rol)
	{
		$resultado=$this->db->INSERT("rol",$rol);
		return $resultado;
	}

	public function delete($idrol)
	{
		$this->db->WHERE("idrol",$idrol);
		$resultado=$this->db->DELETE("rol");
		return $resultado;
	}

}
