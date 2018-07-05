<?php
class Tipo_producto_model extends CI_Model{
    //put your code here

    public function get_tipo_producto() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_tipo_producto');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
   public function get_marca_producto($id_tipo) {
        $this->db->where('id_tipo_producto', $id_tipo);
        $this->db->order_by('descripcion', 'asc');
        $marca = $this->db->get('t_marca_producto');
        if($marca->num_rows() > 0){
            return $marca->result();
        }
    }
    public function get_modelo_combo($id_marca) {
        $this->db->where('id_marca_producto', $id_marca);
        $this->db->order_by('descripcion', 'asc');
        $modelo = $this->db->get('t_modelo_producto');
        if($modelo->num_rows() > 0){
            return $modelo->result();
        }
    }
    public function get_producto_combo($id_marca) {
        $this->db->where('id_modelo', $id_marca);
        $this->db->order_by('id', 'asc');
        $producto = $this->db->get('t_producto');
        if($producto->num_rows() > 0){
            return $producto->result();
        }
    }
    public function guardar_modelo_producto($id_marca, $modelo) {
       $data = array('id_marca_producto' =>$id_marca ,'descripcion'=>$modelo);
        $this->db->insert('t_modelo_producto', $data);
        }

#*******************************************************************************
    public function get_modelo_producto($id_modelo) {
        $this->db->where('id', $id_modelo);
            $modelo=$this->db->get('t_modelo_producto');
        if ($modelo->num_rows()>0) {
                    return $modelo;
                    }else{
                    return false;
                    }
        }
#*******************************************************************************
        public function actualizar_modelo_producto($id_modelo, $id_marca, $modelo) {
           $data = array('id_marca_producto' =>$id_marca ,'descripcion'=>$modelo);
            $this->db->where('id',$id_modelo);
            $this->db->update('t_modelo_producto', $data);
        }

}