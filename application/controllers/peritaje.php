<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Peritaje extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->library('upload');
			$this->load->library('form_validation');
			$this->load->model('cliente_model');
			$this->load->model('tipo_model');
			$this->load->model('tipo_combustible_model');
			$this->load->model('tipo_carroceria_model');
			$this->load->model('vehiculo_model');
			$this->load->model('inspeccion_model');
			$this->load->model('peritaje_model');
			$this->load->model('usuario_model');
			$this->load->model('color_model');
			$this->load->model('marca_model');
	}
	public function index(){
			redirect('peritaje/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$crud->set_relation('id_usuario_que_revisa','t_usuario','nombre');
		$crud->set_relation('id_vehiculo','t_vehiculo','patente');
		$crud->set_relation('id_cliente','t_cliente','nombre');
		$crud->set_language('spanish');
		$crud->display_as('id_usuario_que_revisa','Revisado por');
		$crud->display_as('id_cliente','Cliente');
		$crud->display_as('id_vehiculo','Patente Vehiculo');
		$crud->display_as('fecha','Fecha Peritaje');
		$crud->display_as('precio_estimado','Precio Estimado');
		$crud->display_as('total_gasto','Total gasto');
		$crud->display_as('tasacion','Tasacion');
		$crud->display_as('observaciones','Observacion');
		$crud->columns('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','precio_estimado','total_gasto','tasacion','observaciones');
		$crud->required_fields('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','valor_estimado','total_gastos','tasacion','observaciones');
		/*$crud->add_action('Contra Peritaje', '', '','fa fa-plus',array($this,'fn_contra_peritaje'));*/
		$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
		$crud->unset_read();
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('peritaje/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/peritaje',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function grilla_vendedor(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$crud->set_relation('id_usuario_que_revisa','t_usuario','nombre');
		$crud->set_relation('id_vehiculo','t_vehiculo','patente');
		$crud->set_relation('id_cliente','t_cliente','nombre');
		$crud->set_language('spanish');
		$crud->display_as('id_usuario_que_revisa','Revisado por');
		$crud->display_as('id_cliente','Cliente');
		$crud->display_as('id_vehiculo','Patente Vehiculo');
		$crud->display_as('fecha','Fecha Peritaje');
		$crud->display_as('precio_estimado','Precio Estimado');
		$crud->display_as('total_gasto','Total gasto');
		$crud->display_as('tasacion','Tasacion');
		$crud->display_as('observaciones','Observacion');
		$crud->columns('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','precio_estimado','total_gasto','tasacion','observaciones');
		$crud->required_fields('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','valor_estimado','total_gastos','tasacion','observaciones');
		/*$crud->add_action('Contra Peritaje', '', '','fa fa-plus',array($this,'fn_contra_peritaje'));*/
		$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
		$crud->add_action('Ver copias creadas', '', '','fa fa-eye',array($this,'fn_ver_copia_grilla'));
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));

		$crud->unset_read();
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('peritaje/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/peritaje',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function grilla_copia(){
		try {
		$id_peritaje=$this->uri->segment(3);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_copia_peritaje');
		$crud->where('id_peritaje',$id_peritaje);
		$crud->set_subject('Copia Peritaje');
		$crud->set_relation('id_usuario_que_revisa','t_usuario','nombre');
		$crud->set_relation('id_vehiculo','t_vehiculo','patente');
		$crud->set_relation('id_cliente','t_cliente','nombre');
		$crud->set_language('spanish');
		$crud->display_as('id_usuario_que_revisa','Revisado por');
		$crud->display_as('id_cliente','Cliente');
		$crud->display_as('id_vehiculo','Patente Vehiculo');
		$crud->display_as('fecha','Fecha Peritaje');
		$crud->display_as('precio_estimado','Precio Estimado');
		$crud->display_as('total_gasto','Total gasto');
		$crud->display_as('tasacion','Tasacion');
		$crud->display_as('observaciones','Observacion');
		$crud->columns('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','precio_estimado','total_gasto','tasacion','observaciones');
		$crud->required_fields('id_usuario_que_revisa','id_cliente','id_vehiculo','fecha','valor_estimado','total_gastos','tasacion','observaciones');
		$crud->add_action('Ver copia', '', '','fa fa-eye',array($this,'fn_ver_copia'));
		$crud->unset_add();
		$crud->unset_read();
		$crud->unset_edit();
		$crud->unset_delete();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add'){
			 redirect('peritaje/add');
		}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/peritaje',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
	public function fill_vehiculo() {
         $id_cliente = $this->input->post('id_cliente');
        if($id_cliente){
            $marca = $this->vehiculo_model->get_vehiculo_cliente($id_cliente);
            echo '<option value="0">Seleccione Vehiculo Asociado</option>';
            foreach($marca as $fila){
                echo '<option value="'. $fila->id_vehiculo .'">Patente:'. $fila->placa_vehiculo.'</option>';
            }
        }  else {
            echo '<option value="0">Sin Resultados</option>';
        }
    }
	public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$data = array(
		'cliente_vehiculo' =>$this->cliente_model->get_cliente(),
		'vehiculo' =>$this->vehiculo_model->get_vehiculo(),
		'tipo_vehiculo'=>$this->tipo_model->get_tipo(),
		'tipo_combustible'=>$this->tipo_combustible_model->get_tipo_combustible(),
		'tipo_carroceria'=>$this->tipo_carroceria_model->get_tipo_carroceria(),
		'color'=>$this->color_model->get_color(),
		'marca'=>$this->marca_model->get_marca());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('modal/modal_peritaje',$data);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/add');
		$this->load->view('../../assets/script/script_mostrar_ocultar_cliente');
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common_add',$output);
	}
	public function canvas_corolla(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$data['id_cliente']=$this->session->userdata('id_cliente');
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('peritaje/canvas_corolla',$data);
	}
	public function canvas_hilux(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_peritaje');
		$crud->set_subject('Peritaje');
		$output = $crud->render();
		$data['id_cliente']=$this->session->userdata('id_cliente');
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('peritaje/canvas_hilux',$data);
	}
	public function add_cliente_vehiculo(){
		# $dispara_cliente y $dispara_vehiculo se cambian del script mostrar_ocultar_cliente
		$dispara_cliente=$this->input->post('txt_dispara_cliente',TRUE);
		$dispara_vehiculo=$this->input->post('txt_dispara_vehiculo',TRUE);
		$id_cliente=$this->input->post('id_cliente', TRUE);
		$id_vehiculo=$this->input->post('id_vehiculo_2',TRUE);
		$dni=$this->input->post('txt_dni', TRUE);
		$nombre=$this->input->post('txt_nombre', TRUE);
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
		/***********dispara cliente 1*/
			/*********************Dispara 0-0*************************/
		if ($dispara_cliente==0 && $dispara_vehiculo==0) {
				if ($id_cliente && $id_vehiculo) {
				$buscar_peritaje_vehiculo=$this->peritaje_model->get_peritaje_vehiculo($id_vehiculo);
				if ($buscar_peritaje_vehiculo) {
					foreach ($buscar_peritaje_vehiculo as $key) {
						$id_peritaje=$key->id_peritaje;
					}
						$id_nivel=5;
						$data = array(
					'id_peritaje'=>$id_peritaje,
					'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
					'cliente'=>$this->cliente_model->get_cliente_id($id_cliente),
					'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
					'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
					'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
					/*********************************************************/
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_peritaje');
					$crud->set_subject('Peritaje');
					$output = $crud->render();
					$this->load->view('../../assets/inc/head_common_add', $output);
					$this->load->view('../../assets/inc/menu_lateral');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('peritaje/add_peritaje_2',$data);
					$this->load->view('../../assets/script/script_precio_producto',$data);
					$this->load->view('../../assets/inc/footer_common_add',$output);
				}else{
					$id_nivel=5;
							$data = array(
							'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
							'cliente'=>$this->cliente_model->get_cliente_id($id_cliente),
							'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
							'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
							'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
							/*********************************************************/
							$crud = new grocery_CRUD();
							$crud->set_theme('bootstrap');
							$crud->set_table('t_peritaje');
							$crud->set_subject('Peritaje');
							$output = $crud->render();
							$this->load->view('../../assets/inc/head_common_add', $output);
							$this->load->view('../../assets/inc/menu_lateral');
							$this->load->view('../../assets/inc/menu_superior');
							$this->load->view('peritaje/add_peritaje',$data);
							$this->load->view('../../assets/script/script_precio_producto',$data);
							$this->load->view('../../assets/inc/footer_common_add',$output);
				}
				}else{
					$this->session->set_flashdata('alerta', 'Seleccione un CLiente y un Vehiculo para poder continuar');
							redirect('peritaje/grilla','refresh');
					}
		 } 
		 /*****************dispara 1-1*****************/
		 if ($dispara_cliente==1 && $dispara_vehiculo==1) {
		 	if ($dni && $nombre && $id_tipo_combustible && $id_tipo && $id_marca && $id_modelo && $ano && $id_color && $patente && $serial_carroceria && $serial_motor && $kilometraje) {

		 		$buscar_cliente=$this->cliente_model->buscar_cliente($dni);
		 		if ($buscar_cliente) {
		 				$this->session->set_flashdata('alerta', 'Cliente ya existe');
							redirect('peritaje/grilla','refresh');
		 		}
		 		$buscar_vehiculo=$this->vehiculo_model->get_vehiculo_patente($patente);
		 		if ($buscar_vehiculo) {
		 				$this->session->set_flashdata('alerta', 'Vehiculo ya existe. Puede buscarlo en la seleccion de vehiculo de Agregar Peritaje');
					redirect('peritaje/grilla','refresh');
		 		}
		 		$this->cliente_model->guardar_cliente($dni,$nombre);
		 		$this->vehiculo_model->guardar_vehiculo($id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$ano,$id_color,$patente,$serial_carroceria,$serial_motor,$kilometraje);
		 		$buscar_vehiculo_2=$this->vehiculo_model->get_vehiculo_patente($patente);
		 		$buscar_cliente=$this->cliente_model->buscar_cliente($dni);
		 		foreach ($buscar_vehiculo_2 as $key) {
		 			$id_vehiculo=$key->id_vehiculo;
		 		}
		 		foreach ($buscar_cliente as $key) {
		 			$id_cliente=$key->id;
		 		}
		 		$id_nivel=5;
							$data = array(
							'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
							'cliente'=>$this->cliente_model->get_cliente_id($id_cliente),
							'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
							'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
							'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
							/*********************************************************/
							$crud = new grocery_CRUD();
							$crud->set_theme('bootstrap');
							$crud->set_table('t_peritaje');
							$crud->set_subject('Peritaje');
							$output = $crud->render();
							$this->load->view('../../assets/inc/head_common_add', $output);
							$this->load->view('../../assets/inc/menu_lateral');
							$this->load->view('../../assets/inc/menu_superior');
							$this->load->view('peritaje/add_peritaje',$data);
							$this->load->view('../../assets/script/script_precio_producto',$data);
							$this->load->view('../../assets/inc/footer_common_add',$output);

		 	}else{
		 			$this->session->set_flashdata('alerta', 'Debe Ingresar los datos del cliente y del vehiculo para poder continuar');
							redirect('peritaje/grilla','refresh');
					}
					/*********************fin de dispara 1-1***************************/

		 	}elseif ($dispara_cliente==1 && $dispara_vehiculo==0) {
			if ($dni && $nombre &&$id_vehiculo) {
				$buscar=$this->cliente_model->buscar_cliente($dni);
				if ($buscar) {
				$this->session->set_flashdata('alerta', 'Cliente ya existe');
				redirect('peritaje/grilla','refresh');
				}
			$this->cliente_model->guardar_cliente($dni,$nombre);
			$buscar=$this->cliente_model->buscar_cliente($dni);
			$buscar_peritaje_vehiculo=$this->peritaje_model->get_peritaje_vehiculo($id_vehiculo);
			foreach ($buscar as $data) {
				$id_cliente_2=$data->id;
			}
			if ($buscar_peritaje_vehiculo) {
					foreach ($buscar_peritaje_vehiculo as $key) {
						$id_peritaje=$key->id_peritaje;
						$id_vehiculo=$key->id_vehiculo;
					}
					$id_nivel=5;
						$data = array(
					'id_peritaje'=>$id_peritaje,
					'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
					'cliente'=>$this->cliente_model->get_cliente_id($id_cliente_2),
					'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
					'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
					'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
					/*********************************************************/
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_peritaje');
					$crud->set_subject('Peritaje');
					$output = $crud->render();
					$this->load->view('../../assets/inc/head_common_add', $output);
					$this->load->view('../../assets/inc/menu_lateral');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('peritaje/add_peritaje_2',$data);
					$this->load->view('../../assets/script/script_precio_producto',$data);
					$this->load->view('../../assets/inc/footer_common_add',$output);	
				}else{
					/*si no existe el peritaje*/
					$id_nivel=5;
					$data = array(
					'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
					'cliente'=>$this->cliente_model->get_cliente_id($id_cliente_2),
					'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
					'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
					'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
					/*********************************************************/
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_peritaje');
					$crud->set_subject('Peritaje');
					$output = $crud->render();
					$this->load->view('../../assets/inc/head_common_add', $output);
					$this->load->view('../../assets/inc/menu_lateral');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('peritaje/add_peritaje',$data);
					$this->load->view('../../assets/script/script_precio_producto',$data);
					$this->load->view('../../assets/inc/footer_common_add',$output);
				}
				
				/**************************/
			}else{
					$this->session->set_flashdata('alerta', 'Debe Ingresar los datos de crear cliente y seleccionar el Vehiculo para poder continuar');
					redirect('peritaje/grilla','refresh');
			}
			/*****fin de dispara cliente*****/
		}elseif ($dispara_cliente==0 && $dispara_vehiculo==1) {
			if ($id_cliente && $id_tipo_combustible && $id_tipo && $id_marca && $id_modelo && $ano && $id_color && $patente && $serial_carroceria && $serial_motor && $kilometraje) {
				$buscar_patente=$this->vehiculo_model->get_vehiculo_patente($patente);
				if ($buscar_patente) {
					$this->session->set_flashdata('alerta', 'Vehiculo ya existe. Puede buscarlo en la seleccion de vehiculo de Agregar Peritaje');
					redirect('peritaje/grilla','refresh');
				}
			$this->vehiculo_model->guardar_vehiculo($id_tipo_combustible,$id_tipo,$id_marca,$id_modelo,$ano,$id_color,$patente,$serial_carroceria,$serial_motor,$kilometraje);
			$buscar_patente=$this->vehiculo_model->get_vehiculo_patente($patente);
			foreach ($buscar_patente as $key) {
				$id_vehiculo=$key->id_vehiculo;
			}
				$id_nivel=5;
					$data = array(
					'vehiculo' =>$this->vehiculo_model->get_vehiculo_id($id_vehiculo),
					'cliente'=>$this->cliente_model->get_cliente_id($id_cliente),
					'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
					'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
					'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
					/*********************************************************/
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_peritaje');
					$crud->set_subject('Peritaje');
					$output = $crud->render();
					$this->load->view('../../assets/inc/head_common_add', $output);
					$this->load->view('../../assets/inc/menu_lateral');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('peritaje/add_peritaje',$data);
					$this->load->view('../../assets/script/script_precio_producto',$data);
					$this->load->view('../../assets/inc/footer_common_add',$output);

			}else{
			$this->session->set_flashdata('alerta', 'Debe Ingresar los datos de crear Vehiculo y seleccionar el Cliente para poder continuar');
					redirect('peritaje/grilla','refresh');
			}
			/****************fin de dispara vehiculo*******************/
		}
		
	}
	public function guardar_original_copia_peritaje(){
		$this->form_validation->set_rules('id_usuario_vendedor', 'Cliente', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_km_2', 'Codigo', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		/***************************************************/
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
			$this->session->set_flashdata('alerta', 'Debe seleccionar el kilometraje y asignar un usuario para poder continuar');
					redirect('peritaje/grilla','refresh');
			
		}else{
		
		$id_vehiculo=$this->input->post('txt_id_vehiculo', TRUE);
		$id_cliente=$this->input->post('txt_id_cliente', TRUE);
		$id_peritaje=$this->input->post('txt_id_peritaje',TRUE);
		$manual=$this->input->post('manual', TRUE);
		$llaves=$this->input->post('llave', TRUE);
		$duplicado=$this->input->post('duplicado', TRUE);
		$precio_estimado=$this->input->post('txt_precio_estimado', TRUE);
		$total_gasto=$this->input->post('txt_total_gasto', TRUE);
		$observaciones=$this->input->post('txt_observaciones', TRUE);
		$observaciones_2="Nota: hubo un peritaje anterior realizado. # de peritaje: ".$id_peritaje." Puede buscarlo en los registros de Peritaje. Comentario del Tecnico: ";
		$observaciones_3=$observaciones_2.$observaciones;
		$id_recomendable=$this->input->post('txt_recomendado', TRUE);
		$radio_recomendado=$this->input->post('recomendable',TRUE);
		$motor=$this->input->post('estado_inspeccion_1',TRUE);
		$carroceria=$this->input->post('estado_inspeccion_2',true);
		$pintura=$this->input->post('estado_inspeccion_3',true);
		$vuelco=$this->input->post('estado_inspeccion_4',true);
		$choque=$this->input->post('estado_inspeccion_5',true);
		$id_usuario_vendedor=$this->input->post('id_usuario_vendedor',TRUE);
		$km_2=$this->input->post('txt_km_2','true');
		$fecha = date('Y-m-d');
			if ($manual==1) {
			$manual_u=$this->input->post('manual_usuario', TRUE);
			$manual_s=$this->input->post('manual_servicio', TRUE);
			}else{
				$manual_u=null;
				$manual_s=null;
			}
			$this->peritaje_model->guardar_peritaje_original_copia($id_peritaje, $id_vehiculo, $id_cliente, $id_recomendable,$id_usuario_vendedor,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $km_2, $precio_estimado, $total_gasto, $observaciones_2, $fecha);
		/*busca el ultimo peritaje*/
		$buscar_peritaje=$this->peritaje_model->get_max_peritaje();
		foreach ($buscar_peritaje as $data) {
			$id_peritaje=$data->id;
		}
		/*****
		/*hace el recorrido de los datos de las inspecciones y luego lo guarda en det_peritaje*/
		$inspeccion=$this->inspeccion_model->get_inspeccion();
		if ($id_recomendable==1 && $radio_recomendado==1) {
		
				foreach ($inspeccion as $data) {
				$id_inspeccion=$data->id;
				$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion);
				$id_estado_inspeccion=$this->input->post('estado_'.$id_inspeccion);
				$observacion=$this->input->post('txt_observacion_'.$id_inspeccion, TRUE);
				$costo=$this->input->post('txt_costo_'.$id_inspeccion);
				$this->peritaje_model->guardar_det_peritaje($id_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo);
				}	
			}else{
				foreach ($inspeccion as $data) {
				$id_inspeccion=$data->id;
				$id_inspeccionado=1;
				$id_estado_inspeccion=3;
				$observacion="No recomendado";
				$costo="0";
				$this->peritaje_model->guardar_det_peritaje($id_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo);
			}
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
		/************fin del adjunto*/
		$this->session->set_flashdata('alerta', 'Peritaje Guardado Correctamente');
			redirect('peritaje/grilla','refresh');
		/******************/
		/*fin del else de las validaciones*/
		}
		/*****************************************************/
}

	public function guardar_peritaje(){
		$id_vehiculo=$this->input->post('txt_id_vehiculo', TRUE);
		$id_cliente=$this->input->post('txt_id_cliente', TRUE);
		$manual=$this->input->post('manual', TRUE);
		$llaves=$this->input->post('llave', TRUE);
		$duplicado=$this->input->post('duplicado', TRUE);
		$precio_estimado=$this->input->post('txt_precio_estimado', TRUE);
		$total_gasto=$this->input->post('txt_total_gasto', TRUE);
		$observaciones=$this->input->post('txt_observaciones', TRUE);
		$id_recomendable=$this->input->post('txt_recomendado', TRUE);
		$radio_recomendado=$this->input->post('recomendable',TRUE);
		$motor=$this->input->post('estado_inspeccion_1',TRUE);
		$carroceria=$this->input->post('estado_inspeccion_2',true);
		$pintura=$this->input->post('estado_inspeccion_3',true);
		$vuelco=$this->input->post('estado_inspeccion_4',true);
		$choque=$this->input->post('estado_inspeccion_5',true);
		/*hasta que guarde la parte de usuarios OJO OJO OJO*/
		/*$id_usuario_vendedor=$this->input->post('id_usuario_vendedor',TRUE);*/
		$id_usuario_vendedor=null;
		$fecha = date('Y-m-d');
			if ($manual==1) {
			$manual_u=$this->input->post('manual_usuario', TRUE);
			$manual_s=$this->input->post('manual_servicio', TRUE);
			}else{
				$manual_u=null;
				$manual_s=null;
			}
					$this->peritaje_model->guardar_peritaje($id_vehiculo, $id_cliente, $id_recomendable,$id_usuario_vendedor,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $precio_estimado, $total_gasto, $observaciones, $fecha);
		/*busca el ultimo peritaje*/
		$buscar_peritaje=$this->peritaje_model->get_max_peritaje();
		foreach ($buscar_peritaje as $data) {
			$id_peritaje=$data->id;
		}
		/*****
		/*hace el recorrido de los datos de las inspecciones y luego lo guarda en det_peritaje*/
		$inspeccion=$this->inspeccion_model->get_inspeccion();
		if ($id_recomendable==1 && $radio_recomendado==1) {
		
				foreach ($inspeccion as $data) {
				$id_inspeccion=$data->id;
				$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion);
				$id_estado_inspeccion=$this->input->post('estado_'.$id_inspeccion);
				$observacion=$this->input->post('txt_observacion_'.$id_inspeccion, TRUE);
				$costo=$this->input->post('txt_costo_'.$id_inspeccion);
				$this->peritaje_model->guardar_det_peritaje($id_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo);
				}	
			}else{
				
				foreach ($inspeccion as $data) {
				$id_inspeccion=$data->id;
				$id_inspeccionado=1;
				$id_estado_inspeccion=3;
				$observacion="No recomendado";
				$costo="0";
				$this->peritaje_model->guardar_det_peritaje($id_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo);
			}
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
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
						$this->peritaje_model->guardar_adjunto_peritaje($id_peritaje,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
		/************fin del adjunto*/
		$this->session->set_flashdata('alerta', 'Peritaje Guardado Correctamente');
			redirect('peritaje/grilla','refresh');
		/******************/
}
	function id_primaria($primary_key , $row){
		return site_url('peritaje/edit').'/'.$row->id;
	}
	function fn_ver($primary_key , $row){
		return site_url('peritaje/ver').'/'.$row->id;
	}
	function fn_ver_copia($primary_key , $row){
		return site_url('peritaje/ver_copia_peritaje').'/'.$row->id;
	}
	function fn_ver_copia_grilla($primary_key , $row){
		return site_url('peritaje/grilla_copia').'/'.$row->id;
	}
	public function fn_contra_peritaje($primary_key , $row){
		return site_url('contra_peritaje/add_contra_peritaje').'/'.$row->id;
	}
	public function edit(){
	
		$id_peritaje = $this->uri->segment(3);
		if ($id_peritaje==null) {
			$this->session->set_flashdata('alerta', 'Debe seleccionar un peritaje para continuar');
			redirect('peritaje/grilla','refresh');
		}
		$buscar=$this->peritaje_model->get_peritaje($id_peritaje);
		if (!$buscar) {
			$this->session->set_flashdata('alerta', 'Registro no encontrado');
			redirect('peritaje/grilla','refresh');
		}
		$id_nivel=5;
		$data = array(
			'peritaje' =>$this->peritaje_model->get_peritaje($id_peritaje),
			'det_peritaje'=>$this->peritaje_model->get_det_peritaje($id_peritaje),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
			'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
			'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/edit_2',$data);
		$this->load->view('../../assets/script/script_precio_2',$data);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function guardar_copia_peritaje(){
		$id_peritaje=$this->input->post('txt_id_peritaje', TRUE);
		if (!$id_peritaje) {
			redirect('peritaje/grilla','refresh');
		}
		$manual=$this->input->post('manual', TRUE);
		$llaves=$this->input->post('llave', TRUE);
		$duplicado=$this->input->post('duplicado', TRUE);
		$precio_estimado=$this->input->post('txt_precio_estimado', TRUE);
		$total_gasto=$this->input->post('txt_total_gasto', TRUE);
		$observaciones=$this->input->post('txt_observaciones', TRUE);
		$observaciones_2="Nota: Existe un primer peritaje anterior realizado. # de peritaje: ".$id_peritaje." Puede verlo en el boton de abajo. Comentario del Tecnico: ";
		$observaciones_3=$observaciones_2.$observaciones;
		$id_recomendable=$this->input->post('txt_recomendado', TRUE);
		$radio_recomendado=$this->input->post('recomendable',TRUE);
		$motor=$this->input->post('estado_inspeccion_1',TRUE);
		$carroceria=$this->input->post('estado_inspeccion_2',true);
		$pintura=$this->input->post('estado_inspeccion_3',true);
		$vuelco=$this->input->post('estado_inspeccion_4',true);
		$choque=$this->input->post('estado_inspeccion_5',true);
		$id_usuario_vendedor=$this->input->post('id_usuario_vendedor',TRUE);
		$fecha = date('Y-m-d');
		if ($manual==1) {
			$manual_u=$this->input->post('manual_usuario', TRUE);
			$manual_s=$this->input->post('manual_servicio', TRUE);
			}else{
				$manual_u=null;
				$manual_s=null;
			}
		$buscar_peritaje_original=$this->peritaje_model->get_peritaje($id_peritaje);
		foreach ($buscar_peritaje_original as $key) {
			$id_cliente=$key->id_cliente;
		/*	$id_usuario_que_revisa=$key->id_usuario_que_revisa;*/ /*pendiente con esta parte*/
			$id_vehiculo=$key->id_vehiculo;
			$fecha_peritaje=$key->fecha_peritaje;
			$precio_estimado=$key->precio_estimado_peritaje;
		}
		$this->peritaje_model->guardar_copia_peritaje($id_peritaje,$id_usuario_vendedor,$id_vehiculo, $id_cliente, $id_recomendable,$motor,$carroceria,$pintura,$vuelco,$choque, $manual,$manual_u,$manual_s,$llaves, $duplicado, $precio_estimado, $total_gasto, $observaciones_3, $fecha);
		/*hace el recorrido de los datos de las inspecciones y luego lo guarda en det_peritaje*/
		$buscar_ultima_copia_peritaje=$this->peritaje_model->get_max_copia_peritaje();
		foreach ($buscar_ultima_copia_peritaje as $data) {
				$id_copia_peritaje=$data->id;	
			}
		$det_peritaje=$this->peritaje_model->get_det_peritaje($id_peritaje);
		foreach ($det_peritaje as $data) {
			$id_det_peritaje=$data->id_det_peritaje;
			$id_inspeccion=$data->id_inspeccion_peritaje;
			$id_inspeccionado=$this->input->post('radio_'.$id_inspeccion);
			$id_estado_inspeccion=$this->input->post('estado_'.$id_inspeccion);
			$observacion=$this->input->post('txt_observacion_'.$id_inspeccion, TRUE);
			$costo=$this->input->post('txt_costo_'.$id_inspeccion);
			$this->peritaje_model->guardar_copia_det_peritaje($id_copia_peritaje,$id_inspeccion,$id_inspeccionado,$id_estado_inspeccion,$observacion,$costo);
					}
		$adjunto_peritaje=$this->peritaje_model->get_adjunto_peritaje($id_peritaje);
		foreach ($adjunto_peritaje as $data) {
			$id_adjunto_peritaje=$data->id;
		}
		$this->session->set_flashdata('alerta', 'Copia de Peritaje Guardada puede buscarla al final de ver peritaje');
			redirect('peritaje/grilla','refresh');
	}
	public function ver(){
		try {
		$id_peritaje = $this->uri->segment(3);
		if ($id_peritaje==null) {
				$this->session->set_flashdata('alerta', 'Debe seleccionar un peritaje para continuar');
			redirect('peritaje/grilla','refresh');
		}
		$buscar=$this->peritaje_model->get_peritaje($id_peritaje);
		if (!$buscar) {
			$this->session->set_flashdata('alerta', 'Registro no encontrado');
			redirect('peritaje/grilla','refresh');
		}
		$data = array('peritaje' =>$this->peritaje_model->get_peritaje($id_peritaje),
			'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
			'det_peritaje'=>$this->peritaje_model->get_det_peritaje($id_peritaje),
			'adjunto_peritaje'=>$this->peritaje_model->get_adjunto_peritaje($id_peritaje),
			'ver_peritaje_id_peritaje_original'=>$this->peritaje_model->get_peritaje_id_peritaje_original($id_peritaje));
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/ver',$data);
		/*$this->load->view('../../assets/script/script_combo');*/
		$this->load->view('../../assets/script/script_ver_no_ver');
		$this->load->view('../../assets/inc/footer_common',$output);
		} catch (Exception $e) {
		}
	}

	public function ver_copia_peritaje(){
		try {
		$id_peritaje = $this->uri->segment(3);
		if ($id_peritaje==null) {
				$this->session->set_flashdata('alerta', 'Debe seleccionar un peritaje para continuar');
			redirect('peritaje/grilla','refresh');
		}
		$buscar=$this->peritaje_model->get_copia_peritaje($id_peritaje);

		if (!$buscar) {
			$this->session->set_flashdata('alerta', 'Registro no encontrado');
			redirect('peritaje/grilla','refresh');
		}
		$id_nivel=5;
		$data = array('peritaje' =>$this->peritaje_model->get_copia_peritaje($id_peritaje),
			'det_peritaje'=>$this->peritaje_model->get_det_copia_peritaje($id_peritaje),
			'adjunto_peritaje'=>$this->peritaje_model->get_adjunto_peritaje($id_peritaje),
			'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/ver_copia_peritaje',$data);
		$this->load->view('../../assets/script/script_ver_no_ver');
		$this->load->view('../../assets/inc/footer_common',$output);
		} catch (Exception $e) {
		}
	}
	/*crea una nueva copia del peritaje ya hecho, esto es cuando un cliente lleva el vehiculo y el sistema ya lo tiene registrado */
	public function crear_copia_peritaje(){
		$id_peritaje=$this->uri->segment(3);
		$id_cliente=$this->uri->segment(4);
			if ($id_peritaje==null) {
			$this->session->set_flashdata('alerta', 'Debe seleccionar un peritaje para continuar');
			redirect('peritaje/grilla','refresh');
		}
		$buscar=$this->peritaje_model->get_peritaje($id_peritaje);
		if (!$buscar) {
			$this->session->set_flashdata('alerta', 'Registro no encontrado');
			redirect('peritaje/grilla','refresh');
		}
		$data = array(
			'cliente'=>$this->cliente_model->get_cliente_id($id_cliente),
			'peritaje' =>$this->peritaje_model->get_peritaje($id_peritaje),
			'det_peritaje'=>$this->peritaje_model->get_det_peritaje($id_peritaje),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
			'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general()
			/*'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel)*/);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$crud->set_subject('Marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('peritaje/add_peritaje_copia_peritaje',$data);
		$this->load->view('../../assets/script/script_precio_2',$data);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	/*crea el contra peritaje*/
	
	/**************************/
	
}