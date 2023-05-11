<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/auth_model', 'auth_model');
		}

		public function index(){
			if($this->session->has_userdata('is_admin_login'))
			{
				redirect('admin/dashboard');
			}
			else{
				redirect('admin/auth/login');
			}
		}

		public function login(){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/auth/login');
				}
				else {
					$email = $this->input->post('email');
					$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
					);

					$result = $this->auth_model->login($data);
					if ($result == TRUE) {
						if ($this->session->userdata('email') == $email) {
							$this->session->sess_destroy();
						}
						$admin_data = array(
							'id_tp' => $result['id_transp'],
							'admin_id' => $result['id'],
							'id_usuario' => $result['id'],
							'name' => $result['nombre'] . " " . $result['apellidos'],
						 	'email' => $result['email'],
							'es_admin' => $result['es_admin'],
							'puesto' => $result['nombre_del_puesto'],
							'departamento' => $result['nombre_del_departamento'],
							'registro_patronal' => $result['razon_social'],
						 	'is_admin_login' => TRUE
						);
						$this->session->set_userdata($admin_data);
						redirect(base_url('admin/dashboard'), 'refresh');
					}
					else{
						$data['msg'] = 'Algo salió mal!';
						$this->load->view('admin/auth/login', $data);
					}
				}
			}
			else{
				$this->load->view('admin/auth/login');
			}
		}	

		public function change_pwd(){
			$id = $this->session->userdata('admin_id');
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('confirm_pwd', 'Confirmar Password', 'trim|required|matches[password]');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/auth/change_pwd';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
					);
					$result = $this->auth_model->change_pwd($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Password ha sido cambiado con éxito!');
						redirect(base_url('admin/auth/change_pwd'));
					}
				}
			}
			else{
				$data['view'] = 'admin/auth/change_pwd';
				$this->load->view('admin/layout', $data);
			}
		}
				
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/auth/login'), 'refresh');
		}
			
	}  // end class


?>