<?php
class Marca_model extends CI_Model{
    //put your code here

    public function get_marca() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_marca');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
}