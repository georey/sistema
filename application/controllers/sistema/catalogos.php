<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalogos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->_cargarvista();
		}
	}

	function opciones()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			try
			{
				$crud = new grocery_CRUD();
				$crud->set_table('opc_opcion');
				$crud->set_subject('Opciones');
				$crud->columns('opc_nombre','opc_funcion','opc_descripcion');
                $crud->set_primary_key('opc_id','vw_opc')->set_relation('opc_padre','vw_opc','opc_nombre',null,'opc_id');
				$output = $crud->render();
				$this->_cargarvista(null,$output);
			}
			catch(Exception $e)
			{
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
			}
			
		}
	}
    
    /**
     * Catalogos::get_hijos()
     * @author Alexis Beltran
     *
     * 
     * @param mixed $cat_id
     * @return void
     */
    function get_hijos($cat_id){
        $this->db->where('cat_tipo',$cat_id)->where('cat_padre',0)->order_by('cat_nombre');
        $hijos[0] = 'Seleccione';
        foreach($this->db->get('cat_catalogo')->result() as $row){
            $hijos[$row->cat_id] = $row->cat_nombre;
        }
        echo form_dropdown('padre',$hijos,'0','id="_padre2"');
    }
    
    /**
     * Catalogos::gestion()
     * @author Alexis Beltran
     * 
     * @return void
     */
    function gestion(){
        
        if($this->input->post('cat_tipo')){
            $cat_id = $this->db->insert('cat_catalogo',array(
                'cat_nombre' => $this->input->post('nombre'),
                'cat_desc'   => $this->input->post('desc'),
                'cat_tipo'   => ($this->input->post('padre')=='on')?'0':$this->input->post('cat_tipo'),
                'cat_padre'  => ($this->input->post('padre')=='on')?'1':'0',
            ));
            if($this->input->post('padre')=='on'){
                $this->db->update('cat_catalogo',array('cat_tipo' => $cat_id));
            }
        }
        //obtenemos los catalogos
        $this->db->where('cat_tipo','cat_id',FALSE)->order_by('cat_nombre');
        $catalogos[0] = 'Seleccione';
        foreach($this->db->get('cat_catalogo')->result() as $row){
            $catalogos[$row->cat_id] = $row->cat_nombre;
        }
        
        $data = array(
            'catalogos' => $catalogos
        );
        $this->_cargarvista($data,0,'sistema/catalogos/gestion');
    }

	function _cargarvista($data=0,$crud=0)
	{	
		$this->load->view('vacia',$crud);	
		if($data!=0)
			$data=array_merge($data,$this->masterpage->getUsuario());
		else
			$data=$this->masterpage->getUsuario();
		$vista=$data['modulo'].'/'.$data['control'].'/'.$data['funcion'];
		$this->masterpage->setMasterPage('masterpage_default');
		$this->masterpage->addContentPage($vista, 'content',$data);
		$this->masterpage->show();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */