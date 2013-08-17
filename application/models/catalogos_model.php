<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogos_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function get_tabla($tabla='')
    {
    	$response = false;
    	if ($tabla != '') {
    		$response = $this->db->get($tabla);
    	}

    	return  (is_object($response) && $response->num_rows() > 0)
    			? $response
    			: false;
    }

}

/* End of file catalogos.php */
/* Location: ./application/models/catalogos.php */