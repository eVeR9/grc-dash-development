<?php 
    defined('BASEPATH') OR exit('No direct script access alloowed');

    class Sucursales extends MY_Controller {
        public function __construct() {
            parent::__construct();
                $this->load->model('admin/sucursales_model', 'sucursales_model');
        }

        public function index() { //task #1: cambiar el metodo viejo por el nuevo
            $data['all_clientes_sucursal'] = $this->sucursales_model->get_all_sucursales();
            $data['view'] = 'admin/sucursales/sucursal_list';
            $this->load->view('admin/layout', $data);
        }

        public function add() {
            if($this->input->post('submit')){
                $this->form_validation->set_rules('id_cliente', 'ID', 'trim|required');
                $this->form_validation->set_rules('sucursal', 'sucursal', 'trim|required');
                
                if($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/sucursales/sucursal_add';
                    $this->load->view('admin/layout', $data);

                } else {
                    $data = array(
                        'id_cliente' => $this->input->post('id_cliente'),
                        'sucursal' => $this->input->post('sucursal'),
                        'created_at' => date('Y-m-d : h:m:s')
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->sucursales_model->add_sucursales($data);

                    if($result) {
                       $result = $this->session->set_flashdata('msg', 'Registro Agregado!');
                        redirect(base_url('admin/sucursales'));
                    }
                }

            } else {
                $data['view'] = 'admin/sucursales/sucursal_add';
                $this->load->view('admin/layout', $data);
            }

        }//finish add method

        public function edit($id = 0) {
            if($this->input->post('submit')) {
                $this->form_validation->set_rules('id_cliente', 'ID', 'trim|required');
                $this->form_validation->set_rules('sucursal', 'sucursal', 'trim|required');

                if($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/sucursales/sucursal_edit';
                    $this->load->view('admin/layout', $data);
                } else {
                    $data = array(
                        'id_cliente' => $this->input->post('id_cliente'),
                        'sucursal' => $this->input->post('sucursal'),
                        'update_at' => date('Y-m-d : h:m:s')
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->sucursales_model->edit_sucursales($data, $id);

                    if($result) {
                        $result = $this->session->set_flashdata('msg', 'Registro Actualizado!');
                        redirect(base_url('admin/sucursales'));
                    }
                }
            } else {
                $data['all_clientes'] = $this->sucursales_model->get_all_clientes();
                $data['all_clientes_sucursal'] = $this->sucursales_model->get_all_sucursales_id($id);
                $data['view'] = 'admin/sucursales/sucursal_edit';
                $this->load->view('admin/layout', $data);
            }
        } //finish edit method
    }



?>