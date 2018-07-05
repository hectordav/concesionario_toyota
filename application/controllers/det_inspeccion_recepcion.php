<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Det_inspeccion_recepcion extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('det_inspeccion_recepcion/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_det_inspeccion_recepcion');
		$crud->set_relation('id_inspeccion_recepcion','t_inspeccion_recepcion','descripcion');
		$crud->set_subject('Det Inspeccion Recepcion del Vehiculo');
		$crud->set_language('spanish');
		$crud->display_as('id_inspeccion_recepcion','Inspeccion');
		$crud->display_as('descripcion','Descripcion');
		$crud->columns('id_inspeccion_recepcion','descripcion');
		$crud->required_fields('id_inspeccion_recepcion','descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('det_inspeccion_recepcion/det_inspeccion_recepcion',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}


}
