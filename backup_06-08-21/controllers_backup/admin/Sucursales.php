<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Sucursales extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/sucursal_model', 'sucursal_model');
		}

		public function index(){
			$data['all_clientes_sucursal'] = $this->sucursal_model->get_all_sucursales();
			$data['all_clientes'] =  $this->sucursal_model->get_all_clientes();
			$data['view'] = 'admin/sucursales/sucursal_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('id_cliente', 'Seleccionar Cliente', 'trim|required');
				$this->form_validation->set_rules('sucursal', 'sucursal', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['all_clientes']=$this->sucursal_model->get_all_clientes();
					$data['view'] = 'admin/sucursales/sucursal_add';
					$this->load->view('admin/layout', $data);
				} else {
					$data = array(
						'sucursal' => $this->input->post('sucursal'),
						'id_cliente' => $this->input->post('id_cliente'),
						'created_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->sucursal_model->add_sucursal($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/sucursales'));
					}
				}
			} else {
				$data['all_clientes']=$this->sucursal_model->get_all_clientes();
				$data['view'] = 'admin/sucursales/sucursal_add';
				$this->load->view('admin/layout', $data);
			}
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('id_cliente', 'Seleccionar Cliente', 'trim|required');
				$this->form_validation->set_rules('sucursal', 'sucursal', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['all_clientes_sucursal_id'] = $this->sucursal_model->get_all_sucursales_id($id);
					$data['all_clientes']=$this->sucursal_model->get_all_clientes();
					$data['view'] = 'admin/sucursales/sucursal_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'sucursal' => $this->input->post('sucursal'),
						'id_cliente' => $this->input->post('id_cliente'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->sucursal_model->edit_sucursal($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/sucursales'));
					}
				}
			}
			else{
				$data['all_clientes_sucursal_id'] = $this->sucursal_model->get_all_sucursales_id($id);
				$data['all_clientes']=$this->sucursal_model->get_all_clientes();
				$data['view'] = 'admin/sucursales/sucursal_edit';
				$this->load->view('admin/layout', $data);
				//$this->load->view('admin/layout', $data);
			}
		}

		public function del123($id = 0){
			$this->db->delete('clientes', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/clientes'));
		}

	}


?>