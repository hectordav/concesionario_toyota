<?php
class Tipo_carroceria_model extends CI_Model{
    //put your code here

    public function get_tipo_carroceria() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_tipo_carroceria');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
}