$idvehiculo_2=$id_cliente;
			$this->session->set_userdata('id_cliente', $id_cliente);
			$buscar_peritaje_existente=$this->peritaje_model->get_peritaje_vehiculo($idvehiculo_2);
			if ($buscar_peritaje_existente) {
				foreach ($buscar_peritaje_existente as $key) {
					$id_peritaje=$key->id_peritaje;
				}
				$this->session->set_flashdata('alerta_2', $id_peritaje);
					redirect('peritaje/grilla','refresh');
			}
			$id_nivel=1;
			$this->session->set_userdata('id_cliente', $id_cliente);
			$data = array(
			'vehiculo_cliente' =>$this->vehiculo_model->get_vehiculo_id($id_cliente),
			'inspeccion'=>$this->inspeccion_model->get_inspeccion(),
			'inspeccion_general'=>$this->inspeccion_model->get_inspeccion_general(),
			'usuario'=>$this->usuario_model->get_usuario_id_nivel($id_nivel));
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
			/*si el cliente no ha seleccionado nada*/
			if ($id_cliente==0){
			$this->session->set_flashdata('alerta', 'Debe Crear o Seleccionar un Cliente para poder Continuar');
			redirect('peritaje/grilla','refresh');
		}