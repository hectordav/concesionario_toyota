<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ano_fabricacion extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('ano_fabricacion/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_ano_fabricacion');
		$crud->set_relation('id_modelo','t_modelo','descripcion');
		$crud->set_subject('Año');
		$crud->set_language('spanish');
		$crud->display_as('id_modelo','Modelo');
		$crud->display_as('descripcion','Año');
		$crud->columns('id_modelo','descripcion');
		$crud->required_fields('id_modelo','descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('ano_fabricacion/ano_fabricacion',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}
