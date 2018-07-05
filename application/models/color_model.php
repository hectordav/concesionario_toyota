<?php
class Color_model extends CI_Model{

    public function get_color() {
        $consulta = $this->db->get('t_color');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
}