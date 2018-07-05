<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contra_peritaje extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->library('upload');
			$this->load->library('session');
			$this->load->model('cliente_model');
			$this->load->model('tipo_model');
			$this->load->model('tipo_combustible_model');
			$this->load->model('tipo_carroceria_model');
			$this->load->model('vehiculo_model');
			$this->load->model('inspeccion_model');
			$this->load->model('peritaje_model');
			$this->load->model('contra_peritaje_model');
	}
	public function index(){
			redirect('contra_peritaje/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_contra_peritaje');
		$crud->set_subject('Contra Peritaje');
		$crud->set_relation('id_peritaje','t_peritaje','fecha');
		$crud->set_relation('id_usuario_que_revisa','t_usuario','nombre');
		$crud->set_relation('id_cliente','t_cliente','{dni}, {nombre}');
		$crud->set_relation('id_vehiculo','t_vehiculo','patente');
		$crud->set_relation('id_recomendable','t_recomendable','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_peritaje','Cliente');
		$crud->display_as('id_usuario_que_revisa','Revisado por');
		$crud->display_as('id_cliente','Cliente');
		$crud->display_as('id_vehiculo','Vehiculo');
		$crud->display_as('fecha','Fecha');
		$crud->display_as('total_gasto','Total gasto');
		$crud->display_as('precio_estimado','Precio');
		$crud->display_as('observaciones','Observaciones');
		$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
		$crud->columns('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','precio_estimado','total_gasto','tasacion','observaciones');
		$crud->required_fields('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','valor_estimado','total_gastos','tasacion','observaciones');
		/*$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));*/
		$crud->unset_read();
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('contra_peritaje/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/peritaje',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	
	function fn_ver($primary_key , $row){
		return site_url('contra_peritaje/ver').'/'.$row->id;
	}

	public function ver(){
			try {
		$id_contra_peritaje['id_contra_peritaje'] = $this->uri->segment(3);
		if ($id_contra_peritaje['id_contra_peritaje']) {
			$id_contra_peritaje_2=$this->session->set_userdata($id_contra_peritaje);
		}else{
			$this->session->set_flashdata('alerta', 'Debe Seleccionar un contra peritaje para poder continuar');
			redirect('contra_peritaje/grilla','refresh');
		}
		$id_contra_peritaje=$id_contra_peritaje['id_contra_peritaje'];
		$data = array(
			'contra_peritaje' =>$this->contra_peritaje_model->get_contra_peritaje($id_contra_peritaje),
			'det_contra_peritaje'=>$this->contra_peritaje_model->get_det_contra_peritaje($id_contra_peritaje),
			'adjunto_peritaje'=>$this->contra_peritaje_model->get_adjunto_contra_peritaje($id_contra_peritaje),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion());	

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('peritaje');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('contra_peritaje/ver',$data);
		$this->load->view('../../assets/script/script_contra_peritaje',$data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		} catch (Exception $e) {
		}
		
	}
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$data = array(
		'peritaje' =>$this->peritaje_model->get_peritaje_todos());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('modal/modal_contra_peritaje',$data);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('contra_peritaje/add');
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
	}
	public function add_contra_peritaje(){
	
		$id_vehiculo = $this->uri->segment(3);
		if ($id_vehiculo==null) {
			$id_vehiculo_2=$this->input->post('id_peritaje', TRUE);
			
		}
		if ($id_vehiculo_2==0) {
			$this->session->set_flashdata('alerta', 'Debe Seleccionar un Vehiculo para poder continuar');
			redirect('contra_peritaje/grilla','refresh');
		}
		$id_vehiculo=$id_vehiculo_2;
				
			$ultimo_peritaje_vehiculo=$this->peritaje_model->get_max_peritaje_id_vehiculo($id_vehiculo);
			foreach ($ultimo_peritaje_vehiculo as $key) {
				$id_ultimo_peritaje=$key->id;
			}


			$consulta_peritaje_original=$this->peritaje_model->get_peritaje($id_ultimo_peritaje);
			foreach ($consulta_peritaje_original as $key) {

				$id_peritaje_original=$key->id_peritaje_original;
			}
				


			$consulta_contra_peritaje=$this->contra_peritaje_model->get_contra_peritaje_id_peritaje($id_peritaje_original, $id_ultimo_peritaje);
		/*	echo "$id_peritaje_original";
			print_r($consulta_contra_peritaje);
			echo "consulta_contra_peritaje";
			exit();*/
			if ($consulta_contra_peritaje){

				$id_peritaje2['id_peritaje']=$id_peritaje_original;
				$this->session->set_userdata($id_peritaje2);
			foreach ($consulta_contra_peritaje as $key) {
				$id_contraperitaje=$key->id_contra_peritaje;
			}
				/*get_peritaje($id_peritaje)*/
			$data = array('peritaje' =>$this->peritaje_model->get_peritaje($id_ultimo_peritaje),
			'det_peritaje'=>$this->peritaje_model->get_det_peritaje($id_ultimo_peritaje),
			'adjunto_peritaje'=>$this->peritaje_model->get_adjunto_peritaje($id_ultimo_peritaje),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
			'id_contra_peritaje'=>$id_contraperitaje,
			'id_peritaje'=>$id_ultimo_peritaje,
			'alerta'=>1);
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_peritaje');
				$crud->set_subject('peritaje');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('contra_peritaje/add_copia_contra_peritaje',$data);
				$this->load->view('../../assets/script/script_contra_peritaje',$data);
				$this->load->view('../../assets/script/script_precio_2',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);

			}else{
				
				$data = array('peritaje' =>$this->peritaje_model->get_peritaje($id_ultimo_peritaje),
			'det_peritaje'=>$this->peritaje_model->get_det_peritaje($id_ultimo_peritaje),
			'adjunto_peritaje'=>$this->peritaje_model->get_adjunto_peritaje($id_ultimo_peritaje),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
			'alerta'=>0);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('peritaje');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('contra_peritaje/add_contra_peritaje',$data);
		$this->load->view('../../assets/script/script_contra_peritaje',$data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}
	}

	public function guardar_contra_peritaje(){
	
		$id_peritaje=$this->input->post('txt_id_peritaje', TRUE);
		$id_cliente=$this->input->post('txt_id_cliente', TRUE);
		$id_vehiculo=$this->input->post('txt_id_vehiculo', TRUE);
		$kilometraje=$this->input->post('txt_km','true');
		$km_nuevo=$this->input->post('txt_km_2','true');
		$manual=$this->input->post('manual', TRUE);
		$llaves=$this->input->post('llave', TRUE);
		$duplicado=$this->input->post('duplicado', TRUE);
		$precio_estimado=$this->input->post('txt_precio_estimado', TRUE);
		$total_gasto=$this->input->post('txt_total_gasto', TRUE);
		$total_c_peritaje=$this->input->post('txt_total_c_peritaje','true');
		$observaciones=$this->input->post('txt_observaciones', TRUE);
		$observaciones_c_peritaje=$this->input->post('txt_observaciones_c_peritaje','true');
		$fecha_peritaje=date('Y-m-d', strtotime($this->input->post('txt_fecha_peritaje', TRUE)));
		$fecha_c_peritaje = date('Y-m-d');
		$id_estado=1;
		if ($manual==1) {
			$manual_u=$this->input->post('manual_usuario', TRUE);
			$manual_s=$this->input->post('manual_servicio', TRUE);
			}else{
				$manual_u=null;
				$manual_s=null;
			}
		$this->contra_peritaje_model->guardar_contra_peritaje($id_peritaje,$id_vehiculo,$km_nuevo,$id_estado,$id_cliente,$manual, $manual_u,$manual_s,$llaves,$duplicado, $precio_estimado,$total_c_peritaje,$observaciones_c_peritaje,$fecha_peritaje,$fecha_c_peritaje);
	
		$buscar_contra_peritaje=$this->contra_peritaje_model->get_max_contra_peritaje_id_vehiculo($id_vehiculo);
		foreach ($buscar_contra_peritaje as $data) {
			$id_contra_peritaje=$data->id;
		}
		/*hace el recorrido de los datos de las inspecciones y luego lo guarda en det_peritaje*/
		$inspeccion=$this->inspeccion_model->get_inspeccion();
		foreach ($inspeccion as $data) {
			$id_inspeccion=$data->id;
		/*	$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion);*/
		/*	$id_estado_inspeccion=$this->input->post('radio_'.$id_inspeccion);*/
			$observaciones=$this->input->post('txt_observacion_cp_'.$id_inspeccion, TRUE);
			$costo=$this->input->post('txt_costo_c_peritaje'.$id_inspeccion);
			$id_c_peritaje=$this->input->post('radiocp_'.$id_inspeccion, TRUE);
			/*$id_reparable=$this->input->post('reparable_'.$id_inspeccion, TRUE);*/
			$this->contra_peritaje_model->guardar_det_contra_peritaje($id_contra_peritaje,$id_inspeccion,$id_c_peritaje,$costo,$observaciones);

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
			$mi_archivo_9 = 'mi_archivo_9';

			
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_9']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_9')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
		/************fin del adjunto*/
			$this->session->set_flashdata('alerta', 'Contra Peritaje Guardado Correctamente');
			redirect('contra_peritaje/grilla','refresh');
		/******************/
	}
	public function guardar_copia_contra_peritaje(){
		$id_peritaje=$this->input->post('txt_id_peritaje', TRUE);
		$id_contra_peritaje=$this->input->post('txt_id_contra_peritaje','true');
		$id_cliente=$this->input->post('txt_id_cliente', TRUE);
		$id_vehiculo=$this->input->post('txt_id_vehiculo', TRUE);
		$kilometraje=$this->input->post('txt_km','true');
		$km_nuevo=$this->input->post('txt_km_2','true');
		$manual=$this->input->post('txt_manual', TRUE);
		$llaves=$this->input->post('txt_llaves', TRUE);
		$precio_estimado=$this->input->post('txt_precio_estimado', TRUE);
		$total_gasto=$this->input->post('txt_total_gasto', TRUE);
		$total_c_peritaje=$this->input->post('txt_total_c_peritaje','true');
		$observaciones=$this->input->post('txt_observaciones', TRUE);
		$observaciones_c_peritaje=$this->input->post('txt_observaciones_c_peritaje','true');
		$fecha_peritaje=date('Y-m-d', strtotime($this->input->post('txt_fecha_peritaje', TRUE)));
		$fecha_c_peritaje = date('Y-m-d');
		$id_estado=1;

		$this->contra_peritaje_model->guardar_copia_contra_peritaje($id_peritaje,$id_contra_peritaje,$id_vehiculo,$km_nuevo,$id_estado,$id_cliente,$manual,$llaves,$precio_estimado,$total_c_peritaje,$observaciones_c_peritaje,$fecha_peritaje,$fecha_c_peritaje);
	
		$buscar_contra_peritaje=$this->contra_peritaje_model->get_max_contra_peritaje_id_vehiculo($id_vehiculo);
		foreach ($buscar_contra_peritaje as $data) {
			$id_contra_peritaje=$data->id;
		}
		/*hace el recorrido de los datos de las inspecciones y luego lo guarda en det_peritaje*/
		$inspeccion=$this->inspeccion_model->get_inspeccion();
		foreach ($inspeccion as $data) {
			$id_inspeccion=$data->id;
		/*	$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion);*/
		/*	$id_estado_inspeccion=$this->input->post('radio_'.$id_inspeccion);*/
			$observaciones=$this->input->post('txt_observacion_cp_'.$id_inspeccion, TRUE);
			$costo=$this->input->post('txt_costo_c_peritaje'.$id_inspeccion);
			$id_c_peritaje=$this->input->post('radiocp_'.$id_inspeccion, TRUE);
			/*$id_reparable=$this->input->post('reparable_'.$id_inspeccion, TRUE);*/
			$this->contra_peritaje_model->guardar_det_contra_peritaje($id_contra_peritaje,$id_inspeccion,$id_c_peritaje,$costo,$observaciones);
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
			$mi_archivo_9 = 'mi_archivo_9';

			
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
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
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_9']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_9')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->contra_peritaje_model->guardar_adjunto_contra_peritaje($id_contra_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
		/************fin del adjunto*/
			$this->session->set_flashdata('alerta', 'Contra Peritaje Guardado Correctamente');
			redirect('contra_peritaje/grilla','refresh');
		/******************/
	
	}
}