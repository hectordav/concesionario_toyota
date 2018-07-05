<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('nivel_model');
			$this->load->model('usuario_model');
			$this->load->helper('security');
	}
	public function index(){
			redirect('usuario/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_relation('id_nivel','t_nivel','descripcion');
		$crud->set_relation('id_estado_usuario','t_estado_usuario','descripcion');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$crud->display_as('nombre','Nombre');
		$crud->display_as('login','Login');
		$crud->display_as('clave','Clave');
		$crud->display_as('id_nivel','Nivel');
		$crud->display_as('id_estado_usuario','Estado');
		$crud->columns('nombre','login','id_nivel','id_estado_usuario');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'fn_editar'));
		$crud->add_action('Cambiar Estado', '', '','fa fa-arrow	',array($this,'fn_cambiar_estado'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('usuario/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('usuario/usuario',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	function fn_cambiar_estado($primary_key , $row){
		return site_url('usuario/cambiar_estado').'/'.$row->id;
	}
	function fn_editar($primary_key , $row){
		return site_url('usuario/editar').'/'.$row->id;
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$output = $crud->render();
		$data = array('nivel' =>$this->nivel_model->get_nivel());
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('usuario/add',$data);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function editar(){
		$id_usuario['id_usuario']=$this->uri->segment(3);
			if ($id_usuario['id_usuario']) {
					$usuario_2=$this->session->set_userdata($id_usuario);
			}
		$id_usuario=$this->session->userdata('id_usuario');
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$output = $crud->render();
		$data = array('nivel' =>$this->nivel_model->get_nivel(),
			'usuario'=>$this->usuario_model->get_usuario_id($id_usuario));
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('usuario/edit',$data);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function guardar_usuario(){
		$this->form_validation->set_rules('id_nivel', 'Nivel', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('txt_login', 'Login', 'required|valid_email');
		$this->form_validation->set_rules('txt_clave', 'Clave', 'required');
		$this->form_validation->set_rules('txt_clave_2', ' Confirmacion de Clave', 'required|matches[txt_clave]');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
		$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->add();
			}else{
			$id_nivel=$this->input->post('id_nivel',TRUE);
			$nombre=$this->input->post('txt_nombre',TRUE);
			$login=$this->input->post('txt_login',TRUE);
			$clave=do_hash($this->input->post('txt_clave',TRUE));
			$estado_usuario=1;
			$this->usuario_model->guardar_usuario($id_nivel,$estado_usuario,$nombre,$login,$clave);
					redirect('usuario/grilla','refresh');

			}
		}
		public function actualizar_usuario(){
			$this->form_validation->set_rules('id_nivel', 'Nivel', 'required|callback_check_default');
			$this->form_validation->set_rules('txt_nombre', 'Nombre', 'trim|required');
			$this->form_validation->set_rules('txt_login', 'Login', 'required|valid_email');
			$this->form_validation->set_rules('txt_clave', 'Clave', 'required');
			$this->form_validation->set_rules('txt_clave_2', ' Confirmacion de Clave', 'required|matches[txt_clave]');
			$this->form_validation->set_message("required","El campo %s es Requerido");
			$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
			$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->editar();
			}else{
			$id_usuario=$this->input->post('txt_id_usuario',TRUE);
			$id_nivel=$this->input->post('id_nivel',TRUE);
			$nombre=$this->input->post('txt_nombre',TRUE);
			$login=$this->input->post('txt_login',TRUE);
			$clave=do_hash($this->input->post('txt_clave',TRUE));
			$estado_usuario=1;
			$this->usuario_model->actualizar_usuario($id_usuario,$id_nivel,$estado_usuario,$nombre,$login,$clave);
					redirect('usuario/grilla','refresh');

			}
		}
		public function cambiar_estado(){
			$id_usuario['id_usuario']=$this->uri->segment(3);
			if ($id_usuario['id_usuario']) {
					$usuario_2=$this->session->set_userdata($id_usuario);
			}
			$id_usuario=$this->session->userdata('id_usuario');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$data = array('nivel' =>$this->nivel_model->get_nivel(),
			'usuario'=>$this->usuario_model->get_usuario_id($id_usuario),
			'estado'=>$this->usuario_model->get_estado());
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('usuario/cambiar_estado',$data);
			$this->load->view('../../assets/inc/footer_common',$output);
		}
		public function guardar_cambiar_estado(){
			$this->form_validation->set_rules('id_estado', 'Estado', 'required|callback_check_default');
			$this->form_validation->set_message("callback_check_default","Debe seleccionar el campo %s");
			if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->cambiar_estado();
			}else{
				$id_usuario=$this->input->post('txt_id_usuario',TRUE);
				$id_estado=$this->input->post('id_estado',TRUE);
				$this->usuario_model->actualizar_estado_usuario($id_usuario,$id_estado);
				redirect('usuario/grilla','refresh');
		}
	}
}