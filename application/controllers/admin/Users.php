<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/user_model', 'user_model');
			$this->load->model('admin/transporte_model', 'transporte');
		}

		public function index(){
			$data['all_users'] =  $this->user_model->get_all_users();
			$data['view'] = 'admin/users/user_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('es_admin', 'es_admin', 'trim|required');
				$this->form_validation->set_rules('tipo_usuario', 'tipo_usuario', 'trim|required');
				$this->form_validation->set_rules('activo', 'activo', 'trim|required');

				if ($this->form_validation->run() == FALSE) {

					$data['transportistas'] = $this->transporte->get_transportistas();
					$data['view'] = 'admin/users/user_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'es_admin' => $this->input->post('es_admin'),
						'tipo_usuario' => $this->input->post('tipo_usuario'),
						'activo' => $this->input->post('activo'),
						'created_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{

				$data['transportistas'] = $this->transporte->get_transportistas();
				$data['view'] = 'admin/users/user_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				//$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('es_admin', 'es_admin', 'trim|required');
				//$this->form_validation->set_rules('tipo_usuario', 'tipo_usuario', 'trim|required');
				//$this->form_validation->set_rules('activo', 'activo', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->user_model->get_user_by_id($id);
					$data['view'] = 'admin/users/user_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					if($this->input->post('password')==""){
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'es_admin' => $this->input->post('es_admin'),
						//'tipo_usuario' => $this->input->post('tipo_usuario'),
						//'activo' => $this->input->post('activo'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					} else {
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellidos' => $this->input->post('apellidos'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'es_admin' => $this->input->post('es_admin'),
						//'tipo_usuario' => $this->input->post('tipo_usuario'),
						//'activo' => $this->input->post('activo'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					}
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user'] = $this->user_model->get_user_by_id($id);
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('ci_users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/users'));
		}


		public function get_empleado_by_id_usuario($id = 0){
			$result = $this->user_model->get_empleado_by_id_usuario($id);
			if($result){
				$data['id_usuario']=$result;
				$data['view'] = 'admin/users/user_list';
				$this->load->view('admin/layout', $data);
			}
		}

		public function inactive($id = 0){
					$data = array(
						'activo' => '0',
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/users'));
					}
		}


		public function active($id = 0){
					$data = array(
						'activo' => '1',
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/users'));
					}
		}



	}


?>