<?php
class Cliente_model extends CI_Model{
    
    public function guardar_cliente($dni,$nombre) {
       $data = array('dni' =>$dni,
       				 			 'nombre'=>$nombre);
        $this->db->insert('t_cliente', $data);
        }
    public function buscar_cliente($dni) {
       $this->db->where('dni', $dni);
       $cliente=$this->db->get('t_cliente');
        if($cliente->num_rows()> 0){
            return $cliente->result();
        }
    }
    public function buscar_cliente_id($id_cliente) {
       $this->db->where('id', $id_cliente);
       $cliente=$this->db->get('t_cliente');
        if($cliente->num_rows()> 0){
            return $cliente->result();
        }
    }
    public function get_cliente() {
      $cliente=$this->db->get('t_cliente');
       if($cliente->num_rows()> 0){
            return $cliente->result();
        }
    }
    public function get_cliente_id($id_cliente) {
      $this->db->where('id', $id_cliente);
      $cliente=$this->db->get('t_cliente');
       if($cliente->num_rows()> 0){
            return $cliente->result();
        }
    }     
}