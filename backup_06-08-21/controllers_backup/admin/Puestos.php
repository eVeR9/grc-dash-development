<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Puestos extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/puesto_model', 'puesto_model');
		}

		public function index(){
			$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
			$data['all_puestos'] =  $this->puesto_model->get_all_puestos();
			$data['view'] = 'admin/puestos/puesto_list';
			$this->load->view('admin/layout', $data);
			
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nombre_del_puesto', 'nombre_del_puesto', 'trim|required');
				$this->form_validation->set_rules('id_departamento', 'id_departamento', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/puestos/puesto_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_puesto' => $this->input->post('nombre_del_puesto'),
						'id_departamento' => $this->input->post('id_departamento'),	
						'created_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->puesto_model->add_puesto($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/puestos'));
					}
				}
			}
			else{
				//Compartir informacion con las 
				$data['all_departamentos'] =  $this->puesto_model->get_all_departamentos();
				$data['all_puestos'] =  $this->puesto_model->get_all_puestos();
				$data['view'] = 'admin/puestos/puesto_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nombre_del_puesto', 'nombre_del_puesto', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['departmamento'] = $this->puesto_model->get_puesto_by_id($id);
					$data['view'] = 'admin/puestos/puestos_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_puesto' => $this->input->post('nombre_del_puesto'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->puesto_model->edit_puesto($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/puestos'));
					}
				}
			}
			else{
				$data['puesto'] = $this->puesto_model->get_puesto_by_id($id);
				$data['view'] = 'admin/puestos/puesto_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('puestos', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/puestos'));
		}

	}


?>