<?php
class Producto_model extends CI_Model{
    
    public function guardar_producto($id_modelo, $producto) {
       $data = array('id_modelo_producto' =>$id_modelo,
       				 			 'descripcion'=>$producto);
        $this->db->insert('t_producto', $data);
        }
    public function get_producto($id_producto) {
       $this->db->where('id', $id_producto);
            $producto=$this->db->get('t_producto');
        if ($producto->num_rows()>0) {
            return $producto;
            }else{
            return false;
            }
    }
      public function actualizar_producto($id_producto, $id_modelo, $producto) {
       $data = array('id_modelo' =>$id_modelo ,'descripcion'=>$producto);
       $this->db->where('id',$id_producto);
       $this->db->update('t_producto', $data);
        }     
}