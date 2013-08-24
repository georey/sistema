<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carga extends CI_Controller
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
			$data['responsables']=$this->facturas_model->get_tabla('res_responsable',array('res_estado'=>1));
			$this->_cargarvista($data);
		}
	}

	function recorrido()
	{
		$data['recorrido']=$this->facturas_model->recorrido($_POST['id']);
		$this->load->view('facturas/carga/recorrido',$data);
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