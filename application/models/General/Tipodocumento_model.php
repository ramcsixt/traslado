<?php

class Tipodocumento_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_view()
	{
		$this->db->select('*');
		$this->db->from("tipo_documento");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function option_view($idtipo_documento)
	{
		$this->db->select("tipo_documento.nombre,
							tipo_documento.caracteres,
							tipo_documento.placeholder,
							tipo_documento.cantidad_input,
							tipo_documento.input_f_nacimiento,
							GROUP_CONCAT( DISTINCT opciones_tipo_documento.nombre, '#', opciones_tipo_documento.`name`,'#', opciones_tipo_documento.placeholder  ORDER BY opciones_tipo_documento.nombre desc  SEPARATOR '@' ) AS inputs");
		$this->db->from("enlace_td");
		$this->db->where("tipo_documento.idtipo_documento",$idtipo_documento);
		$this->db->join("opciones_tipo_documento","enlace_td.idopciones_tipo_documento = opciones_tipo_documento.idopciones_tipo_documento");
		$this->db->join("tipo_documento","enlace_td.idtipo_documento = tipo_documento.idtipo_documento");
		$this->db->group_by("tipo_documento.idtipo_documento");
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function option_store($idtipo_documento)
	{
		$this->db->select("enlstore_tipo_documento.idtipo_documento, 
							opcstore_tipodocumento.nombre");
		$this->db->from("enlstore_tipo_documento");
		$this->db->where("enlstore_tipo_documento.idtipo_documento",$idtipo_documento);
		$this->db->join("opcstore_tipodocumento","enlstore_tipo_documento.idopcstore_tipodocumento = opcstore_tipodocumento.idopcstore_tipodocumento");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
