<?php
class Oportunidad_model extends CI_Model
{
	public function list_view($idcuenta="")
	{
		$this->db->select("oportunidad.idoportunidad, 
							oportunidad.nombre as nom_oportunidad, 
							tipo_oportunidad.nombre as tipo_oportunidad, 
							oportunidad.fecha_in, 
							oportunidad.hora_in, 
							concat(cuenta.nombre) as cuenta,
							cuenta.razon_social,
							oportunidad.identrega,
							oportunidad.idrecojo, 
							concat(usuario.nombre,' ',usuario.apellido) as propietario,
							concat(contacto.nombre,' ',contacto.apellido) as contacto, 
							etapa_oportunidad.nombre as estapa_oportunidad");
		$this->db->from("oportunidad");
		if($idcuenta!="") {
			$this->db->where("oportunidad.idcuenta", $idcuenta);
		}
		$this->db->where("oportunidad.idestado",1);
		$this->db->join("tipo_oportunidad","oportunidad.idtipo_oportunidad = tipo_oportunidad.idtipo_oportunidad");
		$this->db->join("etapa_oportunidad","oportunidad.idetapa_oportunidad = etapa_oportunidad.idetapa_oportunidad");
		$this->db->join("cuenta","oportunidad.idcuenta = cuenta.idcuenta","LEFT");
		$this->db->join("contacto","oportunidad.idcontacto = contacto.idcontacto AND
		cuenta.idcuenta = contacto.idcuenta","LEFT");
		$this->db->join("usuario","cuenta.idusuario = usuario.idusuario","LEFT");
	//	$this->db->join("tipo_cuenta", "cuenta.idtipo_cuenta = tipo_cuenta.idtipo_cuenta", "LEFT");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function store($oportunidad)
	{
		$this->db->INSERT("oportunidad", $oportunidad);
		return $this->db->insert_id();
	}

	public function view($idoportunidad)
	{
		$this->db->SELECT("	oportunidad.idoportunidad, 
							oportunidad.nombre, 
							oportunidad.idtipo_oportunidad, 
							oportunidad.fecha_in, 
							oportunidad.hora_in, 
							oportunidad.idusuario, 
							oportunidad.idcuenta, 
							oportunidad.idcontacto, 
							oportunidad.idestado, 
							oportunidad.idetapa_oportunidad, 
							oportunidad.idrecojo,
							recojo.nombre as pickout,	
							oportunidad.fecha_recojo, 
							oportunidad.hora_recojo, 
							oportunidad.identrega, 
							entrega.nombre as dropoff,
							oportunidad.fecha_entrega,
							tipo_auto.nombre as tipo_auto, 
							oportunidad.hora_entrega");
		$this->db->FROM("oportunidad");
		$this->db->WHERE("idoportunidad",$idoportunidad);
		$this->db->JOIN("sede as entrega","oportunidad.identrega = entrega.idsede");
		$this->db->JOIN("sede as recojo","oportunidad.idrecojo = recojo.idsede");
		$this->db->JOIN("tipo_auto","oportunidad.idtipo_auto = tipo_auto.idtipo_auto");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function view_detail($idoportunidad)
	{
		$this->db->SELECT("detalle_oportunidad.iddetalle_oportunidad,
							tipo_auto.nombre as tipo_auto");
		$this->db->FROM("detalle_oportunidad");
		$this->db->WHERE("detalle_oportunidad.idoportunidad",$idoportunidad);
		$this->db->JOIN("tipo_auto","detalle_oportunidad.idtipo_auto = tipo_auto.idtipo_auto");
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}

	public function store_details($detail_oportunidad)
	{
		$resultado=$this->db->INSERT("detalle_oportunidad", $detail_oportunidad);
		return $resultado;
	}

	public function update($idoportunidad,$oportunidad)
	{
		$this->db->where("idoportunidad",$idoportunidad);
		$resultado=$this->db->UPDATE("oportunidad",$oportunidad);

		return $resultado;
	}
}
