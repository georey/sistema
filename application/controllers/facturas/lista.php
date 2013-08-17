<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lista extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('facturas_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['facturas']=$this->facturas_model->cargar_tabla('vw_lista');
			$this->_cargarvista($data);
		}
	}

	function seleccionar($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$resultado=$this->facturas_model->enlazar_factura($id);
			$this->facturas_model->estado_factura($resultado,1);
			redirect('/facturas/lista/');
		}
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