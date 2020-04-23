<?php
class Prospecto_model extends CI_Model
{
	public function list_view($busqueda="")
	{
		$this->db->select("count(prospecto.idprospecto) as contador,
							prospecto.idprospecto, 
							prospecto.nombre, 
							prospecto.apellido, 
							prospecto.correo, 
							prospecto.fecha_registro,
							prospecto.hora_registro,
							prospecto.telf_fijo, 
							prospecto.telf_movil, 
							propietario.nombre as propietario,
							estado_prospecto.nombre as estado,
							producto.nombre as producto,
							producto.idproducto,
							utm_source.utm_name,
							utm_source.utm_icon, 
							estado_prospecto.stylo as estilo");
		$this->db->from("prospecto");
		$this->db->where('prospecto.idestado_prospecto!=',5);
		$this->db->where('prospecto.idestado_prospecto!=',2);
		$this->db->like('prospecto.nombre',$busqueda);
		$this->db->join("estado_prospecto","prospecto.idestado_prospecto = estado_prospecto.idestado_prospecto","LEFT");
		$this->db->join("propietario","prospecto.idpropietario = propietario.idpropietario","LEFT");
		$this->db->join("producto","prospecto.idproducto = producto.idproducto","LEFT");
		$this->db->join("utm_source","prospecto.utm_name = utm_source.utm_name","LEFT");
		$this->db->group_by("prospecto.idprospecto");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function store($prospecto)
	{
		$this->db->INSERT("prospecto", $prospecto);
		return $this->db->insert_id();
	}

	public function store_details($detail_prospecto)
	{
		$respuesta=$this->db->INSERT("detalle_prospecto", $detail_prospecto);
		return $respuesta;
	}

	public function history_store($prospecto)
	{
		$resultado=$this->db->INSERT("history_prospecto", $prospecto);
		return $resultado;
	}

	public function view($idprospecto)
	{
		$this->db->select('prospecto.idprospecto, 
							prospecto.nombre, 
							prospecto.apellido, 
							prospecto.correo, 
							prospecto.telf_fijo, 
							prospecto.telf_movil, 
							prospecto.idsede_recojo, 
							prospecto.origen,
							prospecto.destino,
							prospecto.fecha_origen,
							DATE_FORMAT(prospecto.hora_origen,"%H:%i") as hora_origen,
							prospecto.fecha_retorno,
							prospecto.hora_retorno,
							sede_recojo.nombre as recojo, 
							prospecto.fecha_recojo, 
							DATE_FORMAT(prospecto.hora_recojo,"%H:%i") as hora_recojo,
							prospecto.precio_total,
							prospecto.precio_distancia,
							prospecto.descuento1,
							prospecto.descuento2,
							prospecto.utm_name,
							prospecto.idestado_prospecto, 
							sede_entrega.nombre as entrega,
							prospecto.idsede_entrega, 
							prospecto.fecha_entrega,
							prospecto.recurrente,
							prospecto.con_retorno,
							propietario.nombre as propietario,
							prospecto.idpropietario,
							estado_prospecto.disabled,
							estado_prospecto.enabled,
							prospecto.hora_entrega');
		$this->db->from('prospecto');
		$this->db->where('prospecto.idprospecto',$idprospecto);
		$this->db->join('sede as sede_recojo','prospecto.idsede_recojo = sede_recojo.idsede','LEFT');
		$this->db->join('sede as sede_entrega','prospecto.idsede_entrega = sede_entrega.idsede','LEFT');
		$this->db->join('estado_prospecto','prospecto.idestado_prospecto = estado_prospecto.idestado_prospecto');
		$this->db->join("propietario","prospecto.idpropietario = propietario.idpropietario","LEFT");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function view_traslados($idprospecto)
	{
		$this->db->select('*');
		$this->db->from("prospecto");
		$this->db->where("prospecto.idprospecto",$idprospecto);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function detail_view($idprospecto)
	{
		$this->db->select('detalle_prospecto.idprospecto, 
							tipo_auto.idtipo_auto, 
							tipo_auto.nombre');
		$this->db->from('detalle_prospecto');
		$this->db->where('detalle_prospecto.idprospecto',$idprospecto);
		$this->db->join('tipo_auto','detalle_prospecto.idtipo_auto = tipo_auto.idtipo_auto');
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function edit($idprospecto,$prospecto){
		$this->db->WHERE('idprospecto',$idprospecto);
		$resultado=$this->db->UPDATE('prospecto',$prospecto);

		return $resultado;
	}

}
