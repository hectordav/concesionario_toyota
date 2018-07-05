<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recepcion extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('contra_peritaje_model');
			$this->load->model('inspeccion_recepcion_model');
			$this->load->model('recepcion_model');
			$this->load->library('upload');
	}
	public function index(){
			redirect('recepcion/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_recepcion');
		$crud->set_relation('id_vehiculo','t_vehiculo','patente');
		$crud->set_subject('Recepcion');
		$crud->set_language('spanish');
		$crud->display_as('id_vehiculo','Patente Vehiculo');
		$crud->display_as('fecha','Fecha');
		$crud->columns('id_vehiculo','fecha');
		$crud->required_fields('id_vehiculo','fecha');
		$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
		$crud->unset_edit();
		$crud->unset_read();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('recepcion/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('recepcion/recepcion',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_contra_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$data = array(
		'contra_peritaje' =>$this->contra_peritaje_model->get_contra_peritaje_todos());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('modal/modal_recepcion',$data);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('recepcion/add');
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
	}
	function fn_ver($primary_key , $row){
		return site_url('recepcion/ver').'/'.$row->id;
		}
	public function ver(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_recepcion');
		$crud->set_subject('recepcion');
		$output = $crud->render();
		$id_recepcion['id_recepcion']=$this->uri->segment(3);
				if ($id_recepcion['id_recepcion']) {
					$this->session->set_userdata($id_recepcion);
					}
		$id_recepcion=$this->session->userdata('id_recepcion');
		$consulta=$this->recepcion_model->get_recepcion_id($id_recepcion);
		foreach ($consulta as $key) {
			$id_contra_peritaje=$key->id_contra_peritaje;
		}

	$data = array('contra_peritaje'=>$this->contra_peritaje_model->get_contra_peritaje($id_contra_peritaje),
	'recepcion' =>$this->recepcion_model->get_recepcion_id($id_recepcion),
	'det_recepcion'=>$this->recepcion_model->get_det_recepcion_id($id_recepcion),
	'adjunto_recepcion'=>$this->recepcion_model->get_adjunto_recepcion($id_recepcion),
	'inspeccion_recepcion'=>$this->inspeccion_recepcion_model->get_inspeccion_recepcion(),
	'det_inspeccion_recepcion1'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_1(),
	'det_inspeccion_recepcion2'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_2(),
	'det_inspeccion_recepcion3'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_3(),
	'det_inspeccion_recepcion4'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_4());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('recepcion/ver_recepcion',$data);
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
	}
	public function add_recepcion(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_contra_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$id_vehiculo=$this->input->post('id_contra_peritaje','true');
		if (!$id_vehiculo) {
			$this->session->set_flashdata('alerta', 'Seleccione un contra peritaje para continuar');
					redirect('recepcion/grilla','refresh');
		}else{


		$id_vehiculo=$this->input->post('id_contra_peritaje','true');
		$consulta=$this->contra_peritaje_model->get_max_contra_peritaje_id_vehiculo($id_vehiculo);
		foreach ($consulta as $key) {
			$id_contra_peritaje=$key->id;
		}
		$consulta_recepcion=$this->recepcion_model->get_recepcion_id_contra_peritaje($id_contra_peritaje);
		/*aqui consulta si ya existe una recepcion vieja*/
		if ($consulta_recepcion) {
			foreach ($consulta_recepcion as $key) {
				$id_recepcion_original=$key->id_recepcion;
			}
			$data = array('contra_peritaje' =>$this->contra_peritaje_model->get_contra_peritaje($id_contra_peritaje),
		'inspeccion_recepcion'=>$this->inspeccion_recepcion_model->get_inspeccion_recepcion(),
		'det_inspeccion_recepcion1'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_1(),
		'det_inspeccion_recepcion2'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_2(),
		'det_inspeccion_recepcion3'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_3(),
		'det_inspeccion_recepcion4'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_4(),
		'alerta'=>1,
		'id_recepcion'=>$id_recepcion_original);
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('recepcion/add_copia_recepcion',$data);
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
		/*si no existe crea una nueva recepcion*/
		}else{
			$data = array('contra_peritaje' =>$this->contra_peritaje_model->get_contra_peritaje($id_contra_peritaje),
		'inspeccion_recepcion'=>$this->inspeccion_recepcion_model->get_inspeccion_recepcion(),
		'det_inspeccion_recepcion1'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_1(),
		'det_inspeccion_recepcion2'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_2(),
		'det_inspeccion_recepcion3'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_3(),
		'det_inspeccion_recepcion4'=>$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion_4());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('recepcion/add_recepcion',$data);
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		}
	
	}
	public function guardar_recepcion(){
		$id_contra_peritaje=$this->input->post('txt_id_contra_peritaje','true');
		$id_vehiculo=$this->input->post('txt_id_vehiculo','true');
		$combustible=$this->input->post('radio_combustible','true');
		$limpieza=$this->input->post('txt_limpieza','true');
		$fecha=date('Y-m-d');
		$apto=$this->input->post('radio_apto','true');
		$this->recepcion_model->guardar_recepcion($id_contra_peritaje,$id_vehiculo,$combustible,$limpieza,$fecha,$apto);
		$consulta=$this->recepcion_model->get_max_recepcion();
		foreach ($consulta as $key) {
			$id_recepcion=$key->id;
		}
			$inspeccion=$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion();
		foreach ($inspeccion as $data) {
			$id_inspeccion_recepcion=$data->id;
			$observaciones=$this->input->post('txt_observacion'.$id_inspeccion_recepcion, TRUE);
			$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion_recepcion, TRUE);
			$this->recepcion_model->guardar_det_recepcion($id_recepcion,$id_inspeccion_recepcion,$id_inspeccionado,$observaciones);
		}
		/*****************subir los archivos**********************/
			$adjunto_verificacion='adjunto_verificacion';
			$mi_archivo_1 = 'mi_archivo_1';
			$mi_archivo_2 = 'mi_archivo_2';
			$mi_archivo_3 = 'mi_archivo_3';
			$mi_archivo_4 = 'mi_archivo_4';
			$mi_archivo_5 = 'mi_archivo_5';
			$mi_archivo_6 = 'mi_archivo_6';
			$mi_archivo_7 = 'mi_archivo_7';
			$mi_archivo_8 = 'mi_archivo_8';
				if (!empty($_FILES['adjunto_verificacion']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('adjunto_verificacion')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_1']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_1')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_2']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_2')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo=null;
						}
				}
				if (!empty($_FILES['mi_archivo_3']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_3')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_4']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_4')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_5']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_5')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_6']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_6')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_7']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_7')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_8']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_8')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
			
			$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
					redirect('recepcion/grilla','refresh');


	}
	public function guardar_copia_recepcion(){
		$id_recepcion_original=$this->input->post('txt_id_recepcion_original','true');
		$id_contra_peritaje=$this->input->post('txt_id_contra_peritaje','true');
		$id_vehiculo=$this->input->post('txt_id_vehiculo','true');
		$combustible=$this->input->post('radio_combustible','true');
		$limpieza=$this->input->post('txt_limpieza','true');
		$fecha=date('Y-m-d');
		$apto=$this->input->post('radio_apto','true');
		$this->recepcion_model->guardar_recepcion($id_contra_peritaje,$id_vehiculo,$combustible,$limpieza,$fecha,$apto);
		$consulta=$this->recepcion_model->get_max_recepcion();
		foreach ($consulta as $key) {
			$id_recepcion=$key->id;
		}
			$inspeccion=$this->inspeccion_recepcion_model->get_det_inspeccion_recepcion();
		foreach ($inspeccion as $data) {
			$id_inspeccion_recepcion=$data->id;
			$observaciones=$this->input->post('txt_observacion'.$id_inspeccion_recepcion, TRUE);
			$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion_recepcion, TRUE);
			$this->recepcion_model->guardar_det_recepcion($id_recepcion,$id_inspeccion_recepcion,$id_inspeccionado,$observaciones);
		}
		/*****************subir los archivos**********************/
			$adjunto_verificacion='adjunto_verificacion';
			$mi_archivo_1 = 'mi_archivo_1';
			$mi_archivo_2 = 'mi_archivo_2';
			$mi_archivo_3 = 'mi_archivo_3';
			$mi_archivo_4 = 'mi_archivo_4';
			$mi_archivo_5 = 'mi_archivo_5';
			$mi_archivo_6 = 'mi_archivo_6';
			$mi_archivo_7 = 'mi_archivo_7';
			$mi_archivo_8 = 'mi_archivo_8';
				if (!empty($_FILES['adjunto_verificacion']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('adjunto_verificacion')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_1']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_1')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_2']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_2')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo=null;
						}
				}
				if (!empty($_FILES['mi_archivo_3']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_3')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_4']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_4')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_5']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_5')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_6']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_6')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_7']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_7')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_8']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_8')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->recepcion_model->guardar_adjunto_recepcion($id_recepcion,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
			
			$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
					redirect('recepcion/grilla','refresh');


	}


}