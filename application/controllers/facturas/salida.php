<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Salida extends CI_Controller
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
			$data['facturas']=$this->facturas_model->cargar_facturas_estado(array(2,3));
			$data['responsables']=$this->facturas_model->cargar_tabla('res_responsable');
			$data['tipo_documento']=$this->facturas_model->get_tabla('tid_tipo_documento', array('tid_tipo'=>1));
			if($_POST) {				
				$des=$this->facturas_model->get_ultimo_registro('des_destino',array('des_id_fac' => $_POST['fac_id']));
				$des_id = $des['des_id'];
				$destino = array(
					'des_id_tid_salida' => $_POST['tipo_salida']);
				$this->facturas_model->mod_registro('des_destino',$destino,'des_id',$des_id);
				$this->facturas_model->estado_factura($_POST['fac_id'] ,3);
				redirect('/facturas/salida/');
			}
			else
			$this->_cargarvista($data);
		}
	}

	function cargar_historial()
	{
		$data['historial']=$this->facturas_model->historial($_POST['id']);		
		$this->load->view('facturas/responsable/historial',$data);
	}

	function regresar($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {			
			$this->facturas_model->estado_factura($id ,1);
			redirect('/facturas/responsable/');
		}
	}

	function finalizar($id,$valor,$monto)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$diferencia=$valor-$monto;			
			if ($diferencia==0) {
				# factura saldada
				$estado = 7;
			}
			if ($diferencia>0) {
				# factura quedan
				$estado = 8;
			}
			$this->facturas_model->estado_factura($id ,$estado);
			redirect('/facturas/responsable/');
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