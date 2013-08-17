<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Facturas_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

	public function enlazar_factura($id)
	{
		$res=$this->get_registro('fac_factura',array('fac_id_vista')=>$id);
		if($res==0) {
			$res2=$this->add_registro('fac_factura',array('fac_id_vista'=>$id, 'fac_id_usu'=>$this->tank_auth->get_user_id()));
		}
		else {
			$this->estado_factura($res,1);
		}
	}

	public function estado_factura($id,$est)
	{
		$this->add_registro('esf_estado_factura',array('fac_id_vista'=>$id, 'fac_id_usu'=>$this->tank_auth->get_user_id()));
	}

	public function add_registro($tabla,$campos)
	{
		$this->db->insert($tabla,$campos);
		return $this->db->affected_rows();
	}

   public function del_registro($tabla,$campos)
	{		
		$this->db->delete($tabla,$campos);
		return $this->db->affected_rows();	
	}   

   public function cargar_tabla($tabla)
   {   		
   		$this->db->select()			
		->from($tabla);
		$query=$this->db->get();				
		return $query->result_array();   	
   }

   public function get_tabla($tabla,$where=0)
   {
		$this->db->select();
		if($where!=0)
		$this->db->where($where);
		$this->db->from($tabla);			
		$query=$this->db->get();
		return $query->result_array();
   }
   
   public function get_registro($tabla,$where)
   {   		
		$this->db->select()
			->where($where)
			->from($tabla);			
		$query=$this->db->get();
		return $query->row_array();
   }

}
