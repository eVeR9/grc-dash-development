<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Linea_gas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/linea_gas_model', 'linea_gas_model');
    }

    public function index()
    {
        $data['all_gas_consumo'] =  $this->linea_gas_model->get_all_gas_consumo();


        $data['view'] = 'admin/linea_gas/gas_consumo_list';

        $this->load->view('admin/layout', $data);
    }


    public function gas_consumo_add()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('metros_cubicos', 'metros_cubicos', 'trim|required');
            $this->form_validation->set_rules('masa', 'masa', 'trim|required');
            $this->form_validation->set_rules('megacalorias', 'megacalorias', 'trim|required');
            $this->form_validation->set_rules('densidad', 'densiad', 'trim|required');
            $this->form_validation->set_rules('gigajoules', 'gigajoules', 'trim|required');
            $this->form_validation->set_rules('costo', 'costo', 'trim|required');
            $this->form_validation->set_rules('precio', 'precio', 'trim|required');

            if ($this->form_validation->run() == FALSE) {


                $data['view'] = 'admin/linea_gas/gas_consumo_add.php';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(

                    'fecha' => $this->input->post('fecha'),
                    'metros_cubicos' => $this->input->post('metros_cubicos'),
                    'masa' => $this->input->post('masa'),
                    'megacalorias' => $this->input->post('megacalorias'),
                    'densidad' => $this->input->post('densidad'),
                    'gigajoules' => $this->input->post('gigajoules'),
                    'costo' => $this->input->post('costo'),
                    'precio' => $this->input->post('precio')
                    //'precio' => $this->input->post('id_precio_gas')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->linea_gas_model->gas_consumo_add($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/linea_gas/'));
                }
            }
        } else {

           // $data['mes_gas_consumo'] =  $this->linea_gas_model->mes_gas_consumo();
            //$data['año_gas_consumo'] =  $this->linea_gas_model->año_gas_consumo();
            $data['add_gas_consumo'] =  $this->linea_gas_model->get_all_gas_consumo();
            $data['view'] = 'admin/linea_gas/gas_consumo_add.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function gas_consumo_edit($id = 0)
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('metros_cubicos', 'metros_cubicos', 'trim|required');
            $this->form_validation->set_rules('masa', 'masa', 'trim|required');
            $this->form_validation->set_rules('megacalorias', 'megacalorias', 'trim|required');
            $this->form_validation->set_rules('densidad', 'densiad', 'trim|required');
            $this->form_validation->set_rules('gigajoules', 'gigajoules', 'trim|required');
            $this->form_validation->set_rules('costo', 'costo', 'trim|required');
            $this->form_validation->set_rules('precio', 'precio', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['gas_consumo_edit'] =  $this->linea_gas_model->get_gas_consumo_by_id($id);
                $data['view'] = 'admin/linea_gas/gas_consumo_edit';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(

                    'fecha' => $this->input->post('fecha'),
                    'metros_cubicos' => $this->input->post('metros_cubicos'),
                    'masa' => $this->input->post('masa'),
                    'megacalorias' => $this->input->post('megacalorias'),
                    'densidad' => $this->input->post('densidad'),
                    'gigajoules' => $this->input->post('gigajoules'),
                    'costo' => $this->input->post('costo'),
                    'precio' => $this->input->post('precio')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->linea_gas_model->gas_consumo_edit($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/linea_gas/'));
                }
            }
        } else {


            $data['gas_consumo_edit'] =  $this->linea_gas_model->get_gas_consumo_by_id($id);
            $data['view'] = 'admin/linea_gas/gas_consumo_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    //Gas_precio_mensual


    public function get_all_gas_precio_mensual()
    {
        $data['all_gas_precio_mensual'] =  $this->linea_gas_model->get_all_gas_precio_mensual();


        $data['view'] = 'admin/linea_gas/gas_precio_mensual_list';

        $this->load->view('admin/layout', $data);
    }

    public function gas_precio_mensual_add()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('mes', 'mes', 'trim|required');
            $this->form_validation->set_rules('año', 'año', 'trim|required');
            $this->form_validation->set_rules('precio', 'precio', 'trim|required');
           

            if ($this->form_validation->run() == FALSE) {


                $data['view'] = 'admin/linea_gas/gas_precio_mensual_add';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(

                    'mes' => $this->input->post('mes'),
                    'año' => $this->input->post('año'),
                    'precio' => $this->input->post('precio'),
                    
                );
                $data = $this->security->xss_clean($data);
                $result = $this->linea_gas_model->gas_precio_mensual_add($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/linea_gas/get_all_gas_precio_mensual'));
                }
            }
        } else {


            $data['add_gas_precio_mensual'] = $this->linea_gas_model->get_all_gas_precio_mensual();
            $data['view'] = 'admin/linea_gas/gas_precio_mensual_add';
            $this->load->view('admin/layout', $data);
        }

    }

    public function gas_precio_mensual_edit( $id = 0)
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('mes', 'mes', 'trim|required');
            $this->form_validation->set_rules('año', 'año', 'trim|required');
            $this->form_validation->set_rules('precio', 'precio', 'trim|required');
           

            if ($this->form_validation->run() == FALSE) {


                $data['view'] = 'admin/linea_gas/gas_precio_mensual_edit';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(

                    'mes' => $this->input->post('mes'),
                    'año' => $this->input->post('año'),
                    'precio' => $this->input->post('precio'),
                    
                );
                $data = $this->security->xss_clean($data);
                $result = $this->linea_gas_model->gas_precio_mensual_edit($data, $id);

                $mes = $this->input->post('mes');
                $año = $this->input->post('año');
                $precio = $this->input->post('precio');
                
                $data2 = array(

                    'precio' => $this->input->post('precio'),
                    
                );

                $result2 = $this->linea_gas_model->gas_precio_mensual_update_gas_consumo($mes, $año, $precio);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/linea_gas/get_all_gas_precio_mensual'));
                }
            }
        } else {


            $data['gas_precio_mensual_edit'] = $this->linea_gas_model->get_gas_precio_mensual_by_id($id);
            $data['view'] = 'admin/linea_gas/gas_precio_mensual_edit';
            $this->load->view('admin/layout', $data);
        }

    }

    function get_precio_gas($id)
    {
        $dateFormat = 'Y-m-d';
        $fecha_gas = $id;
        $date = DateTime::createFromFormat($dateFormat, $fecha_gas);

        $anio = $date->format('Y');
        $mes = $date->format('m');
        $dia = $date->format('d');

        $data = $this->linea_gas_model->get_precio_gas($anio, $mes);
        echo json_encode($data);
    }

   

}
