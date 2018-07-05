<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspeccion_recepcion_model extends CI_Model {

	public function get_det_inspeccion_recepcion_1(){
		$this->db->where('id_inspeccion_recepcion', 1);
		$consulta=$this->db->get('t_det_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_det_inspeccion_recepcion_2(){
		$this->db->where('id_inspeccion_recepcion', 2);
		$consulta=$this->db->get('t_det_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_det_inspeccion_recepcion_3(){
		$this->db->where('id_inspeccion_recepcion', 3);
		$consulta=$this->db->get('t_det_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_det_inspeccion_recepcion_4(){
		$this->db->where('id_inspeccion_recepcion', 4);
		$consulta=$this->db->get('t_det_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_inspeccion_recepcion(){
		$consulta=$this->db->get('t_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
		public function get_det_inspeccion_recepcion(){
		$consulta=$this->db->get('t_det_inspeccion_recepcion');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	

}

/* End of file inspeccion_recepcion_model.php */
/* Location: ./application/models/inspeccion_recepcion_model.php */