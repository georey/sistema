<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Facturas_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

	public function enlazar_factura($id)
	{
		$res=$this->get_registro('fac_factura',array('fac_id_vista'=>$id));

		if(count($res)==0) {
			$res2=$this->add_registro('fac_factura',array('fac_id_vista'=>$id, 'fac_id_usu'=>$this->tank_auth->get_user_id()));
			return $res2;
		}
		else {
			$this->estado_factura($res['fac_id'],1);
			return 0;
		}		
	}

	public function estado_factura($id,$est)
	{
		$this->add_registro('esf_estado_factura',array('esf_id_fac'=>$id, 'esf_estado'=>$est, 'esf_id_usu'=>$this->tank_auth->get_user_id()));
		$this->mod_registro('fac_factura', array('fac_estado'=>$est),'fac_id', $id);
	}

	public function cargar_facturas_estado($est)
	{
		$this->db->select()			
			->from('fac_factura')
			->join('vw_lista','id=fac_id_vista')
			->where('fac_estado',$est);
			$query=$this->db->get();
		return $query->result_array();
	}

	public function cargar_facturas()
	{
		$facturas=$this->get_tabla('fac_factura',array('fac_estado'=>6));
		$facts = array();
		foreach ($facturas as $key) {
			$facts[]=$key['fac_id_vista'];
		}
		$this->db->select()			
			->from('vw_lista');
			if(count($facts)>0)
			$this->db->where_in('id',$facts);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function add_registro($tabla,$campos)
	{
		$this->db->insert($tabla,$campos);
		return $this->db->insert_id();
	}

	public function mod_registro($tabla,$cadena,$campo,$condicion)
	{
        $this->db->where($campo, $condicion);
        $this->db->update($tabla, $cadena);
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
