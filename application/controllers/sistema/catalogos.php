<?php if ( ! defined('BASEPATH')) { 
    exit('No direct script access allowed');
}
/**
 * Catalogos del sistema
 *  
 * @category Utilidad
 * @package  Tamosa
 * @author   Alan Alvarenga <alankvm@gmail.com>
 * @link     https://github.com/georey/sistema
 */ 
class Catalogos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('catalogos_model');
    }
    /**
     * Pagina Principal de Catalogos
     * 
     * @return HTML 
     */
    public function index()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->_cargarvista();
        }
    }

    public function responsables ()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->output->enable_profiler(true);
            //Prerar datos a mostrar en la vista
            $data['responsables'] = $this->catalogos_model->get_tabla('res_responsable');
            $this->_cargarvista($data);
        }
    }

    public function load_editar()
    {
        $id = $this->input->get('id');
        print_r($id); exit();
    }

    /**
     * Carga vista 
     * 
     * @param  integer $data informacion a cargar en la vista
     * @param  integer $crud Nombre del crud
     * @return html
     * 
     */
    private function _cargarvista($data=0, $crud=0)
    {
        $this->load->view('vacia', $crud);
        if ($data!=0) {
            $data=array_merge($data, $this->masterpage->getUsuario());
        } else {
            $data=$this->masterpage->getUsuario();
        }

        $vista=$data['modulo'].'/'.$data['control'].'/'.$data['funcion'];
        $this->masterpage->setMasterPage('masterpage_default');
        $this->masterpage->addContentPage($vista, 'content', $data);
        $this->masterpage->show();
    }
}

/* End of file catalogos.php */
/* Location: ./application/controllers/catalogos.php */