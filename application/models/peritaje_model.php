<?php
class Peritaje_model extends CI_Model{

	public function guardar_peritaje($id_vehiculo, $id_cliente, $id_recomendable,$id_usuario_vendedor,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $precio_estimado, $total_gasto, $observaciones, $fecha){
		$data = array(
            
			'id_vehiculo'=>$id_vehiculo,
            'id_cliente'=>$id_cliente,
            'id_recomendable'=>$id_recomendable,
            'id_usuario_vendedor'=>$id_usuario_vendedor,
            'ins_motor'=>$motor,
            'ins_carroceria'=>$carroceria,
            'ins_pintura'=>$pintura,
            'ins_vuelco'=>$vuelco,
            'ins_choque'=>$choque,
			'manual'=>$manual,
            'manual_usuario'=>$manual_u,
            'manual_servicio'=>$manual_s,
			'llaves'=>$llaves,
            'duplicado'=>$duplicado,
            'total_gasto'=>$total_gasto,
			'precio_estimado'=>$precio_estimado,
			'observaciones'=>$observaciones,
			'fecha'=>$fecha);
		$this->db->insert('t_peritaje', $data);
	}
    public function guardar_peritaje_original_copia($id_peritaje_original, $id_vehiculo, $id_cliente, $id_recomendable,$id_usuario_vendedor,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $km_2, $precio_estimado, $total_gasto, $observaciones, $fecha){
        $data = array(
            'id_peritaje_original' =>$id_peritaje_original,
            'id_vehiculo'=>$id_vehiculo,
            'id_cliente'=>$id_cliente,
            'id_recomendable'=>$id_recomendable,
            'id_usuario_vendedor'=>$id_usuario_vendedor,
            'ins_motor'=>$motor,
            'ins_carroceria'=>$carroceria,
            'ins_pintura'=>$pintura,
            'ins_vuelco'=>$vuelco,
            'ins_choque'=>$choque,
            'manual'=>$manual,
            'manual_usuario'=>$manual_u,
            'manual_servicio'=>$manual_s,
            'llaves'=>$llaves,
            'duplicado'=>$duplicado,
            'km_nuevo'=>$km_2,
            'total_gasto'=>$total_gasto,
            'precio_estimado'=>$precio_estimado,
            'observaciones'=>$observaciones,
            'fecha'=>$fecha);
        $this->db->insert('t_peritaje', $data);
    }

    public function guardar_copia_peritaje($id_peritaje,$id_usuario_vendedor,$id_vehiculo, $id_cliente, $id_recomendable,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $precio_estimado, $total_gasto, $observaciones, $fecha){
        $data = array(
            'id_peritaje'=>$id_peritaje,
            'id_usuario_vendedor'=>$id_usuario_vendedor,
            'id_vehiculo'=>$id_vehiculo,
            'id_cliente'=>$id_cliente,
            'id_recomendable'=>$id_recomendable,
            'ins_motor'=>$motor,
            'ins_carroceria'=>$carroceria,
            'ins_pintura'=>$pintura,
            'ins_vuelco'=>$vuelco,
            'ins_choque'=>$choque,
            'manual'=>$manual,
            'manual_usuario'=>$manual_u,
            'manual_servicio'=>$manual_s,
            'llaves'=>$llaves,
            'duplicado'=>$duplicado,
            'total_gasto'=>$total_gasto,
            'precio_estimado'=>$precio_estimado,
            'observaciones'=>$observaciones,
            'fecha'=>$fecha);
        $this->db->insert('t_copia_peritaje', $data);
    }

	public function get_max_peritaje(){
      $this->db->select_max('id');
      $vehiculo=$this->db->get('t_peritaje');
      if($vehiculo->num_rows()> 0){
          return $vehiculo->result();
        }
    }
    public function get_max_peritaje_id_vehiculo($id_vehiculo){
      $this->db->select_max('id');
      $this->db->where('id_vehiculo', $id_vehiculo);
      $vehiculo=$this->db->get('t_peritaje');
      if($vehiculo->num_rows()> 0){
          return $vehiculo->result();
        }
    }
    public function get_max_copia_peritaje(){
      $this->db->select_max('id');
      $vehiculo=$this->db->get('t_copia_peritaje');
      if($vehiculo->num_rows()> 0){
          return $vehiculo->result();
        }
    }
    public function get_max_copia_peritaje_id_vehiculo($id_vehiculo){
      $this->db->select_max('id');
      $this->db->where('id_vehiculo', $id_vehiculo);
      $vehiculo=$this->db->get('t_copia_peritaje');
      if($vehiculo->num_rows()> 0){
          return $vehiculo->result();
        }
    }
    public function guardar_det_peritaje($id_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo){
    	$data = array(
			'id_peritaje'=>$id_peritaje,
            'id_inspeccion'=>$id_inspeccion,
			'id_estado_inspeccion'=>$id_estado_inspeccion,
			'id_inspeccionado'=>$id_inspeccionado,
			'costo_estimado'=>$costo,
			'observaciones'=>$observacion);
    	$this->db->insert('t_det_peritaje', $data);
    }
    public function guardar_copia_det_peritaje($id_copia_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo){
        $data = array(
            'id_copia_peritaje'=>$id_copia_peritaje,
            'id_inspeccion'=>$id_inspeccion,
            'id_estado_inspeccion'=>$id_estado_inspeccion,
            'id_inspeccionado'=>$id_inspeccionado,
            'costo_estimado'=>$costo,
            'observaciones'=>$observacion);
        $this->db->insert('t_copia_det_peritaje', $data);
    }

    public function get_peritaje($id_peritaje){
    	$this->db->select('t_peritaje.id as id_peritaje, t_peritaje.km_nuevo as km_nuevo, t_peritaje.id_peritaje_original as id_peritaje_original, t_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_peritaje.fecha as fecha_peritaje, t_peritaje.precio_estimado as precio_estimado_peritaje, t_peritaje.total_gasto as total_gasto_peritaje, t_peritaje.manual as manual_peritaje,t_peritaje.manual_usuario as manual_usuario, t_peritaje.manual_servicio as manual_servicio,t_peritaje.id_recomendable as recomendado_peritaje,t_peritaje.ins_motor as ins_motor, t_peritaje.ins_carroceria as ins_carroceria, t_peritaje.ins_pintura as ins_pintura, t_peritaje.ins_vuelco as ins_vuelco, t_peritaje.ins_choque as ins_choque, t_peritaje.llaves as llaves_peritaje, t_peritaje.duplicado as duplicado_llaves, t_peritaje.tasacion as tasacion_peritaje, t_peritaje.observaciones as observaciones_peritaje');
    	$this->db->join('t_cliente', 't_peritaje.id_cliente = t_cliente.id', 'left');
    	$this->db->join('t_vehiculo', 't_peritaje.id_vehiculo = t_vehiculo.id', 'left');
    	$this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
    	$this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
    	$this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
    	$this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
    	$this->db->where('t_peritaje.id', $id_peritaje);
    	$peritaje=$this->db->get('t_peritaje', 1);
    	  if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
    
    public function get_peritaje_id_peritaje_original($id_peritaje){
      $this->db->select('t_peritaje.id as id_peritaje, t_peritaje.id_peritaje_original as id_peritaje_original, t_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_peritaje.fecha as fecha_peritaje, t_peritaje.precio_estimado as precio_estimado_peritaje, t_peritaje.total_gasto as total_gasto_peritaje, t_peritaje.manual as manual_peritaje,t_peritaje.manual_usuario as manual_usuario, t_peritaje.manual_servicio as manual_servicio,t_peritaje.id_recomendable as recomendado_peritaje,t_peritaje.ins_motor as ins_motor, t_peritaje.ins_carroceria as ins_carroceria, t_peritaje.ins_pintura as ins_pintura, t_peritaje.ins_vuelco as ins_vuelco, t_peritaje.ins_choque as ins_choque, t_peritaje.llaves as llaves_peritaje, t_peritaje.duplicado as duplicado_llaves, t_peritaje.tasacion as tasacion_peritaje, t_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->where('t_peritaje.id_peritaje_original', $id_peritaje);
        $peritaje=$this->db->get('t_peritaje');
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }

    public function get_copia_peritaje($id_peritaje){
        $this->db->select('t_copia_peritaje.id as id_peritaje, t_copia_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_copia_peritaje.id_vehiculo as id_vehiculo,t_color.descripcion as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_copia_peritaje.fecha as fecha_peritaje, t_copia_peritaje.precio_estimado as precio_estimado_peritaje, t_copia_peritaje.total_gasto as total_gasto_peritaje, t_copia_peritaje.manual as manual_peritaje,t_copia_peritaje.manual_usuario as manual_usuario, t_copia_peritaje.manual_servicio as manual_servicio,t_copia_peritaje.id_recomendable as recomendado_peritaje, t_copia_peritaje.llaves as llaves_peritaje, t_copia_peritaje.duplicado as duplicado_llaves,t_copia_peritaje.ins_motor as ins_motor, t_copia_peritaje.ins_carroceria as ins_carroceria, t_copia_peritaje.ins_pintura as ins_pintura, t_copia_peritaje.ins_vuelco as ins_vuelco, t_copia_peritaje.ins_choque as ins_choque, t_copia_peritaje.tasacion as tasacion_peritaje, t_copia_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_copia_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_copia_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_color', 't_vehiculo.id_color = t_color.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->where('t_copia_peritaje.id', $id_peritaje);
        $peritaje=$this->db->get('t_copia_peritaje', 1);
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }

    public function get_peritaje_vehiculo($id_vehiculo){
        $this->db->select('t_peritaje.id as id_peritaje, t_peritaje.id_cliente as id_cliente, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_peritaje.id_vehiculo as id_vehiculo,t_vehiculo.id_color as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_carroceria as serial_carroceria_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_peritaje.fecha as fecha_peritaje, t_peritaje.precio_estimado as precio_estimado_peritaje, t_peritaje.total_gasto as total_gasto_peritaje, t_peritaje.manual as manual_peritaje, t_peritaje.llaves as llaves_peritaje, t_peritaje.tasacion as tasacion_peritaje, t_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->where('t_peritaje.id_vehiculo', $id_vehiculo);
        $peritaje=$this->db->get('t_peritaje', 1);
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }

    
    public function get_peritaje_todos(){
        $this->db->select('t_peritaje.id as id_peritaje,t_peritaje.id_vehiculo as id_vehiculo, t_peritaje.id_cliente as id_cliente_peritaje, t_cliente.dni as dni_cliente, t_cliente.nombre as nombre_cliente, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as marca_vehiculo, t_modelo.descripcion as modelo_vehiculo, t_tipo_combustible.descripcion as descripcion_combustible, t_vehiculo.id_color as color_vehiculo, t_vehiculo.ano as ano_vehiculo, t_vehiculo.patente as placa_vehiculo, t_vehiculo.serial_motor as serial_motor_vehiculo, t_vehiculo.kilometraje as kilometraje_vehiculo, t_peritaje.fecha as fecha_peritaje, t_peritaje.precio_estimado as precio_estimado_peritaje, t_peritaje.total_gasto as total_gasto_peritaje, t_peritaje.manual as manual_peritaje, t_peritaje.llaves as llaves_peritaje, t_peritaje.tasacion as tasacion_peritaje, t_peritaje.observaciones as observaciones_peritaje');
        $this->db->join('t_cliente', 't_peritaje.id_cliente = t_cliente.id', 'left');
        $this->db->join('t_vehiculo', 't_peritaje.id_vehiculo = t_vehiculo.id', 'left');
        $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
        $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
        $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_tipo_combustible', 't_vehiculo.id_tipo_combustible = t_tipo_combustible.id', 'left');
        $this->db->group_by('t_peritaje.id_vehiculo');
        $peritaje=$this->db->get('t_peritaje');
          if($peritaje->num_rows()> 0){
          return $peritaje->result();
        }
    }
    public function get_det_peritaje($id_peritaje){
    	$this->db->select('t_det_peritaje.id as id_det_peritaje,t_det_peritaje.id_estado_inspeccion as id_estado_inspeccion, t_det_peritaje.id_inspeccion as id_inspeccion_peritaje, t_inspeccion.descripcion as descripcion_inspeccion, t_det_peritaje.id_inspeccionado as id_inspeccionado,t_det_peritaje.costo_estimado as costo_estimado_det_peritaje, t_det_peritaje.observaciones as observaciones_det_peritaje');
        $this->db->join('t_inspeccion', 't_det_peritaje.id_inspeccion = t_inspeccion.id', 'left');
    	$this->db->join('t_estado_inspeccion', 't_det_peritaje.id_estado_inspeccion = t_estado_inspeccion.id', 'left');
    	$this->db->join('t_inspeccionado', 't_det_peritaje.id_inspeccionado = t_inspeccionado.id', 'left');
    	$this->db->where('t_det_peritaje.id_peritaje', $id_peritaje);
    	$det_peritaje=$this->db->get('t_det_peritaje');
    	if($det_peritaje->num_rows()> 0){
          return $det_peritaje->result();
        }
    }
    public function get_det_copia_peritaje($id_peritaje){
        $this->db->select('t_copia_det_peritaje.id as id_det_peritaje,t_copia_det_peritaje.id_estado_inspeccion as id_estado_inspeccion, t_copia_det_peritaje.id_inspeccion as id_inspeccion_peritaje, t_inspeccion.descripcion as descripcion_inspeccion, t_copia_det_peritaje.id_inspeccionado as id_inspeccionado,t_copia_det_peritaje.costo_estimado as costo_estimado_det_peritaje, t_copia_det_peritaje.observaciones as observaciones_det_peritaje');
        $this->db->join('t_inspeccion', 't_copia_det_peritaje.id_inspeccion = t_inspeccion.id', 'left');
        $this->db->join('t_estado_inspeccion', 't_copia_det_peritaje.id_estado_inspeccion = t_estado_inspeccion.id', 'left');
        $this->db->join('t_inspeccionado', 't_copia_det_peritaje.id_inspeccionado = t_inspeccionado.id', 'left');
        $this->db->where('t_copia_det_peritaje.id_copia_peritaje', $id_peritaje);
        $det_peritaje=$this->db->get('t_copia_det_peritaje');
        if($det_peritaje->num_rows()> 0){
          return $det_peritaje->result();
        }
    }
    public function actualizar_peritaje($id_peritaje,$manual,$llaves,$precio_estimado,$total_gasto,$observaciones){
        $data = array(
        'manual'=>$manual, 
        'llaves'=>$llaves,         
        'precio_estimado'=>$precio_estimado,
        'total_gasto'=>$total_gasto,    
        'observaciones'=>$observaciones);
        $this->db->where('id', $id_peritaje);
        $this->db->update('t_peritaje', $data);
          
    }
    public function actualizar_det_peritaje($id_det_peritaje,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo){
        $data = array(
        'id_estado_inspeccion'=>$id_estado_inspeccion,
        'id_inspeccionado'=>$id_inspeccionado,
        'costo_estimado'=>$costo,
        'observaciones'=>$observacion);
        $this->db->where('id', $id_det_peritaje);
        $this->db->update('t_det_peritaje', $data);
    }
    public function guardar_adjunto_peritaje($id_peritaje,$archivo){
        $data = array('id_peritaje' =>$id_peritaje,
        'adjunto'=>$archivo);
        $this->db->insert('t_adjunto_peritaje', $data);

    }
    public function get_adjunto_peritaje($id_peritaje){
        $this->db->where('id_peritaje', $id_peritaje);
        $adjunto_peritaje=$this->db->get('t_adjunto_peritaje');
        if($adjunto_peritaje->num_rows()> 0){
          return $adjunto_peritaje->result();
        }
    }


		
}