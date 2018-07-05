<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tipo_carroceria extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('tipo_carroceria/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_tipo_carroceria');
		$crud->set_subject('Tipo de Carroceria');
		$crud->set_language('spanish');
		$crud->display_as('descripcion','Tipo');
		$crud->columns('descripcion');
		$crud->required_fields('descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('tipo_carroceria/tipo_carroceria',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}