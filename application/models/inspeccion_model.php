<?php
class Inspeccion_model extends CI_Model{


    public function get_inspeccion() {
        $consulta = $this->db->get('t_inspeccion');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }

    public function get_inspeccion_general() {
        $consulta = $this->db->get('t_inspeccion_general');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
}