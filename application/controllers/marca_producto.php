<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Marca_producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('marca_producto/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca_producto');
		$crud->set_subject('Marca Producto');
		$crud->set_relation('id_tipo_producto','t_tipo_producto','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_tipo_producto','Tipo Producto');
		$crud->display_as('descripcion','Marca producto');
		$crud->columns('id_tipo_producto','descripcion');
		$crud->required_fields('id_tipo_producto','descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('marca_producto/marca_producto',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}

}