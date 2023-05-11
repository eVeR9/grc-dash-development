<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Empleados extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/empleado_model', 'empleado_model');
			$this->load->model('admin/puesto_model', 'puesto_model');
			$this->load->model('admin/departamento_model', 'departamento_model');
			$this->load->model('admin/registro_patronal_model', 'registro_patronal_model');

		}

		public function index(){
			$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
			$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
			$data['puestos'] =  $this->puesto_model->get_all_puestos();
			$data['all_registro_patronal'] =  $this->registro_patronal_model->get_all_registro_patronal();
			//$data['departamentos'] = $this->empleado_model->getDepartamentos();
			$data['departamentos'] = $this->empleado_model->fetch_departamentos();
			$data['view'] = 'admin/empleados/empleado_list';
			$this->load->view('admin/layout', $data);
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
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('id_empleado', 'id_empleado', 'trim|required');
				$this->form_validation->set_rules('id_departamento', 'id_departamento', 'trim|required');
				$this->form_validation->set_rules('id_puesto', 'id_puesto', 'trim|required');
				$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
				$this->form_validation->set_rules('colonia', 'colonia', 'trim|required');
				$this->form_validation->set_rules('municipio', 'municipio', 'trim|required');
				$this->form_validation->set_rules('estado', 'estado', 'trim|required');
				$this->form_validation->set_rules('pais', 'pais', 'trim|required');
				$this->form_validation->set_rules('imss', 'imss', 'trim|required');
				$this->form_validation->set_rules('curp', 'curp', 'trim|required');
				$this->form_validation->set_rules('ife', 'ife', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
				$this->form_validation->set_rules('estado_civil', 'estado_civil', 'trim|required');
				$this->form_validation->set_rules('hijos', 'hijos', 'trim|required');
				$this->form_validation->set_rules('fecha_de_nacimiento', 'fecha_de_nacimiento', 'trim|required');
				$this->form_validation->set_rules('fecha_ingreso', 'fecha_ingreso', 'trim|required');
				$this->form_validation->set_rules('pais', 'pais', 'trim|required');
				$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');
				$this->form_validation->set_rules('fecha_ingreso', 'fecha_ingreso', 'trim|required');
				//$this->form_validation->set_rules('fecha_salida', 'fecha_salida', 'trim|required');

				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
					$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
					$data['puestos'] =  $this->puesto_model->get_all_puestos();
					$data['all_registro_patronal'] =  $this->registro_patronal_model->get_all_registro_patronal();
					//$data['departamentos'] = $this->empleado_model->getDepartamentos();
					$data['departamentos'] = $this->empleado_model->fetch_departamentos();
					$data['view'] = 'admin/empleados/empleado_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'id_empleado' => $this->input->post('id_empleado'),
						'id_departamento' => $this->input->post('id_departamento'),
						'id_puesto' => $this->input->post('id_puesto'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'direccion' => $this->input->post('direccion'),
						'colonia' => $this->input->post('colonia'),
						'municipio' => $this->input->post('municipio'),
						'estado' => $this->input->post('estado'),
						'pais' => $this->input->post('pais'),
						'imss' => $this->input->post('imss'),
						'curp' => $this->input->post('curp'),
						'ife' => $this->input->post('ife'),
						'mobile_no' => $this->input->post('mobile_no'),
						'sexo' => $this->input->post('sexo'),
						'estado_civil' => $this->input->post('estado_civil'),
						'hijos' => $this->input->post('hijos'),
						'fecha_de_nacimiento' => $this->input->post('fecha_de_nacimiento'),
						'fecha_ingreso' => $this->input->post('fecha_ingreso'),
						'pais' => $this->input->post('pais'),
						'rfc' => $this->input->post('rfc'),
						'created_at' => date('Y-m-d : h:m:s'),
						'created_by' => $this->input->post('id_usuario'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->empleado_model->add_empleado($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/empleados'));
					}
				}
			}
			else{
				$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
				$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
				$data['puestos'] =  $this->puesto_model->get_all_puestos();
				$data['all_registro_patronal'] =  $this->registro_patronal_model->get_all_registro_patronal();
				//$data['departamentos'] = $this->empleado_model->getDepartamentos();
				$data['departamentos'] = $this->empleado_model->fetch_departamentos();
				$data['view'] = 'admin/empleados/empleado_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('id_empleado', 'id_empleado', 'trim|required');
				$this->form_validation->set_rules('id_departamento', 'id_departamento', 'trim|required');
				$this->form_validation->set_rules('id_puesto', 'id_puesto', 'trim|required');
				$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
				$this->form_validation->set_rules('colonia', 'colonia', 'trim|required');
				$this->form_validation->set_rules('municipio', 'municipio', 'trim|required');
				$this->form_validation->set_rules('estado', 'estado', 'trim|required');
				$this->form_validation->set_rules('pais', 'pais', 'trim|required');
				$this->form_validation->set_rules('imss', 'imss', 'trim|required');
				$this->form_validation->set_rules('curp', 'curp', 'trim|required');
				$this->form_validation->set_rules('ife', 'ife', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('sexo', 'sexo', 'trim|required');
				$this->form_validation->set_rules('estado_civil', 'estado_civil', 'trim|required');
				$this->form_validation->set_rules('hijos', 'hijos', 'trim|required');
				$this->form_validation->set_rules('fecha_de_nacimiento', 'fecha_de_nacimiento', 'trim|required');
				$this->form_validation->set_rules('fecha_ingreso', 'fecha_ingreso', 'trim|required');
				$this->form_validation->set_rules('pais', 'pais', 'trim|required');
				$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['empleado'] = $this->empleado_model->get_empleado_by_id($id);
					$data['view'] = 'admin/empleados/empleado_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'id_empleado' => $this->input->post('id_empleado'),
						'id_departamento' => $this->input->post('id_departamento'),
						'id_puesto' => $this->input->post('id_puesto'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'direccion' => $this->input->post('direccion'),
						'colonia' => $this->input->post('colonia'),
						'municipio' => $this->input->post('municipio'),
						'estado' => $this->input->post('estado'),
						'pais' => $this->input->post('pais'),
						'imss' => $this->input->post('imss'),
						'curp' => $this->input->post('curp'),
						'ife' => $this->input->post('ife'),
						'mobile_no' => $this->input->post('mobile_no'),
						'estado_civil' => $this->input->post('estado_civil'),
						'hijos' => $this->input->post('hijos'),
						'sexo' => $this->input->post('sexo'),
						'fecha_de_nacimiento' => $this->input->post('fecha_de_nacimiento'),
						'fecha_ingreso' => $this->input->post('fecha_ingreso'),
						'fecha_salida' => $this->input->post('fecha_salida'),
						'pais' => $this->input->post('pais'),
						'rfc' => $this->input->post('rfc'),
						'updated_at' => date('Y-m-d : h:m:s'),
						'updated_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->empleado_model->edit_empleado($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/empleados/'));
					}
				}
			}
			else{
				$data['empleado'] = $this->empleado_model->get_empleado_by_id($id);
				//$data['all_empleados'] =  $this->empleado_model->get_all_empleados();
				$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
				$data['all_registro_patronal'] =  $this->registro_patronal_model->get_all_registro_patronal();
				$data['departamentos'] = $this->empleado_model->fetch_departamentos();
				$data['puestos'] =  $this->empleado_model->get_all_puestos();
				$data['view'] = 'admin/empleados/empleado_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del_nousar($id = 0){
			$this->db->delete('empleados', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/empleados'));
		}

	}


?>