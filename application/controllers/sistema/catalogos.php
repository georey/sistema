/**
 * Catalogos del sistema
 *  
 * @category Utilidad
 * @package  Tamosa
 * @author   Alan Alvarenga <alankvm@gmail.com>
 * @link     https://github.com/georey/sistema
 */
<?php if ( ! defined('BASEPATH')) { 
    exit('No direct script access allowed');
} 
/**
 * Catalogos
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