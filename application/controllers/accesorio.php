<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesorio extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('tipo_model');
			$this->load->model('accesorio_model');
	}
	public function index(){
			redirect('accesorio/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_accesorio');
		$crud->set_subject('Accesorio');
		$crud->set_relation('id_modelo','t_modelo','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_modelo','Modelo');
		$crud->display_as('descripcion','Accesorio');
		$crud->columns('id_modelo','descripcion');
		$crud->required_fields('id_modelo','descripcion');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('accesorio/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('accesorio/accesorio',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$data_tipo['tipo']=$this->tipo_model->get_tipo();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('accesorio/add',$data_tipo);
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	 #***************llena el combo del modelo****************
	public function fill_modelo() {
	    $id_marca = $this->input->post('id_marca');
        if($id_marca){
            $modelo = $this->tipo_model->get_modelo_combo($id_marca);
            echo '<option value="0">Seleccione Modelo</option>';
            foreach($modelo as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
           echo '<option value="0">Sin Resultados</option>';
        }
    }
    public function guardar_accesorio(){
		try {
		  $id_marca = $this->input->post('id_marca');
		  $accesorio= $this->input->post('txt_accesorio');
		  $this->accesorio_model->guardar_accesorio($id_marca, $accesorio);
		  redirect('accesorio/grilla');
		} catch (Exception $e) {
		}
	}
	function id_primaria($primary_key , $row){
		return site_url('accesorio/edit').'/'.$row->id;
	}
	public function edit(){
		try {
		$id_accesorio = $this->uri->segment(3);
		$data_modelo = array('accesorio' =>$this->accesorio_model->get_accesorio($id_accesorio),
		 'tipo'=>$this->tipo_model->get_tipo());
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('accesorio/edit',$data_modelo);
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common',$output);
		} catch (Exception $e) {
		}
	}
		public function editar_accesorio(){
		try {
		  $id_accesorio= $this->input->post('txt_id_accesorio');
		  $id_modelo = $this->input->post('id_modelo');
		  $accesorio= $this->input->post('txt_accesorio');
		  $this->accesorio_model->actualizar_accesorio($id_accesorio,$id_modelo, $accesorio);
		  redirect('accesorio/grilla');
		} catch (Exception $e) {
			echo $e->message;
		}
	}	

}