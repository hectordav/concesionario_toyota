<?php
class Accesorio_model extends CI_Model{
    public function guardar_accesorio($id_marca, $accesorio) {
       $data = array('id_modelo' =>$id_marca ,'descripcion'=>$accesorio);
        $this->db->insert('t_accesorio', $data);
        }
    public function get_accesorio($id_accesorio) {
       $this->db->where('id', $id_accesorio);
            $accesorio=$this->db->get('t_accesorio');
        if ($accesorio->num_rows()>0) {
            return $accesorio;
            }else{
            return false;
            }
    }
#**********************************************************************
      public function actualizar_accesorio($id_accesorio, $id_modelo, $accesorio) {
       $data = array('id_modelo' =>$id_modelo ,'descripcion'=>$accesorio);
       $this->db->where('id',$id_accesorio);
       $this->db->update('t_accesorio', $data);
        }
}