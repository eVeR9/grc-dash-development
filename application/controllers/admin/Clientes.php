<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Clientes extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/cliente_model', 'cliente_model');
		}

		public function index(){
			$data['all_clientes'] =  $this->cliente_model->get_all_clientes();
			$data['view'] = 'admin/clientes/cliente_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('razon_social', 'Falta la razon_social', 'trim|required');
				$this->form_validation->set_rules('codigo_cliente', 'codigo_cliente', 'trim|required');
				//$this->form_validation->set_rules('email', 'Email', 'trim|required');
				//$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				//$this->form_validation->set_rules('password', 'Password', 'trim|required');
				//$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/clientes/cliente_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'razon_social' => $this->input->post('razon_social'),
						'codigo_cliente' => $this->input->post('codigo_cliente'),
						'rfc' => $this->input->post('rfc'),
						'calle' => $this->input->post('calle'),
						'numero_int' => $this->input->post('numero_int'),
						'numero_int' => $this->input->post('numero_int'),
						'numero_ext' => $this->input->post('numero_ext'),
						'colonia' => $this->input->post('colonia'),
						'codigo_postal' => $this->input->post('codigo_postal'),
						'municipio' => $this->input->post('municipio'),
						'ciudad' => $this->input->post('ciudad'),
						'estado' => $this->input->post('estado'),
						'pais' => $this->input->post('pais'),

						'created_at' => date('Y-m-d : h:m:s'),
						//'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->cliente_model->add_cliente($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/clientes'));
					}
				}
			}
			else{
				$data['view'] = 'admin/clientes/cliente_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required');
				$this->form_validation->set_rules('codigo_cliente', 'codigo_cliente', 'trim|required');
				$this->form_validation->set_rules('nombre_contacto', 'nombre_contacto', 'trim');
				$this->form_validation->set_rules('calle', 'calle', 'trim');
				$this->form_validation->set_rules('colonia', 'colonia', 'trim');
				$this->form_validation->set_rules('municipio', 'municipio', 'trim');
				$this->form_validation->set_rules('ciudad', 'ciudad', 'trim'); 
				$this->form_validation->set_rules('estado', 'estado', 'trim');
				$this->form_validation->set_rules('pais', 'pais', 'trim');
				//$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');
				//$this->form_validation->set_rules('calle', 'calle', 'trim|required');
				//$this->form_validation->set_rules('numero_int', 'numero_int', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['cliente'] = $this->cliente_model->get_cliente_by_id($id);
					$data['view'] = 'admin/clientes/cliente_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'razon_social' => $this->input->post('razon_social'),
						'codigo_cliente' => $this->input->post('codigo_cliente'),
						'nombre_contacto' => $this->input->post('nombre_contacto'),
						'calle' => $this->input->post('calle'),
						'colonia' => $this->input->post('colonia'),
						'municipio' => $this->input->post('municipio'),
						'ciudad' => $this->input->post('ciudad'),
						'estado' => $this->input->post('estado'),
						'pais' => $this->input->post('pais'),
						//'email' => $this->input->post('email'),
						//'mobile_no' => $this->input->post('mobile_no'),
						//'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						//'is_admin' => $this->input->post('user_role'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->cliente_model->edit_cliente($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/clientes'));
					}
				}
			}
			else{
				$data['cliente'] = $this->cliente_model->get_cliente_by_id($id);
				$data['view'] = 'admin/clientes/cliente_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del123($id = 0){
			$this->db->delete('clientes', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/clientes'));
		}

	}


?>