<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vehiculo extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('cliente_model');
			$this->load->model('vehiculo_model');
			$this->load->model('tipo_combustible_model');
			$this->load->model('tipo_carroceria_model');
			$this->load->model('tipo_model');
			$this->load->model('color_model');
			$this->load->model('marca_model');
	}
	public function index(){
			redirect('vehiculo/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_vehiculo');
		$crud->set_subject('Vehiculo');
		$crud->set_relation('id_tipo_combustible','t_tipo_combustible','descripcion');
		$crud->set_relation('id_tipo','t_tipo','descripcion');
		$crud->set_relation('id_marca','t_marca','descripcion');
		$crud->set_relation('id_modelo','t_modelo','descripcion');
		$crud->set_relation('id_color','t_color','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_tipo_carroceria','Carroceria');
		$crud->display_as('id_tipo','Tipo');
		$crud->display_as('id_marca','Marca');
		$crud->display_as('id_modelo','Modelo');
		$crud->display_as('id_tipo_combustible','Combustible');
		$crud->display_as('ano','Año');
		$crud->display_as('patente','Patente');
		$crud->display_as('serial_carroceria','SN/ Carroceria');
		$crud->display_as('serial_motor','SN/ Motor');
		$crud->display_as('kilometraje','Km');
		$crud->display_as('id_color','Color');
		$crud->display_as('documento_propiedad','Documento Propiedad');
		$crud->columns('id_tipo','id_marca','id_modelo','ano','id_color','patente','kilometraje');
		$crud->required_fields('id_tipo','id_marca','id_modelo','id_color','patente','kilometraje');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('vehiculo/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('vehiculo/vehiculo',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_vehiculo');
		$crud->set_subject('Vehiculo');
		$output = $crud->render();
		$data = array(
			'tipo_vehiculo'=>$this->tipo_model->get_tipo(),
			'tipo_combustible'=>$this->tipo_combustible_model->get_tipo_combustible(),
			'color'=>$this->color_model->get_color(),
			'marca'=>$this->marca_model->get_marca());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('vehiculo/add_vehiculo',$data);
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
	}
	public function add_vehiculo(){
		$id_cliente=$this->input->post('id_cliente', TRUE);
		$dni=$this->input->post('txt_dni', TRUE);
		$nombre=$this->input->post('txt_nombre', TRUE);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_vehiculo');
		$crud->set_subject('Vehiculo');
		$output = $crud->render();
		if ($dni){
			$buscar=$this->cliente_model->buscar_cliente($dni);
			/*si cliente ya existe.*/
			if ($buscar) {
			$this->session->set_flashdata('alerta', 'Cliente ya existe');
			redirect('vehiculo/grilla','refresh');
			}
				$this->cliente_model->guardar_cliente($dni,$nombre);
					$data = array(
					'cliente' =>$this->cliente_model->buscar_cliente($dni),
					'tipo_vehiculo'=>$this->tipo_model->get_tipo(),
					'tipo_combustible'=>$this->tipo_combustible_model->get_tipo_combustible(),
					'color'=>$this->color_model->get_color(),
					'marca'=>$this->marca_model->get_marca());
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('vehiculo/add_vehiculo',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common_add',$output);
				
		}else{
			/*si el cliente no ha seleccionado nada*/
			if ($id_cliente==0) {
				$this->session->set_flashdata('alerta', 'Debe Crear o Seleccionar un Cliente para poder Continuar');
				redirect('vehiculo/grilla','refresh');
			}else{
				$data = array(
					'cliente' =>$this->cliente_model->buscar_cliente_id($id_cliente),
					'tipo_vehiculo'=>$this->tipo_model->get_tipo(),
					'tipo_combustible'=>$this->tipo_combustible_model->get_tipo_combustible(),
					'color'=>$this->color_model->get_color(),
					'marca'=>$this->marca_model->get_marca());
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('vehiculo/add_vehiculo',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common_add',$output);
			}
		}		
	}
	public function guardar_vehiculo(){
		$id_tipo_combustible=$this->input->post('id_combustibles', TRUE);
		$id_tipo=$this->input->post('id_tipo', TRUE);
		$id_marca=$this->input->post('id_marca', TRUE);
		$id_modelo=$this->input->post('id_modelo', TRUE);
		$ano=$this->input->post('txt_ano', TRUE);
		$id_color=$this->input->post('id_color', TRUE);
		$patente=$this->input->post('txt_patente', TRUE);
		$serial_carroceria=$this->input->post('txt_serial_carroceria', TRUE);
		$serial_motor=$this->input->post('txt_sn_motor', TRUE);
		$kilometraje=$this->input->post('txt_kilometraje', TRUE);
		$buscar_vehiculo=$this->vehiculo_model->get_vehiculo_patente($patente);
		if ($buscar_vehiculo) {
				$this->session->set_flashdata('alerta', 'Vehiculo o Patente ya existe');
				redirect('vehiculo/grilla','refresh');
		}
		$this->vehiculo_model->guardar_vehiculo($id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$ano,$id_color,$patente,$serial_carroceria,$serial_motor,$kilometraje);
				$this->session->set_flashdata('alerta', 'Vehiculo guardado');
				redirect('vehiculo/grilla','refresh');
}
	function id_primaria($primary_key , $row){
		return site_url('vehiculo/edit').'/'.$row->id;
	}
	public function edit(){
		try {
		$id_vehiculo = $this->uri->segment(3);
		if ($id_vehiculo==null) {
			redirect('vehiculo','refresh');
		}
		$data = array('vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
		'tipo_vehiculo'=>$this->tipo_model->get_tipo(),
		'marca'=>$this->marca_model->get_marca(),
		'tipo_combustible'=>$this->tipo_combustible_model->get_tipo_combustible(),
		'color'=>$this->color_model->get_color());
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('vehiculo/edit',$data);
			$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
		} catch (Exception $e) {
		}
	}
	public function editar_vehiculo(){
		$id_vehiculo=$this->input->post('txt_id_vehiculo', TRUE);
		$id_tipo_combustible=$this->input->post('id_combustibles', TRUE);
		$id_tipo=$this->input->post('id_tipo', TRUE);
		$id_marca=$this->input->post('id_marca', TRUE);
		$id_modelo=$this->input->post('id_modelo', TRUE);
		$id_tipo_carroceria=$this->input->post('id_carroceria', TRUE);
		$id_color=$this->input->post('id_color', TRUE);
		$ano=$this->input->post('txt_ano', TRUE);
		$patente=$this->input->post('txt_patente', TRUE);
		$serial_carroceria=$this->input->post('txt_serial_carroceria', TRUE);
		$serial_motor=$this->input->post('txt_sn_motor', TRUE);
		$kilometraje=$this->input->post('txt_kilometraje', TRUE);
		$this->vehiculo_model->actualizar_vehiculo($id_vehiculo,$id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$id_color,$ano,$patente,$serial_carroceria,$serial_motor,$kilometraje);
				$this->session->set_flashdata('alerta', 'Vehiculo actualizado Correctamente');
				redirect('vehiculo/grilla','refresh');	
	}
}
/*fin del controller :-D*/
