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

	public function estado_factura($id,$est,$monto=0.0)
	{		
		$estado=$this->add_registro('esf_estado_factura',array('esf_id_fac'=>$id, 'esf_estado'=>$est, 'esf_id_usu'=>$this->tank_auth->get_user_id(),'esf_monto' => $monto));
		$factura=$this->mod_registro('fac_factura', array('fac_estado' => $est), 'fac_id', $id);
		return 1;
	}

	public function recorrido($id)
	{
		$this->db->select()			
			->from('des_destino')
			->join('asi_asignacion','asi_id=des_id_asi','left')
			->join('fac_factura','fac_id=des_id_fac','left')
			->join('vw_lista','id=fac_id_vista','left')
			->where('asi_id_res',$id)
			->where('asi_fecha >= convert(datetime,'.date('d/m/y').')')
			->where('asi_fehcha <= convert(datetime,'.date('d/m/y', strtotime("+1 day")).')');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function historial($id)
	{
		$this->db->select()			
			->from('fac_factura')
			->join('esf_estado_factura','esf_id_fac=fac_id','left')
			->join('est_estado','est_id=esf_estado','left')
			->join('users','id=esf_id_usu','left')
			->where_in('fac_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function cargar_facturas_estado($est)
	{
		$this->db->select('*, (select sum(esf_monto) from esf_estado_factura where esf_id_fac=fac_id) as ingreso')			
			->from('fac_factura')
			->join('vw_lista','id=fac_id_vista')
			->join('des_destino','des_id_fac=fac_id','left')
			->join('asi_asignacion','asi_id=des_id_asi','left')
			->join('res_responsable','res_id=asi_id_res','left')
			->where_in('fac_estado',$est);
			$query=$this->db->get();
		return $query->result_array();
	}

	public function cargar_facturas()
	{
		$facturas=$this->get_tabla('fac_factura',array('fac_estado <'=>6));
		$facts = array();
		foreach ($facturas as $key) {
			$facts[]=$key['fac_id_vista'];
		}
		$this->db->select()			
			->from('vw_lista');
			if(count($facts)>0)
			$this->db->where_not_in('id',$facts);
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
        return 1;
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
