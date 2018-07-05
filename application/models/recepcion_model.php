<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion_model extends CI_Model {

	public function guardar_recepcion($id_contra_peritaje,$id_vehiculo,$combustible,$limpieza,$fecha,$apto){
		$data = array('id_contra_peritaje'=>$id_contra_peritaje,
			'id_vehiculo'=>$id_vehiculo,
			'combustible'=>$combustible,
			'limpieza' =>$limpieza,
			'fecha'=>$fecha,
			'id_apto'=>$apto);
		$this->db->insert('t_recepcion',$data);
	}
	public function guardar_copia_recepcion($id_recepcion_original,$id_contra_peritaje,$id_vehiculo,$combustible,$limpieza,$fecha,$apto){
		$data = array('id_recepcion_original'=>$id_recepcion_original,
			'id_contra_peritaje'=>$id_contra_peritaje,
			'id_vehiculo'=>$id_vehiculo,
			'combustible'=>$combustible,
			'limpieza' =>$limpieza,
			'fecha'=>$fecha,
			'id_apto'=>$apto);
		$this->db->insert('t_recepcion',$data);
	}
	public function get_max_recepcion(){
		$this->db->select_max('id');
		$consulta=$this->db->get('t_recepcion');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	public function guardar_det_recepcion($id_recepcion,$id_inspeccion_recepcion,$id_inspeccionado,$observaciones){
		$data = array('id_recepcion'=>$id_recepcion,
	'id_det_inspeccion_recepcion'=>$id_inspeccion_recepcion,
	'id_inspeccionado'=>$id_inspeccionado,
	'observaciones'=>$observaciones);
		$this->db->insert('t_det_recepcion', $data);
		
	}
	public function guardar_adjunto_recepcion($id_recepcion,$archivo){
		$data = array('id_recepcion' =>$id_recepcion,
		'adjunto'=>$archivo);
		$this->db->insert('t_adjunto_recepcion', $data);
	}
	public function get_recepcion_id($id_recepcion){
		$this->db->select('t_recepcion.id as id_recepcion, t_recepcion.id_recepcion_original as id_recepcion_original, t_recepcion.id_usuario_recepciona as id_usuario_recepciona, t_recepcion.id_contra_peritaje as id_contra_peritaje, t_recepcion.id_vehiculo as id_vehiculo, t_recepcion.combustible as combustible, t_recepcion.limpieza as limpieza, t_recepcion.fecha as fecha,t_recepcion.id_apto as id_apto');
		$this->db->join('t_usuario', 't_recepcion.id_usuario_recepciona = t_usuario.id', 'left');
		$this->db->join('t_contra_peritaje', 't_recepcion.id_contra_peritaje = t_contra_peritaje.id', 'left');
		$this->db->join('t_vehiculo', 't_recepcion.id_vehiculo = t_vehiculo.id', 'left');
		$this->db->where('t_recepcion.id', $id_recepcion);
		$consulta=$this->db->get('t_recepcion',1);
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_recepcion_id_contra_peritaje($id_contra_peritaje){
		$this->db->select('t_recepcion.id as id_recepcion, t_recepcion.id_recepcion_original as id_recepcion_original, t_recepcion.id_usuario_recepciona as id_usuario_recepciona, t_recepcion.id_contra_peritaje as id_contra_peritaje, t_recepcion.id_vehiculo as id_vehiculo, t_recepcion.combustible as combustible, t_recepcion.limpieza as limpieza, t_recepcion.fecha as fecha,t_recepcion.id_apto as id_apto');
		$this->db->join('t_usuario', 't_recepcion.id_usuario_recepciona = t_usuario.id', 'left');
		$this->db->join('t_contra_peritaje', 't_recepcion.id_contra_peritaje = t_contra_peritaje.id', 'left');
		$this->db->join('t_vehiculo', 't_recepcion.id_vehiculo = t_vehiculo.id', 'left');
		$this->db->where('t_recepcion.id_contra_peritaje', $id_contra_peritaje);
		$consulta=$this->db->get('t_recepcion',1);
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_det_recepcion_id($id_recepcion){
		$this->db->select('t_det_recepcion.id_det_inspeccion_recepcion as id_det_inspeccion_recepcion, t_det_recepcion.id_inspeccionado as id_inspeccionado, t_det_recepcion.observaciones as observaciones');
		$this->db->join('t_det_inspeccion_recepcion', 't_det_recepcion.id_det_inspeccion_recepcion = t_det_inspeccion_recepcion.id', 'left');
		$this->db->join('t_inspeccionado', 't_det_recepcion.id_inspeccionado = t_inspeccionado.id', 'left');
		$this->db->where('t_det_recepcion.id_recepcion', $id_recepcion);
		$consulta=$this->db->get('t_det_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_adjunto_recepcion($id_recepcion){
		$this->db->where('id_recepcion', $id_recepcion);
		$consulta=$this->db->get('t_adjunto_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	
}

/* End of file recepcion_model.php */
/* Location: ./application/models/recepcion_model.php */