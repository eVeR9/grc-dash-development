<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Departamentos extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/departamento_model', 'departamento_model');
		}

		public function index(){
			$data['all_departamentos'] =  $this->departamento_model->get_all_departamentos();
			$data['view'] = 'admin/departamentos/departamento_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nombre_del_departamento', 'nombre_del_departamento', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/departamentos/departamento_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_departamento' => $this->input->post('nombre_del_departamento'),
						'created_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->departamento_model->add_departamento($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/departamentos'));
					}
				}
			}
			else{
				$data['view'] = 'admin/departamentos/departamento_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nombre_del_departamento', 'nombre_del_departamento', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['departmamento'] = $this->departamento_model->get_departamento_by_id($id);
					$data['view'] = 'admin/departamentos/departamentos_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_departamento' => $this->input->post('nombre_del_departamento'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->departamento_model->edit_departamento($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/departamentos'));
					}
				}
			}
			else{
				$data['departamento'] = $this->departamento_model->get_departamento_by_id($id);
				$data['view'] = 'admin/departamentos/departamento_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('departamentos', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/departamentos'));
		}

	}


?>