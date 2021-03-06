<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sucursal extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('sucursal/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_sucursal');
		$crud->set_relation('id_empresa','t_empresa','nombre');
		$crud->set_subject('sucursal');
		$crud->set_language('spanish');
		$crud->display_as('dni','DNI');
		$crud->display_as('nombre','Nombre');
		$crud->columns('dni','nombre');
		$crud->required_fields('dni','nombre');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('sucursal/sucursal',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}