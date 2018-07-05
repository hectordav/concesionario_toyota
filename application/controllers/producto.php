<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('tipo_producto_model');
			$this->load->model('producto_model');
	}
	public function index(){
			redirect('producto/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_producto');
		$crud->set_subject('producto');
		$crud->set_relation('id_modelo_producto','t_modelo_producto','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_modelo_producto','Modelo Producto');
		$crud->display_as('descripcion','producto');
		$crud->columns('id_modelo_producto','descripcion');
		$crud->required_fields('id_modelo_producto','descripcion');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('producto/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('producto/producto',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function fill_modelo() {
	    $id_marca = $this->input->post('id_marca');
        if($id_marca){
            $modelo = $this->tipo_producto_model->get_modelo_combo($id_marca);
            echo '<option value="0">Seleccione</option>';
            foreach($modelo as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
           echo '<option value="0">Sin Resultados</option>';
        }
    }
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_producto');
		$crud->set_subject('producto');
		$output = $crud->render();
		$data_tipo['tipo']=$this->tipo_producto_model->get_tipo_producto();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('producto/add',$data_tipo);
		$this->load->view('../../assets/script/script_combo_2');
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	 public function guardar_producto(){
		try {
		  $id_modelo = $this->input->post('id_modelo');
		  $producto= $this->input->post('txt_producto');
		  $this->producto_model->guardar_producto($id_modelo, $producto);
		  redirect('producto/grilla');
		} catch (Exception $e) {
		}
	}	
	function id_primaria($primary_key , $row){
		return site_url('producto/edit').'/'.$row->id;
	}
	public function edit(){
		try {
		$id_producto = $this->uri->segment(3);
		$data_producto = array('producto' =>$this->producto_model->get_producto($id_producto),
		 'tipo'=>$this->tipo_producto_model->get_tipo_producto());
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('producto/edit',$data_producto);
		$this->load->view('../../assets/script/script_combo_2');
		$this->load->view('../../assets/inc/footer_common',$output);
		} catch (Exception $e) {
		}
	}
		public function editar_producto(){
		try {
		  $id_producto= $this->input->post('txt_id_producto');
		  $id_modelo = $this->input->post('id_modelo');
		  $producto= $this->input->post('txt_producto');
		  $this->producto_model->actualizar_producto($id_producto,$id_modelo, $producto);
		  redirect('producto/grilla');
		} catch (Exception $e) {
			echo $e->message;
		}
	}	

}