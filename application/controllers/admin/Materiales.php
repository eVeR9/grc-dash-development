<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Materiales extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/material_model', 'material_model');
		}

		public function index(){
			$data['all_materiales'] =  $this->material_model->get_all_materiales();
			$data['view'] = 'admin/materiales/material_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('nombre_del_material', 'nombre_del_material', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/materiales/material_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_material' => $this->input->post('nombre_del_material'),
						'created_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->material_model->add_material($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/materiales'));
					}
				}
			}
			else{
				$data['view'] = 'admin/materiales/material_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('nombre_del_material', 'nombre_del_material', 'trim|required');
				$this->form_validation->set_rules('activo', 'activo', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['material'] = $this->material_model->get_material_by_id($id);
					$data['view'] = 'admin/materiales/material_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'nombre_del_material' => $this->input->post('nombre_del_material'),
						'activo' => $this->input->post('activo'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->material_model->edit_material($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/materiales'));
					}
				}
			}
			else{
				$data['material'] = $this->material_model->get_material_by_id($id);
				$data['view'] = 'admin/materiales/material_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('materiales', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/materiales'));
		}

		public function materiales_componentes(){
			$sendingMateriales = $this->input->post('submit');

			if($sendingMateriales){
				$this->form_validation->set_rules('id_material_venta', 'Material Venta', 'trim|required');
				$this->form_validation->set_rules('id_material_produccion', 'Material Produccion', 'trim|required');
				$this->form_validation->set_rules('porcentaje', 'Porcentaje', 'trim|required');

				$failForm = $this->form_validation->run() == FALSE;

				if($failForm){
					$data['all_materiales'] =  $this->material_model->get_all_materiales();
					$data['materiales_prod'] = $this->material_model->get_all_materiales_prod();
					$data['view'] = 'admin/materiales/materiales_componentes';
					$this->load->view('admin/layout', $data);

				} else{
					$data = array(
						'id_material' => $this->input->post('id_material_venta'),
						'id_material_produccion' => $this->input->post('id_material_produccion'),
						'porcentaje' => $this->input->post('porcentaje')
					);

					$data = $this->security->xss_clean($data);
					$insertFormProd = $this->material_model->add_material_comp($data);

					if($insertFormProd){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect('admin/materiales/materiales_componentes');
					}
				}

			} else{
				$data['all_materiales'] =  $this->material_model->get_all_materiales();
				$data['materiales_prod'] = $this->material_model->get_all_materiales_prod();
				$data['view'] = 'admin/materiales/materiales_componentes';
				$this->load->view('admin/layout', $data);
			}
		}

		public function getComponentesByAjax($id){
			$data = $this->material_model->get_all_materiales_comp($id);
			echo json_encode($data);
		}

		public function materiales_componentes_list(){

		}

		public function materiales_produccion(){
			$data['materiales_prod'] = $this->material_model->get_all_materiales_prod();
			$data['view'] = 'admin/materiales/materiales_produccion';
			$this->load->view('admin/layout', $data);
		}

		public function add_materiales_produccion(){
			$sendingData = $this->input->post('submit');

			if($sendingData){
			$this->form_validation->set_rules('material_prod', 'material', 'trim|required');	
			$this->form_validation->set_rules('estatus', 'estatus', 'trim');

			$failForm = $this->form_validation->run() == FALSE;

			if($failForm){
				$data['view'] = 'admin/materiales/add_materiales_produccion';
				$this->load->view('admin/layout', $data);

			} else{
				$data = array(
					'nombre' => $this->input->post('material_prod'),
					'estatus' => $this->input->post('estatus')
				);

				$data = $this->security->xss_clean($data);
				$insertForm = $this->material_model->add_material_prod($data);

				if($insertForm){
					$this->session->set_flashdata('msg', 'Registro Agregado!');
					redirect(base_url('admin/materiales/materiales_produccion'));
				}
			}
			
			} else{
				$data['view'] = 'admin/materiales/add_materiales_produccion';
				$this->load->view('admin/layout', $data);
			}
		}

	}
