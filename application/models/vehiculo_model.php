<?php
class Vehiculo_model extends CI_Model{

    public function guardar_vehiculo($id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$ano,$id_color,$patente,$serial_carroceria,$serial_motor,$kilometraje) {
        $data = array(
        'id_tipo_combustible' =>$id_tipo_combustible,
        'id_tipo'=>$id_tipo,
        'id_marca'=>$id_marca,
        'id_modelo'=>$id_modelo,
        'ano' =>$ano,
        'id_color'=>$id_color,
        'patente' =>$patente,
        'serial_carroceria' =>$serial_carroceria,
        'serial_motor' =>$serial_motor,
        'kilometraje' =>$kilometraje
         );
        $this->db->insert('t_vehiculo', $data);
    }
     public function get_max_vehiculo(){
      $this->db->select_max('id');
      $vehiculo=$this->db->get('t_vehiculo');
      if($vehiculo->num_rows()> 0){
          return $vehiculo->result();
        }
    }
    public function get_vehiculo_id($id_vehiculo){
        $this->db->select('t_vehiculo.id as id_vehiculo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo,t_color.descripcion as color_vehiculo , t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo');
        $this->db->where('t_vehiculo.id', $id_vehiculo);
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $vehiculo=$this->db->get('t_vehiculo',1);
        if($vehiculo->num_rows()> 0){
            return $vehiculo->result();
        }
    }
    public function get_vehiculo_cliente($id_cliente){
        $this->db->select('t_vehiculo.id as id_vehiculo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo,t_color.descripcion as color_vehiculo , t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $vehiculo=$this->db->get('t_vehiculo',1);
        if($vehiculo->num_rows()> 0){
            return $vehiculo->result();
        }
    }


    public function get_vehiculo_patente($patente){
        $this->db->select('t_vehiculo.id as id_vehiculo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_color.descripcion as color_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo');
        $this->db->where('t_vehiculo.patente', $patente);
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $vehiculo=$this->db->get('t_vehiculo',1);
        if($vehiculo->num_rows()> 0){
            return $vehiculo->result();
        }
    }
    public function get_vehiculo_id_cliente_patente($id_cliente,$patente){
        $this->db->select('t_vehiculo.id as id_vehiculo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_color.descripcion as color_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo');
        $this->db->where('t_vehiculo.patente', $patente);
        $this->db->where('t_vehiculo.id_cliente', $id_cliente);
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $vehiculo=$this->db->get('t_vehiculo',1);
        if($vehiculo->num_rows()> 0){
            return $vehiculo->result();
        }
    }
    public function get_vehiculo(){
        $this->db->select('t_vehiculo.id as id_vehiculo,  t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_color.descripcion as color_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $vehiculo=$this->db->get('t_vehiculo');
        if($vehiculo->num_rows()> 0){
            return $vehiculo->result();
        }
    }

    public function actualizar_vehiculo($id_vehiculo,$id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$id_color,$ano,$patente,$serial_carroceria,$serial_motor,$kilometraje) {
        $data = array(
        'id_tipo_combustible' =>$id_tipo_combustible,
        'id_tipo'=>$id_tipo,
        'id_marca'=>$id_marca,
        'id_modelo'=>$id_modelo,
        'ano' =>$ano,
        'id_color'=>$id_color,
        'patente' =>$patente,
        'serial_carroceria' =>$serial_carroceria,
        'serial_motor' =>$serial_motor,
        'kilometraje' =>$kilometraje
         );
        $this->db->where('id', $id_vehiculo);
        $this->db->update('t_vehiculo', $data);
    }
}














