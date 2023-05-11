<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Registro_patronal extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/registro_patronal_model', 'registro_patronal_model');
		}

		public function index(){
			$data['all_registro_patronal'] =  $this->registro_patronal_model->get_all_registro_patronal();
			$data['view'] = 'admin/registro_patronal/registro_patronal_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required');
				$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/registro_patronal/registro_patronal_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'razon_social' => $this->input->post('razon_social'),
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
					);
					$data = $this->security->xss_clean($data);
					$result = $this->registro_patronal_model->add_registro_patronal($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/registro_patronal'));
					}
				}
			}
			else{
				$data['view'] = 'admin/registro_patronal/registro_patronal_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required');
				$this->form_validation->set_rules('rfc', 'rfc', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['razon_social'] = $this->registro_patronal_model->get_registro_patronal_by_id($id);
					$data['view'] = 'admin/registro_patronal/registro_patronal_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'razon_social' => $this->input->post('razon_social'),
						'rfc' => $this->input->post('rfc'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->registro_patronal->edit_registro_patronal($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/registro_patronal'));
					}
				}
			}
			else{
				$data['registro_patronal'] = $this->registro_patronal_model->get_registro_patronal_by_id($id);
				$data['view'] = 'admin/registro_patronal/registro_patronal_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('registro_patronal', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/registro_patronal'));
		}

	}


?>