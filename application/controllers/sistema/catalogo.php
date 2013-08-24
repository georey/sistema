<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
    }

    public function new_crud(){
        $db_driver = $this->db->platform();
        $model_name = 'grocery_crud_model_'.$db_driver;
        $model_alias = 'm'.substr(md5(rand()), 0, rand(4,15) );

        unset($this->{$model_name});
        $this->load->library('grocery_CRUD');
        $crud = new Grocery_CRUD();
        if (file_exists(APPPATH.'/models/'.$model_name.'.php')){
            //$this->load->model('grocery_crud_model'); --Ya esta cargada la libreria en autoload :P
            $this->load->model('grocery_crud_generic_model');
            $this->load->model($model_name,$model_alias);
            $crud->basic_model = $this->{$model_alias};
        }
        return $crud;
    }

    public function _example_output($output = null)
    {
        $this->load->view('sistema/catalogos/opciones.php',$output);
    }

    public function index()
    {
        try{
            $crud = $this->new_crud();

            $crud->set_table('res_responsable')
            ->set_subject('Responsable')
            ->columns('res_nombre', 'res_apellido', 'res_documento', 'res_telefono')
            ->fields('res_nombre', 'res_apellido', 'res_documento', 'res_telefono')
            ->display_as('res_nombre', 'Nombre')
            ->display_as('res_apellido', 'Apellido')
            ->display_as('res_documento', 'D.U.I')
            ->display_as('res_telefono', 'Tel&eacute;fono');

            $output = $crud->render();

            $this->_cargarvista(null,$output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
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