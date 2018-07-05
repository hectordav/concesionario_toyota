<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modelo_producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('tipo_producto_model');
	}
	public function index(){
			redirect('modelo_producto/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_modelo_producto');
		$crud->set_subject('Modelo Producto');
		$crud->set_relation('id_marca_producto','t_marca_producto','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_marca_producto','Marca Producto');
		$crud->display_as('descripcion','Modelo Producto');
		$crud->columns('id_marca_producto','descripcion');
		$crud->required_fields('id_marca_producto','descripcion');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('modelo_producto/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('modelo_producto/modelo_producto',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_modelo_producto');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$data_tipo['tipo']=$this->tipo_producto_model->get_tipo_producto();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('modelo_producto/add',$data_tipo);
		$this->load->view('../../assets/script/script_combo_2');
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	#***************llena el combo de la marca****************
	public function fill_marca() {
         $id_tipo = $this->input->post('id_tipo');
         echo $idEstado;
        if($id_tipo){
            $marca = $this->tipo_producto_model->get_marca_producto($id_tipo);
            echo '<option value="0">Seleccione</option>';
            foreach($marca as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
            echo '<option value="0">Sin Resultados</option>';
        }
    }
    #********************************************************************************
    public function guardar_modelo(){
		try {
		  $id_marca = $this->input->post('id_marca');
		  $modelo= $this->input->post('txt_modelo');
		  $this->tipo_producto_model->guardar_modelo_producto($id_marca, $modelo);
		  redirect('modelo_producto/grilla');
		} catch (Exception $e) {
		}
	}
	function id_primaria($primary_key , $row){
		return site_url('modelo_producto/edit').'/'.$row->id;
	}
	public function edit(){
		try {
		$id_modelo = $this->uri->segment(3);
		$data_modelo = array('modelo' =>$this->tipo_producto_model->get_modelo_producto($id_modelo),
		 'tipo'=>$this->tipo_producto_model->get_tipo_producto());
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('modelo_producto/edit',$data_modelo);
		$this->load->view('../../assets/script/script_combo_2');
		$this->load->view('../../assets/inc/footer_common',$output);
		} catch (Exception $e) {
		}
	}
	public function actualizar_modelo_producto(){
		try {
		  $id_modelo= $this->input->post('txt_id_modelo');
		  $id_marca = $this->input->post('id_marca');
		  $modelo= $this->input->post('txt_modelo');
		  $this->tipo_producto_model->actualizar_modelo_producto($id_modelo,$id_marca, $modelo);
		  redirect('modelo_producto/grilla');
		} catch (Exception $e) {
			echo $e->message;
		}
	}
}