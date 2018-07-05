<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Empresa extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('empresa/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_empresa');
		$crud->set_subject('empresa');
		$crud->set_language('spanish');
		$crud->display_as('dni','DNI');
		$crud->display_as('nombre','Nombre');
		$crud->columns('dni','nombre');
		$crud->required_fields('dni','nombre');
		$crud->unset_add();
		$crud->unset_delete();
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('empresa/empresa',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}