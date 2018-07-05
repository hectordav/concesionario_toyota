<?php
class Tipo_combustible_model extends CI_Model{
    //put your code here

    public function get_tipo_combustible() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_tipo_combustible');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
}