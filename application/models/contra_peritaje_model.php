<?php
class Contra_peritaje_model extends CI_Model {

	public function guardar_contra_peritaje($id_peritaje,$id_vehiculo,$km_nuevo,$id_estado,$id_cliente,$manual, $manual_u,$manual_s,$llaves,$duplicado, $precio_estimado,$total_c_peritaje,$observaciones_c_peritaje,$fecha_peritaje,$fecha_c_peritaje){
		$data = array(
			'id_peritaje'=>$id_peritaje,
			'id_cliente'=>$id_cliente,
			'id_vehiculo'=>$id_vehiculo,
            'kilometraje'=>$km_nuevo,
            'id_recomendable' =>$id_estado,
			'manual'=>$manual,
            'manual_usuario'=>$manual_u,
            'manual_servicio' =>$manual_s,
			'llaves'=>$llaves,
            'duplicado' =>$duplicado,
			'precio_estimado'=>$precio_estimado,
			'total_gasto'=>$total_c_peritaje,
			'observaciones'=>$observaciones_c_peritaje,
			'fecha'=>$fecha_c_peritaje);
		$this->db->insert('t_contra_peritaje', $data);
	}

   public function guardar_copia_contra_peritaje($id_peritaje,$id_contra_peritaje,$id_vehiculo,$km_nuevo,$id_estado,$id_cliente,$manual,$llaves,$precio_estimado,$total_c_peritaje,$observaciones_c_peritaje,$fecha_peritaje,$fecha_c_peritaje){
        $data = array(
            'id_contra_peritaje_original' =>$id_contra_peritaje,
            'id_peritaje'=>$id_peritaje,
            'id_cliente'=>$id_cliente,
            'id_vehiculo'=>$id_vehiculo,
            'kilometraje'=>$km_nuevo,
            'manual'=>$manual,
            'llaves'=>$llaves,
            'precio_estimado'=>$precio_estimado,
            'total_gasto'=>$total_c_peritaje,
            'observaciones'=>$observaciones_c_peritaje,
            'fecha'=>$fecha_c_peritaje);
        $this->db->insert('t_contra_peritaje', $data);
    }
	public function get_max_contra_peritaje_id_vehiculo($id_vehiculo){
      $this->db->select_max('id');
      $this->db->where('id_vehiculo', $id_vehiculo);
      $contra_peritaje=$this->db->get('t_contra_peritaje');
      if($contra_peritaje->num_rows()> 0){
          return $contra_peritaje->result();
        }
    }
    public function get_max_copia_contra_peritaje(){
      $this->db->select_max('id');
      $contra_peritaje=$this->db->get('t_copia_contra_peritaje');
      if($contra_peritaje->num_rows()> 0){
          return $contra_peritaje->result();
        }
    }
    public function guardar_det_contra_peritaje($id_contra_peritaje,$id_inspeccion,$id_c_peritaje,$costo,$observaciones){
    	$data = array(
				'id_contra_peritaje'=>$id_contra_peritaje,
				'id_inspeccion'=>$id_inspeccion,
				/*'id_estado_inspeccion'=>$id_estado_inspeccion,
				'id_inspeccionado'=>$id_estado_inspeccion,*/
				'id_c_peritaje'=>$id_c_peritaje,
				/*'id_reparable'=>$id_reparable,*/
				'costo'=>$costo,
				'observaciones'=>$observaciones);
    	$this->db->insert('t_det_contra_peritaje', $data);
    }
    public function guardar_det_copia_contra_peritaje($id_contra_peritaje,$id_inspeccion,$id_c_peritaje,$costo,$observaciones){
        $data = array(
                'id_copia_contra_peritaje'=>$id_contra_peritaje,
                'id_inspeccion'=>$id_inspeccion,
                /*'id_estado_inspeccion'=>$id_estado_inspeccion,
                'id_inspeccionado'=>$id_estado_inspeccion,*/
                'id_c_peritaje'=>$id_c_peritaje,
                /*'id_reparable'=>$id_reparable,*/
                'costo'=>$costo,
                'observaciones'=>$observaciones);
        $this->db->insert('t_det_copia_contra_peritaje', $data);
    }
    public function guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo){
        $data = array('id_contra_peritaje' =>$id_contra_peritaje,
        'adjunto'=>$archivo);
        $this->db->insert('t_adjunto_contra_peritaje', $data);
    }
      public function guardar_adjunto_copia_contra_peritaje($id_contra_peritaje,$archivo){
        $data = array('id_copia_contra_peritaje' =>$id_contra_peritaje,
        'adjunto'=>$archivo);
        $this->db->insert('t_adjunto_copia_contra_peritaje', $data);
    }
    public function get_contra_peritaje_id_peritaje($id_peritaje,$id_ultimo_peritaje){
        $this->db->select('t_contra_peritaje.id as id_contra_peritaje, t_contra_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_contra_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_contra_peritaje.fecha as fecha_peritaje, t_contra_peritaje.precio_estimado as precio_estimado_peritaje, t_contra_peritaje.total_gasto as total_gasto_peritaje, t_contra_peritaje.manual as manual_peritaje,t_contra_peritaje.manual_usuario as manual_usuario, t_contra_peritaje.manual_servicio as manual_servicio,t_contra_peritaje.id_recomendable as recomendado_peritaje,t_contra_peritaje.ins_motor as ins_motor, t_contra_peritaje.ins_carroceria as ins_carroceria, t_contra_peritaje.ins_pintura as ins_pintura, t_contra_peritaje.ins_vuelco as ins_vuelco, t_contra_peritaje.ins_choque as ins_choque, t_contra_peritaje.llaves as llaves_peritaje, t_contra_peritaje.duplicado as duplicado_llaves, t_contra_peritaje.tasacion as tasacion_peritaje, t_contra_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_contra_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_contra_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->where('t_contra_peritaje.id_peritaje', $id_peritaje);
        $this->db->or_where('t_contra_peritaje.id_peritaje',$id_ultimo_peritaje);
        $peritaje=$this->db->get('t_contra_peritaje');
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
    public function get_copia_contra_peritaje($id_contra_peritaje){
        $this->db->select('t_copia_contra_peritaje.id as id_contra_peritaje, t_copia_contra_peritaje.id_cliente as id_cliente,t_copia_contra_peritaje.kilometraje as kilometraje_nuevo, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_copia_contra_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_copia_contra_peritaje.fecha as fecha_peritaje, t_copia_contra_peritaje.precio_estimado as precio_estimado_peritaje, t_copia_contra_peritaje.total_gasto as total_gasto_peritaje, t_copia_contra_peritaje.manual as manual_peritaje,t_copia_contra_peritaje.manual_usuario as manual_usuario, t_copia_contra_peritaje.manual_servicio as manual_servicio,t_copia_contra_peritaje.id_recomendable as recomendado_peritaje,t_copia_contra_peritaje.ins_motor as ins_motor, t_copia_contra_peritaje.ins_carroceria as ins_carroceria, t_copia_contra_peritaje.ins_pintura as ins_pintura, t_copia_contra_peritaje.ins_vuelco as ins_vuelco, t_copia_contra_peritaje.ins_choque as ins_choque, t_copia_contra_peritaje.llaves as llaves_peritaje, t_copia_contra_peritaje.duplicado as duplicado_llaves, t_copia_contra_peritaje.tasacion as tasacion_peritaje, t_copia_contra_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_copia_contra_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_copia_contra_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->where('t_copia_contra_peritaje.id', $id_contra_peritaje);
        $peritaje=$this->db->get('t_copia_contra_peritaje', 1);
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
    public function get_contra_peritaje($id_contra_peritaje){
    	$this->db->select('t_contra_peritaje.id as id_contra_peritaje, t_contra_peritaje.id_cliente as id_cliente, t_contra_peritaje.kilometraje as kilometraje_nuevo, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_contra_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_contra_peritaje.fecha as fecha_peritaje, t_contra_peritaje.precio_estimado as precio_estimado_peritaje, t_contra_peritaje.total_gasto as total_gasto_peritaje, t_contra_peritaje.manual as manual_peritaje,t_contra_peritaje.manual_usuario as manual_usuario, t_contra_peritaje.manual_servicio as manual_servicio,t_contra_peritaje.id_recomendable as recomendado_peritaje,t_contra_peritaje.ins_motor as ins_motor, t_contra_peritaje.ins_carroceria as ins_carroceria, t_contra_peritaje.ins_pintura as ins_pintura, t_contra_peritaje.ins_vuelco as ins_vuelco, t_contra_peritaje.ins_choque as ins_choque, t_contra_peritaje.llaves as llaves_peritaje, t_contra_peritaje.duplicado as duplicado_llaves, t_contra_peritaje.tasacion as tasacion_peritaje, t_contra_peritaje.observaciones as observaciones_peritaje');
    	$this->db->join('t_cliente', 't_contra_peritaje.id_cliente = t_cliente.id', 'left');
    	$this->db->join('t_vehiculo', 't_contra_peritaje.id_vehiculo = t_vehiculo.id', 'left');
    	$this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
    	$this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
    	$this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
    	$this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
    	$this->db->where('t_contra_peritaje.id', $id_contra_peritaje);
    	$peritaje=$this->db->get('t_contra_peritaje', 1);
    	  if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
    public function get_contra_peritaje_todos(){
        $this->db->select('t_contra_peritaje.id as id_contra_peritaje, t_contra_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_contra_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.id as id_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_contra_peritaje.fecha as fecha_peritaje, t_contra_peritaje.precio_estimado as precio_estimado_peritaje, t_contra_peritaje.total_gasto as total_gasto_peritaje, t_contra_peritaje.manual as manual_peritaje,t_contra_peritaje.manual_usuario as manual_usuario, t_contra_peritaje.manual_servicio as manual_servicio,t_contra_peritaje.id_recomendable as recomendado_peritaje,t_contra_peritaje.ins_motor as ins_motor, t_contra_peritaje.ins_carroceria as ins_carroceria, t_contra_peritaje.ins_pintura as ins_pintura, t_contra_peritaje.ins_vuelco as ins_vuelco, t_contra_peritaje.ins_choque as ins_choque, t_contra_peritaje.llaves as llaves_peritaje, t_contra_peritaje.duplicado as duplicado_llaves, t_contra_peritaje.tasacion as tasacion_peritaje, t_contra_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_contra_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_contra_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->group_by('t_contra_peritaje.id_vehiculo');
        $peritaje=$this->db->get('t_contra_peritaje');
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
 public function get_det_copia_contra_peritaje($id_peritaje){
        $this->db->select('t_det_copia_contra_peritaje.id as id_det_peritaje, t_det_copia_contra_peritaje.id_estado_inspeccion as id_estado_inspeccion, t_det_copia_contra_peritaje.id_inspeccion as id_inspeccion_peritaje, t_inspeccion.descripcion as descripcion_inspeccion, t_det_copia_contra_peritaje.id_c_peritaje as id_c_peritaje, t_det_copia_contra_peritaje.id_inspeccionado as id_inspeccionado, t_det_copia_contra_peritaje.costo as costo_estimado_det_peritaje, t_det_copia_contra_peritaje.observaciones as observaciones_det_peritaje');
        $this->db->join('t_inspeccion', 't_det_copia_contra_peritaje.id_inspeccion = t_inspeccion.id', 'left');
        $this->db->join('t_estado_inspeccion', 't_det_copia_contra_peritaje.id_estado_inspeccion = t_estado_inspeccion.id', 'left');
        $this->db->join('t_inspeccionado', 't_det_copia_contra_peritaje.id_inspeccionado = t_inspeccionado.id', 'left');
        $this->db->where('t_det_copia_contra_peritaje.id_copia_contra_peritaje', $id_peritaje);
        $det_peritaje=$this->db->get('t_det_copia_contra_peritaje');
        if($det_peritaje->num_rows()> 0){
          return $det_peritaje->result();
        }
    }
 public function get_det_contra_peritaje($id_peritaje){
    	$this->db->select('t_det_contra_peritaje.id as id_det_peritaje, t_det_contra_peritaje.id_estado_inspeccion as id_estado_inspeccion, t_det_contra_peritaje.id_inspeccion as id_inspeccion_peritaje, t_inspeccion.descripcion as descripcion_inspeccion, t_det_contra_peritaje.id_c_peritaje as id_c_peritaje, t_det_contra_peritaje.id_inspeccionado as id_inspeccionado, t_det_contra_peritaje.costo as costo_estimado_det_peritaje, t_det_contra_peritaje.observaciones as observaciones_det_peritaje');
        $this->db->join('t_inspeccion', 't_det_contra_peritaje.id_inspeccion = t_inspeccion.id', 'left');
    	$this->db->join('t_estado_inspeccion', 't_det_contra_peritaje.id_estado_inspeccion = t_estado_inspeccion.id', 'left');
    	$this->db->join('t_inspeccionado', 't_det_contra_peritaje.id_inspeccionado = t_inspeccionado.id', 'left');
    	$this->db->where('t_det_contra_peritaje.id_contra_peritaje', $id_peritaje);
    	$det_peritaje=$this->db->get('t_det_contra_peritaje');
    	if($det_peritaje->num_rows()> 0){
          return $det_peritaje->result();
        }
    }
    public function get_adjunto_contra_peritaje($id_contra_peritaje){
        $this->db->where('id_contra_peritaje', $id_contra_peritaje);
        $adjunto_peritaje=$this->db->get('t_adjunto_contra_peritaje');
        if($adjunto_peritaje->num_rows()> 0){
          return $adjunto_peritaje->result();
        }
    }
    public function get_adjunto_copia_contra_peritaje($id_contra_peritaje){
        $this->db->where('id_copia_contra_peritaje', $id_contra_peritaje);
        $adjunto_peritaje=$this->db->get('t_adjunto_copia_contra_peritaje');
        if($adjunto_peritaje->num_rows()> 0){
          return $adjunto_peritaje->result();
        }
    }
}

/* End of file contra_peritaje_model.php */
/* Location: ./application/models/contra_peritaje_model.php */