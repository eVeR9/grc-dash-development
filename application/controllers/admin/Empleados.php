<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Empleados extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('upload');
			$this->load->model('admin/empleado_model', 'empleado_model');
		}

		public function index(){
			$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
			$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
			$data['puestos'] =  $this->empleado_model->get_all_puestos();
			$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
			//$data['departamentos'] = $this->empleado_model->getDepartamentos();
			$data['departamentos'] = $this->empleado_model->fetch_departamentos();
			$data['view'] = 'admin/empleados/empleado_list';
			$this->load->view('admin/layout', $data);
		}

		public function subir_archivo($numero_empleado, $campo, $archivo, $id_empleado)
        {			
					if($campo==""){
						$new_name=  $numero_empleado . '_' . $archivo . '.pdf';
					} else {
						$new_name=  $numero_empleado . '_' . $campo;
					}
					$path = './public/uploads/rh/empleados/documentos/';
					if(is_file($path . $new_name)) { @unlink($path . $new_name); }
					$config['file_name']		= $new_name;
					$config['upload_path'] 		= $path;
					$config['allowed_types']    = 'pdf';
					$config['max_size']         = 0;
					$config['file_ext_tolower'] = TRUE;
					$this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload($archivo))
                {		//si no se pudo subir
						echo $new_name;
						echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', 'Error al subir archivo'. $campo);
						redirect(base_url('admin/empleados'));
                }
                else
                {		// si se pudo subir
						$data = array('upload_data' => $this->upload->data());
						$data = array(
							'id_rh_empleados' => $id_empleado,
							'numero_empleado' => $numero_empleado,
							'nombre_archivo' => $new_name,
						);
						$result = $this->empleado_model->add_empleados_documentos($data);
                }
        }

		public function subir_archivo_equipo($numero_empleado, $fecha, $descripcion_equipo, $archivo, $id_empleado)
        {			
					$new_name=  $numero_empleado . '_' . $fecha . '.pdf';
					$path = './public/uploads/rh/empleados/documentos/equipos/';
					if(is_file($path . $new_name)) { @unlink($path . $new_name); }
					$config['file_name']		= $new_name;
					$config['upload_path'] 		= $path;
					$config['allowed_types']    = 'pdf';
					$config['max_size']         = 0;
					$config['file_ext_tolower'] = TRUE;
					$this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload($archivo))
                {		//si no se pudo subir
						echo $new_name;
						echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', 'Error al subir archivo '. $new_name);
						redirect(base_url('admin/empleados'));
                }
                else
                {		// si se pudo subir
						$data = array('upload_data' => $this->upload->data());
						$data = array(
							'id_rh_empleados' => $id_empleado,
							'numero_empleado' => $numero_empleado,
							'nombre_archivo' => $new_name,
							'descripcion_equipo' => $descripcion_equipo,
						);
						$result = $this->empleado_model->add_empleados_equipos($data);
                }
        }

		public function subir_fotografia($numero_empleado, $extension, $archivo, $id_empleado)
        {			
					$new_name=  $numero_empleado . $extension;
					$path = './public/uploads/rh/empleados/fotografias/';
					if(is_file($path . $new_name)) { @unlink($path . $new_name); }
					$config['file_name']		= $new_name;
					$config['upload_path'] 		= $path;
					$config['allowed_types']    = 'jpg';
					$config['max_size']         = 0;
					$config['file_ext_tolower'] = TRUE;
					$this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload($archivo))
                	{		//si no se pudo subir
						echo $new_name;
						echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', 'Error al subir archivo'. $campo);
						redirect(base_url('admin/empleados'));
                	}
                else
                	{		// si se pudo subir
						$data = array('upload_data' => $this->upload->data());
                	}
        }


  public function getDepartamentoPuestos(){
    // POST data 
    $postData = $this->input->post();
    // load model 
    $this->load->model('admin/empleado_model', 'empleado_model');
    // get data 
    $data = $this->empleado_model->getDepartamentoPuestos($postData);
    echo json_encode($data); 
  }


		 public function fetch_puestos()
		 {
		  if($this->input->post('id_departamento'))
		  {
		   echo $this->empleado_model->fetch_puestos($this->input->post('id_departamento'));
		  }
		 }

		
  public function NextEmpNumber(){
    // POST data
    $postData = $this->input->post();
    // load model 
    $this->load->model('admin/empleado_model', 'empleado_model');
	// get data
    $data = $this->empleado_model->getNextEmpNumber();
    echo json_encode($data);
  }
		
		public function add(){
			if($this->input->post('submit')){

				//$this->form_validation->set_rules('id_departamento', 'id_departamento', 'trim|required');
				//$this->form_validation->set_rules('id_puesto', 'id_puesto', 'trim|required');
				//$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				$this->form_validation->set_rules('contacto_emergencia', 'contacto de emergencia', 'trim');
				$this->form_validation->set_rules('tel_contacto_emergencia', 'tel_contacto_emergencia', 'trim');
				$this->form_validation->set_rules('numero_clabe', 'numero_clabe', 'trim');
				//$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required');
				//$this->form_validation->set_rules('nss', 'nss', 'trim|required');
				//$this->form_validation->set_rules('curp', 'curp', 'trim|required');
				//$this->form_validation->set_rules('tel_contacto', 'tel_contacto', 'trim|required');
				//$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
				//$this->form_validation->set_rules('fecha_de_nacimiento', 'fecha_de_nacimiento', 'trim|required');
				//$this->form_validation->set_rules('fecha_de_ingreso', 'fecha_ingreso', 'trim|required');
				//$this->form_validation->set_rules('fecha_salida', 'fecha_salida', 'trim|required');

				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
					$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
					$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
					$data['departamentos'] = $this->empleado_model->fetch_departamentos();
					$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
					$data['all_areas'] =  $this->empleado_model->get_all_areas();
					$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
					$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
					$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
					$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
					$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
					$data['all_tipo_sangre'] =  $this->empleado_model->get_all_tipo_sangre();
					//$data['departamentos'] = $this->empleado_model->getDepartamentos();
					//$data['departamentos'] = $this->empleado_model->fetch_departamentos();
					$data['view'] = 'admin/empleados/empleado_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$nombre_foto = $this->input->post('numero_empleado') . '.jpg';
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'domicilio' => $this->input->post('domicilio'),
						'tel_contacto' => $this->input->post('tel_contacto'),
						'contacto_emergencia' => $this->input->post('contacto_emergencia'),
						'tel_contacto_emergencia' => $this->input->post('tel_contacto_emergencia'),
						'fecha_de_nacimiento' => $this->input->post('fecha_de_nacimiento'),
						'curp' => $this->input->post('curp'),
						'sexo' => $this->input->post('sexo'),
						'nss' => $this->input->post('nss'),
						'rfc' => $this->input->post('rfc'),
						'fotografia' => $nombre_foto, 
						'fecha_de_ingreso' => $this->input->post('fecha_de_ingreso'),
						//'fecha_de_baja' => $fecha_baja,
						'numero_empleado' => $this->input->post('numero_empleado'),
						'id_empleado_estatus' => $this->input->post('id_empleado_estatus'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'id_area' => $this->input->post('id_area'),
						'id_departamento' => $this->input->post('id_departamento'),
						'id_puesto' => $this->input->post('id_puesto'),
						'id_tipo_contrato' => $this->input->post('id_tipo_contrato'),
						'id_banco' => $this->input->post('id_banco'),
						'id_forma_pago' => $this->input->post('id_forma_pago'),
						'id_frecuencia_pago' => $this->input->post('id_frecuencia_pago'),	
						'tipo_sangre' => $this->input->post('tipo_sangre'),	
						'alergias' => $this->input->post('alergias'),	
						'padecimientos' => $this->input->post('padecimientos'),
						'talla_camisa' => $this->input->post('talla_camisa'),
						'talla_pantalon' => $this->input->post('talla_pantalon'),
						'talla_zapatos' => $this->input->post('talla_zapatos'),
						'numero_clabe' => $this->input->post('numero_clabe'),												
						'created_at' => date('Y-m-d : h:m:s'),
						'created_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->empleado_model->add_empleado($data);
					if($result){
					
					// Subimos archivos
					$numero_empleado 	= $this->input->post('numero_empleado');
					$fotografia			= "fotografia";
					// SUBIR FOTOGRAFIA
					if($_FILES["fotografia"]["name"]!=="")
						{ 
							$extension=strtolower(substr($_FILES["fotografia"]["name"],-4));
							$this->subir_fotografia($numero_empleado, $extension, $fotografia);
						}
					
						$max_id = $this->empleado_model->max_id('rh_empleados');
	
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/empleados/view/'.$max_id));
					}
				}
			}
			else{
					$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
					$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
					$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
					$data['departamentos'] = $this->empleado_model->fetch_departamentos();
					$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
					$data['all_areas'] =  $this->empleado_model->get_all_areas();
					$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
					$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
					$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
					$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
					$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
					$data['all_tipo_sangre'] =  $this->empleado_model->get_all_tipo_sangre();
					//$data['departamentos'] = $this->empleado_model->getDepartamentos();
					//$data['departamentos'] = $this->empleado_model->fetch_departamentos();
				$data['view'] = 'admin/empleados/empleado_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				//$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required');
				//$this->form_validation->set_rules('tel_contacto', 'tel_contacto', 'trim|required');
				//$this->form_validation->set_rules('fecha_de_nacimiento', 'fecha_de_nacimiento', 'trim|required');
				//$this->form_validation->set_rules('curp', 'curp', 'trim|required');
				//$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
				//$this->form_validation->set_rules('nss', 'nss', 'trim|required');
				//$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');
				//$this->form_validation->set_rules('fecha_de_ingreso', 'fecha_de_ingreso', 'trim|required');
				//$this->form_validation->set_rules('fecha_de_baja', 'fecha_de_baja', 'trim|required');
				//$this->form_validation->set_rules('numero_empleado', 'numero_empleado', 'trim|required');
				//$this->form_validation->set_rules('id_empleado_estatus', 'id_empleado_estatus', 'trim|required');
				//$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				//$this->form_validation->set_rules('id_area', 'id_area', 'trim|required');
				//$this->form_validation->set_rules('id_departamento', 'id_departamento', 'trim|required');
				//$this->form_validation->set_rules('id_puesto', 'id_puesto', 'trim|required');
				//$this->form_validation->set_rules('id_tipo_contrato', 'id_tipo_contrato', 'trim|required');
				//$this->form_validation->set_rules('id_banco', 'id_banco', 'trim|required');
				//$this->form_validation->set_rules('id_forma_pago', 'id_forma_pago', 'trim|required');
				//$this->form_validation->set_rules('id_frecuencia_pago', 'id_frecuencia_pago', 'trim|required');
				


				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['empleado'] = $this->empleado_model->get_empleado_by_id($id);
					$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
					$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
					$data['departamentos'] = $this->empleado_model->fetch_departamentos();
					$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
					$data['all_areas'] =  $this->empleado_model->get_all_areas();
					$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
					$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
					$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
					$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
					$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
					$data['all_tipo_sangre'] =  $this->empleado_model->get_all_tipo_sangre();
					$data['view'] = 'admin/empleados/empleado_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					// Subimos archivos
					$id_empleado 		= $id;
					$numero_empleado 	= $this->input->post('numero_empleado');
					$campo				= $this->input->post('nombre_documento');
					$archivo			= "archivo_documento";
					$fotografia			= "fotografia";
					//SUBIR ATTACHMENT
					if($campo==""){
						if($_FILES["archivo_documento"]["name"]!==""){ $campo=$_FILES["archivo_documento"]["name"];}
					}
					if($campo!="") //Si nombre_documento esta en blanco
					{
						$this->subir_archivo($numero_empleado, $campo, $archivo, $id_empleado);
					}

					// Subimos documentos de equipos
					$id_empleado 		= $id;
					$numero_empleado 	= $this->input->post('numero_empleado');
					$fecha 				= date('Y_m_d_H_i_s');
					$descripcion_equipo	= $this->input->post('descripcion_equipo');
					$archivo			= "archivo_responsiva";
					$fotografia			= "fotografia";
					//SUBIR ATTACHMENT
					//if($descripcion_equipo==""){
					//	if($_FILES["archivo_responsiva"]["name"]!==""){ $descripcion_equipo=$_FILES["archivo_responsiva"]["name"]."_".date('Y_m_d_H_i_s');}
					//}
					if($_FILES["archivo_responsiva"]["name"]!=="") //Si existe un archivo subimos responsiva
					{
						$this->subir_archivo_equipo($numero_empleado, $fecha, $descripcion_equipo, $archivo, $id_empleado);
					}

					// SUBIR FOTOGRAFIA
					if($_FILES["fotografia"]["name"]!=="")
						{ 
							$extension=strtolower(substr($_FILES["fotografia"]["name"],-4));
							$this->subir_fotografia($numero_empleado, $extension, $fotografia, $id_empleado);
							
						}


					//$campo='doc_estado_cuenta';
					//$this->subir_archivo($numero_empleado, $campo);
					//$campo='doc_extraordinaria';
					//$this->subir_archivo($numero_empleado, $campo);
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'domicilio' => $this->input->post('domicilio'),
						'tel_contacto' => $this->input->post('tel_contacto'),
						'contacto_emergencia' => $this->input->post('contacto_emergencia'),
						'tel_contacto_emergencia' => $this->input->post('tel_contacto_emergencia'),
						'fecha_de_nacimiento' => $this->input->post('fecha_de_nacimiento'),
						'curp' => $this->input->post('curp'),
						'sexo' => $this->input->post('sexo'),
						'nss' => $this->input->post('nss'),
						'rfc' => $this->input->post('rfc'),
						'fotografia' => $numero_empleado . '.jpg',
						'fecha_de_ingreso' => $this->input->post('fecha_de_ingreso'),
						'fecha_de_baja' => $this->input->post('fecha_de_baja'),
						'numero_empleado' => $this->input->post('numero_empleado'),
						'id_empleado_estatus' => $this->input->post('id_empleado_estatus'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'id_area' => $this->input->post('id_area'),
						'id_departamento' => $this->input->post('id_departamento'),
						'id_puesto' => $this->input->post('id_puesto'),
						'id_tipo_contrato' => $this->input->post('id_tipo_contrato'),
						'id_banco' => $this->input->post('id_banco'),
						'id_forma_pago' => $this->input->post('id_forma_pago'),
						'id_frecuencia_pago' => $this->input->post('id_frecuencia_pago'),	
						'tipo_sangre' => $this->input->post('tipo_sangre'),	
						'alergias' => $this->input->post('alergias'),	
						'padecimientos' => $this->input->post('padecimientos'),
						'talla_camisa' => $this->input->post('talla_camisa'),
						'talla_pantalon' => $this->input->post('talla_pantalon'),
						'talla_zapatos' => $this->input->post('talla_zapatos'),
						'numero_clabe' => $this->input->post('numero_clabe'),											
						'updated_at' => date('Y-m-d : h:m:s'),
						'updated_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->empleado_model->edit_empleado($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/empleados/view/'.$id));
					}
				}
			}
			else{
				$data['empleado'] = $this->empleado_model->get_empleado_by_id($id);
				$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
				$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
				$data['departamentos'] = $this->empleado_model->fetch_departamentos();
				$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
				$data['all_areas'] =  $this->empleado_model->get_all_areas();
				$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
				$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
				$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
				$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
				$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
				$data['all_tipo_sangre'] =  $this->empleado_model->get_all_tipo_sangre();
				$data['view'] = 'admin/empleados/empleado_edit';
				$this->load->view('admin/layout', $data);
				
			}
		}


		public function view_anterior($id = 0){
				$data['empleado'] = $this->empleado_model->get_empleado_by_id($id);
				$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
				$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
				$data['departamentos'] = $this->empleado_model->fetch_departamentos();
				$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
				$data['all_areas'] =  $this->empleado_model->get_all_areas();
				$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
				$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
				$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
				$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
				$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
				$data['view'] = 'admin/empleados/empleado_view-anterior';
				$this->load->view('admin/layout', $data);
		}

		public function view($id = 0){
			$data['empleado'] = $this->empleado_model->get_all_empleados_id($id);
			$data['all_empleados_documentos'] = $this->empleado_model->get_all_empleados_documentos($id);
			$data['all_empleados_equipos'] = $this->empleado_model->get_all_empleados_equipos($id);
			$data['all_departamentos'] =  $this->empleado_model->get_all_departamentos();
			$data['all_registro_patronal'] =  $this->empleado_model->get_all_registro_patronal();
			$data['departamentos'] = $this->empleado_model->fetch_departamentos();
			$data['all_puestos'] =  $this->empleado_model->get_all_puestos();
			$data['all_areas'] =  $this->empleado_model->get_all_areas();
			$data['all_empleados_estatus'] =  $this->empleado_model->get_all_empleados_estatus();
			$data['all_tipo_contrato'] =  $this->empleado_model->get_all_tipo_contrato();
			$data['all_bancos'] =  $this->empleado_model->get_all_bancos();
			$data['all_nomina_forma_pago'] =  $this->empleado_model->get_all_nomina_forma_pago();
			$data['all_nomina_frecuencia_pago'] =  $this->empleado_model->get_all_nomina_frecuencia_pago();
			$data['view'] = 'admin/empleados/empleado_view';
			$this->load->view('admin/layout', $data);
	}


		public function del_nousar($id = 0){
			$this->db->delete('empleados', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/empleados'));
		}

		function delete_empleados_documentos($id, $file_name, $emp_id){
			// Delete Record
			$result=$this->empleado_model->delete_empleados_documentos($id); 
			// Delete File in Folder
			$path = './public/uploads/rh/empleados/documentos/';
			$full_link = $path . $file_name;
			unlink($full_link);

			if($result){
				$this->session->set_flashdata('msg', 'Registro Actualizado!');
				redirect(base_url('admin/empleados/view/'.$emp_id));
			}
}
	  

	function delete_empleados_equipos($id, $file_name, $emp_id)
	{
		// Delete Record
		$result=$this->empleado_model->delete_empleados_equipos($id); 
		// Delete File in Folder
		$path = './public/uploads/rh/empleados/documentos/equipos/';
		$full_link = $path . $file_name;
		unlink($full_link);

		if($result){
			$this->session->set_flashdata('msg', 'Registro Actualizado!');
			redirect(base_url('admin/empleados/view/'.$emp_id));
		}
	}

	public function excel_import(){
		$data['view'] = 'admin/empleados/empleado_excel_import';
		$data['num_rows'] = $this->db->get('rh_empleados_biotime')->num_rows();
		$this->load->view('admin/layout', $data);
}


	public function import_excel() {
		echo "1) Empezamos <br>";
		//$config['file_name']		= $_FILES["file"]["name"];
		//$config['upload_path'] 		= './public/uploads/rh/nomina/biotime/';
		//$config['allowed_types']    = 'xls|csv';
		//$config['max_size']         = 0;
		//$config['file_ext_tolower'] = TRUE;
		$config = array(
			'upload_path'   	=> './public/uploads/rh/nomina/biotime/',
			'allowed_types' 	=> 'xls|csv',
			'max_size'			=> 0,
			'file_ext_tolower'	=> TRUE
		);
		echo "2) Listo para subir archivo.<br>";
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		echo "3) Configuracion Cargada.<br>";
		if ($this->upload->do_upload('file')) {
			echo "4) Si se pudo subir.<br>";
			$data = $this->upload->data();
			$ruta_completa = $data['full_path'];
			echo "Full Path: " . $data['full_path'] ."<br>";
			@chmod($data['full_path'], 0777);
			echo "5) Listo para ausar la libreria<br>";
			$this->load->library('Spreadsheet_Excel_Reader');
			echo "6) Listo para usar la libreria<br>";
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');
			echo "7) Listo para usar la libreria<br>";
			$this->spreadsheet_excel_reader->read($ruta_completa);
			echo "8) Listo para usar la libreria<br>";
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['numero_empleado']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['fecha']   = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['dia_de_semana']   = $sheets['cells'][$i][5];
				$data_excel[$i - 1]['excepcion']   = $sheets['cells'][$i][6];
				$data_excel[$i - 1]['simbolo_de_permiso']   = $sheets['cells'][$i][7];
				$data_excel[$i - 1]['horario']   = $sheets['cells'][$i][8];
				$data_excel[$i - 1]['duracion']   = $sheets['cells'][$i][9];
				$data_excel[$i - 1]['entrada']   = $sheets['cells'][$i][10];
				$data_excel[$i - 1]['salida']   = $sheets['cells'][$i][11];
				$data_excel[$i - 1]['duracion_trabajo']   = $sheets['cells'][$i][12];
				$data_excel[$i - 1]['dia_de_trabajo']   = $sheets['cells'][$i][13];
				$data_excel[$i - 1]['horario_de_entrada']   = $sheets['cells'][$i][14];
				$data_excel[$i - 1]['horario_de_salida']   = $sheets['cells'][$i][15];
				$data_excel[$i - 1]['tiempo_total']   = $sheets['cells'][$i][16];
				$data_excel[$i - 1]['trabajado_en_jornada']   = $sheets['cells'][$i][17];
				$data_excel[$i - 1]['trabajado_real']   = $sheets['cells'][$i][18];
				$data_excel[$i - 1]['sin_asignar']   = $sheets['cells'][$i][19];
				$data_excel[$i - 1]['sobrante']   = $sheets['cells'][$i][20];
				$data_excel[$i - 1]['horario_de_descanso']   = $sheets['cells'][$i][21];
				$data_excel[$i - 1]['retardo']   = $sheets['cells'][$i][22];
				$data_excel[$i - 1]['salida_temprana']   = $sheets['cells'][$i][23];
				$data_excel[$i - 1]['ausencia']   = $sheets['cells'][$i][24];
				$data_excel[$i - 1]['tipo_de_permiso']   = $sheets['cells'][$i][25];
				$data_excel[$i - 1]['total_a_trabajar']   = $sheets['cells'][$i][26];
				$data_excel[$i - 1]['jornada_normal']   = $sheets['cells'][$i][27];
				$data_excel[$i - 1]['tiempo_extra_normal']   = $sheets['cells'][$i][28];
				$data_excel[$i - 1]['tiempo_extra_fin_semana']   = $sheets['cells'][$i][29];
				$data_excel[$i - 1]['tiempo_extra_dia_festivo']   = $sheets['cells'][$i][30];
				$data_excel[$i - 1]['tiempo_extra_nivel1']   = $sheets['cells'][$i][31];
				$data_excel[$i - 1]['tiempo_extra_nivel2']   = $sheets['cells'][$i][32];
				$data_excel[$i - 1]['tiempo_extra_nivel3']   = $sheets['cells'][$i][33];
				
			}

			$this->db->insert_batch('rh_empleados_biotime', $data_excel);
			// @unlink($data['full_path']);
			redirect(base_url('admin/empleados/import_excel'));
		} else {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
	} 

}


?>