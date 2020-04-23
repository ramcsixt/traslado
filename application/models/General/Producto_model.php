<?php
class Producto_model extends CI_Model
{


	public function list_view($idproducto="")
	{
		$this->db->select('*');
		$this->db->from("producto");
		if($idproducto!="") {
			$this->db->where("producto.idproducto", $idproducto);
		}
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}
}
