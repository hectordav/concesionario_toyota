<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inspeccion_recepcion extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('inspeccion_recepcion/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_inspeccion_recepcion');
		$crud->set_subject('Inspeccion Recepcion del Vehiculo');
		$crud->set_language('spanish');
		$crud->display_as('descripcion','Descripcion');
		$crud->columns('descripcion');
		$crud->required_fields('id_modelo','descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('inspeccion_recepcion/inspeccion_recepcion',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}
