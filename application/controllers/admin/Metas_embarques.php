<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Metas_embarques extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/metas_embarques_model', 'metas_embarques_model');
		}

		public function index(){
			$data['all_me'] =  $this->metas_embarques_model->get_all_me();
			$data['view'] = 'admin/metas_embarques/metas_embarques_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){
				
				$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim|required');
				//$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
				//$this->form_validation->set_rules('email', 'Email', 'trim|required');
				//$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				//$this->form_validation->set_rules('password', 'Password', 'trim|required');
				//$this->form_validation->set_rules('es_admin', 'es_admin', 'trim|required');
				//$this->form_validation->set_rules('tipo_usuario', 'tipo_usuario', 'trim|required');
				//$this->form_validation->set_rules('activo', 'activo', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['all_clientes'] =  $this->metas_embarques_model->get_all_clientes();
					$data['materiales'] = $this->metas_embarques_model->get_all_materiales();
					$data['all_sucursales'] =  $this->metas_embarques_model->get_all_sucursales();
					$data['empleados_ventas'] = $this->metas_embarques_model->get_empleados_ventas();
					$data['view'] = 'admin/metas_embarques/metas_embarques_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'id_vendedor' => $this->input->post('id_vendedor'),
						'id_cliente' => $this->input->post('id_cliente'),
						'id_mes' => $this->input->post('id_mes'),
						'id_anio' => $this->input->post('id_anio'),
						'id_sucursal' =>  $this->input->post('id_sucursal'),
						'obra_cliente' => $this->input->post('obra_cliente'),
						'id_material' => $this->input->post('id_material'),
						'dias_habiles' => $this->input->post('dias_habiles'),
						'toneladas' => $this->input->post('toneladas'),
						'meta_diaria' => $this->input->post('meta_diaria'),
						'meta_semanal' => $this->input->post('meta_semanal'),
						'created_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->metas_embarques_model->add($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/metas_embarques'));
					}
				}
			}
			else{
				$data['all_clientes'] =  $this->metas_embarques_model->get_all_clientes();
				$data['materiales'] = $this->metas_embarques_model->get_all_materiales();
				$data['all_sucursales'] =  $this->metas_embarques_model->get_all_sucursales();
				$data['empleados_ventas'] = $this->metas_embarques_model->get_empleados_ventas();
				$data['view'] = 'admin/metas_embarques/metas_embarques_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('id_cliente', 'id_cliente', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_clientes'] =  $this->metas_embarques_model->get_all_clientes();
					$data['materiales'] = $this->metas_embarques_model->get_all_materiales();
					$data['all_sucursales'] =  $this->metas_embarques_model->get_all_sucursales();
					$data['empleados_ventas'] = $this->metas_embarques_model->get_empleados_ventas();
					$data['me_id'] =  $this->metas_embarques_model->get_all_me_by_id($id);
					$data['view'] = 'admin/metas_embarques/metas_embarques_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'id_vendedor' => $this->input->post('id_vendedor'),
						'id_cliente' => $this->input->post('id_cliente'),
						'id_mes' => $this->input->post('id_mes'),
						'id_anio' => $this->input->post('id_anio'),
						'id_sucursal' =>  $this->input->post('id_sucursal'),
						'obra_cliente' => $this->input->post('obra_cliente'),
						'id_material' => $this->input->post('id_material'),
						'dias_habiles' => $this->input->post('dias_habiles'),
						'toneladas' => $this->input->post('toneladas'),
						'meta_diaria' => $this->input->post('meta_diaria'),
						'meta_semanal' => $this->input->post('meta_semanal'),
						//'edited_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->metas_embarques_model->edit_me($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/metas_embarques'));
					}
				}
			}
			else{
					$data['all_clientes'] =  $this->metas_embarques_model->get_all_clientes();
					$data['materiales'] = $this->metas_embarques_model->get_all_materiales();
					$data['all_sucursales'] =  $this->metas_embarques_model->get_all_sucursales();
					$data['empleados_ventas'] = $this->metas_embarques_model->get_empleados_ventas();
					$data['me_id'] =  $this->metas_embarques_model->get_all_me_by_id($id);
					$data['view'] = 'admin/metas_embarques/metas_embarques_edit';
					$this->load->view('admin/layout', $data);
			}
		}

		public function del12121($id = 0){
			$this->db->delete('ci_users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/users'));
		}


		public function getClienteSucursales(){
			// POST data 
			$postData = $this->input->post();
			// load model 
//			$this->load->model('admin/metas_embarques_model', 'metas_embarques_model');
			// get data 
			$data = $this->metas_embarques_model->getClienteSucursales($postData);
			echo json_encode($data); 
		  }
				

	}


?>