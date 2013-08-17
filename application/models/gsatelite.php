<?php

/**
 * 
 */
class Gsatelite extends CI_Model
{

    /**
     * Gsatelite::__construct()
     * 
     * @return
     */
    function __construct()
    {
        $this->load->database();
    }

    /**
     * Gsatelite::ingresar()
     * 
     * @param mixed $tabla
     * @param mixed $cadena
     * @return
     */
    public function ingresar($tabla, $cadena)
    {
        $this->db->insert($tabla, $cadena);
        return $this->db->insert_id();
    } //fin de esta funcion

    /**
     * Gsatelite::actualizar()
     * 
     * @param mixed $tabla
     * @param mixed $cadena
     * @param mixed $campo
     * @param mixed $condicion
     * @return
     */
    public function actualizar($tabla, $cadena, $campo, $condicion)
    {
        $this->db->where($campo, $condicion);
        $this->db->update($tabla, $cadena);
        return $this->db->affected_rows();
    } //fin de esta funcion


    /**
     * Gsatelite::borrado_general()
     * 
     * @param mixed $tabla
     * @param mixed $cadena
     * @return
     */
    public function borrado_general($tabla, $cadena)
    {
        $this->db->delete($tabla, $cadena);
        return $this->db->affected_rows();
    } //fin de esta funcion


}

?>