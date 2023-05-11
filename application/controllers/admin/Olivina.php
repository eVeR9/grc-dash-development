<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olivina extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/olivina_model','olivina_model');
    }

    public function index()
    {

    }

    public function add()
    {
        if($this->input->post('submit')){
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('lectura_inicial', 'lectura_inicial', 'trim|required');
            $this->form_validation->set_rules('lectura_final', 'lectura_final', 'trim|required');
            $this->form_validation->set_rules('consumo_gas', 'consumo_gas', 'trim|required');
            $this->form_validation->set_rules('gigajoules', 'gigajoules', 'trim|required');
            if($this->form_validation->run() == FALSE){

                $data['view'] = 'admin/olivina/olivina_edit.php';
                $this->load->view('admin/layout',$data);

            }else{
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'lectura_inicial' => $this->input->post('lectura_inicial'),
                    'lectura_final' => $this->input->post('lectura_final'),
                    'consumo_gas' => $this->input->post('consumo_gas'),
                    'gigajoules' => $this->input->post('gigajoules')

                );
                $data = $this->security->xss_clean($data);
                $result = $this->olivina_model->add_olivina($data);
                if($result){
                    $this->session->set_flashdata('msg','Registro agregado!');
                    redirect(base_url('admin/olivina/Bitacora_olivina'));
                }

            }
        }else{

                $data['all_olivina'] = $this->olivina_model->get_all_olivina();
                $data['view'] = 'admin/olivina/olivina_add.php';
                $this->load->view('admin/layout',$data);

        }
    }

    public function edit($id=0)
    {
        if($this->input->post('submit')){
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('lectura_inicial', 'lectura_inicial', 'trim|required');
            $this->form_validation->set_rules('lectura_final', 'lectura_final', 'trim|required');
            $this->form_validation->set_rules('consumo_gas', 'consumo_gas', 'trim|required');
            $this->form_validation->set_rules('gigajoules', 'gigajoules', 'trim|required');
            if($this->form_validation->run() == FALSE){
                $data['edit_olivina'] = $this->olivina_model->get_hornos_olivina_by_id($id);
                $data['view'] = 'admin/olivina/olivina_add.php';
                $this->load->view('admin/layout',$data);

            }else{
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'lectura_inicial' => $this->input->post('lectura_inicial'),
                    'lectura_final' => $this->input->post('lectura_final'),
                    'consumo_gas' => $this->input->post('consumo_gas'),
                    'gigajoules' => $this->input->post('gigajoules')

                );
                $data = $this->security->xss_clean($data);
                $result = $this->olivina_model->edit_olivina($data,$id);
                if($result){
                    $this->session->set_flashdata('msg','Registro actualizado!');
                    redirect(base_url('admin/olivina/Bitacora_olivina'));
                }

            }
        }else{

                $data['edit_olivina'] = $this->olivina_model->get_hornos_olivina_by_id($id);
                $data['view'] = 'admin/olivina/olivina_edit.php';
                $this->load->view('admin/layout',$data);

        }

    }

    public function bitacora_olivina()
    {
        $data ['all_olivina'] = $this->olivina_model->get_all_olivina();
        $data ['view'] = 'admin/olivina/olivina_list';
        $this->load->view('admin/layout', $data);
    }
}


?>