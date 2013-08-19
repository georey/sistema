<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Responsable extends CI_Controller
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
			$data['facturas']=$this->facturas_model->cargar_facturas_estado(array(1,2));
			$data['responsables']=$this->facturas_model->cargar_tabla('res_responsable');
			if($_POST) {
				$comp=$this->facturas_model->get_registro('asi_asignacion',array('asi_id_res' => $_POST['responsable'], 'asi_fecha_mod' => date('d/m/Y')));
				if (count($comp)==0) {
					$asignacion = array(
						'asi_id_res' => $_POST['responsable'] ,
						'asi_id_usu' => $this->tank_auth->get_user_id());
					$asi_id = $this->facturas_model->add_registro('asi_asignacion',$asignacion);
				}
				else
					$asi_id = $comp['asi_id'];

				$responsable = array(
					'des_id_asi' => $asi_id,
					'des_id_fac' => $_POST['fac_id'],
					'des_obs' => $_POST['obs'] );
				$this->facturas_model->add_registro('des_destino',$responsable);
				$this->facturas_model->estado_factura($_POST['fac_id'] ,2);
				redirect('/facturas/responsable/');
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
			$this->facturas_model->estado_factura($id ,6);
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