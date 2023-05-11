<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laboratorio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/laboratorio_model', 'laboratorio_model');
    }

    public function index()
    {
    }


    public function add_calhorno()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('hora_laboratorio', 'hora_laboratorio', 'trim|required');
            $this->form_validation->set_rules('horno', 'horno', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim');
            $this->form_validation->set_rules('cao', 'cao', 'trim');
            $this->form_validation->set_rules('pxc', 'pxc', 'trim');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
                $data['laboratorio_hora'] = $this->laboratorio_model->gethora();

                $data['view'] = 'admin/laboratorio/laboratorio_calhorno.php';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'id_estatus' => $this->input->post('estatus'),
                    'fecha' => $this->input->post('fecha'),
                    'id_hora' => $this->input->post('hora_laboratorio'),
                    'horno' => $this->input->post('horno'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'pxc' => $this->input->post('pxc'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->laboratorio_model->add_cal($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/laboratorio/bitacora_calhornos'));
                }
            }
        } else {
            $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
            $data['laboratorio_hora'] = $this->laboratorio_model->gethora();

            $data['all_calhorno'] =  $this->laboratorio_model->get_all_calhorno();
            $data['view'] = 'admin/laboratorio/laboratorio_calhorno.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function edit_calhorno($id = 0)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('hora_laboratorio', 'hora_laboratorio', 'trim|required');
            $this->form_validation->set_rules('horno', 'horno', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim|required');
            $this->form_validation->set_rules('cao', 'cao', 'trim|required');
            $this->form_validation->set_rules('pxc', 'pxc', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
                $data['laboratorio_hora'] = $this->laboratorio_model->get_hora();
                $data['edit_calhorno'] = $this->laboratorio_model->get_laboratorio_calhorno_by_id($id);

                $data['view'] = 'admin/laboratorio/laboratorio_edit_calhorno';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'id_estatus' => $this->input->post('estatus'),
                    'fecha' => $this->input->post('fecha'),
                    'id_hora' => $this->input->post('hora_laboratorio'),
                    'horno' => $this->input->post('horno'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'pxc' => $this->input->post('pxc'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->laboratorio_model->edit_calhorno($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/laboratorio/bitacora_calhornos'));
                }
            }
        } else {
            $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
            $data['laboratorio_hora'] = $this->laboratorio_model->get_hora();
            $data['edit_calhorno'] = $this->laboratorio_model->get_laboratorio_calhorno_by_id($id);

            $data['view'] = 'admin/laboratorio/laboratorio_edit_calhorno';
            $this->load->view('admin/layout', $data);
        }
    }


    public function add_hornos()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('horno', 'horno', 'trim|required');
            $this->form_validation->set_rules('material', 'material', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim');
            $this->form_validation->set_rules('cao', 'cao', 'trim');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim');

            if ($this->form_validation->run() == FALSE) {

                $data['nombre_del_material'] = $this->laboratorio_model->getmaterial();
                $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
                $data['view'] = 'admin/laboratorio/laboratorio_dolohornos.php';

                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'horno' => $this->input->post('horno'),
                    'id_material' => $this->input->post('material'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'id_estatus' => $this->input->post('estatus'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);

                $result = $this->laboratorio_model->add_horno($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/laboratorio/bitacora_dolohornos'));
                }
            }
        } else {
            $data['nombre_del_material'] = $this->laboratorio_model->getmaterial();
            $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();

            //$data['all_estatus'] =  $this->laboratorio_model->get_all_estatus();
            //$data['all_material'] =  $this->laboratorio_model->get_all_material();
            $data['all_dolohornos'] = $this->laboratorio_model->get_all_dolohornos();
            $data['view'] = 'admin/laboratorio/laboratorio_dolohornos.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function edit_dolohornos($id = 0)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('horno', 'horno', 'trim|required');
            $this->form_validation->set_rules('material', 'material', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim|required');
            $this->form_validation->set_rules('cao', 'cao', 'trim|required');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['nombre_del_material'] = $this->laboratorio_model->get_material();
                $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
                $data['edit_dolohornos'] = $this->laboratorio_model->get_laboratorio_dolohorno_by_id($id);
                $data['view'] = 'admin/laboratorio/laboratorio_edit_dolohornos';

                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'horno' => $this->input->post('horno'),
                    'id_material' => $this->input->post('material'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'id_estatus' => $this->input->post('estatus'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->laboratorio_model->edit_dolohornos($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/laboratorio/bitacora_dolohornos'));
                }
            }
        } else {
            $data['nombre_del_material'] = $this->laboratorio_model->get_material();
            $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();

            $data['edit_dolohornos'] = $this->laboratorio_model->get_laboratorio_dolohorno_by_id($id);

            $data['view'] = 'admin/laboratorio/laboratorio_edit_dolohornos';
            $this->load->view('admin/layout', $data);
        }
    }

    public function add_mina()
    {

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('material', 'material', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim');
            $this->form_validation->set_rules('cao', 'cao', 'trim');
           // $this->form_validation->set_rules('tamaño', 'tamaño', 'trim|required');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $data['nombre_del_material'] = $this->laboratorio_model->getmaterial();
                $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
                $data['view'] = 'admin/laboratorio/laboratorio_dolomina.php';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'id_material' => $this->input->post('material'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    //'tamaño' => $this->input->post('tamaño'),
                    'id_estatus' => $this->input->post('estatus'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->laboratorio_model->add_mina($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/laboratorio/bitacora_dolomina'));
                }
            }
        } else {
            $data['nombre_del_material'] = $this->laboratorio_model->getmaterial();
            $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
            $data['all_dolomina'] =  $this->laboratorio_model->get_all_dolomina();
            $data['view'] = 'admin/laboratorio/laboratorio_dolomina.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function edit_dolomina($id = 0)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            $this->form_validation->set_rules('material', 'material', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim|required');
            $this->form_validation->set_rules('cao', 'cao', 'trim|required');
           // $this->form_validation->set_rules('tamaño', 'tamaño', 'trim|required');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['nombre_del_material'] = $this->laboratorio_model->get_material();
                $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
                $data['edit_dolomina'] = $this->laboratorio_model->get_laboratorio_dolomina_by_id($id);
                $data['view'] = 'admin/laboratorio/laboratorio_edit_dolomina';

                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'id_material' => $this->input->post('material'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                   // 'tamaño' => $this->input->post('tamaño'),
                    'id_estatus' => $this->input->post('estatus'),
                    'comentarios' => $this->input->post('comentario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->laboratorio_model->edit_dolomina($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/laboratorio/bitacora_dolomina'));
                }
            }
        } else {
            $data['nombre_del_material'] = $this->laboratorio_model->get_material();
            $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();

            $data['edit_dolomina'] = $this->laboratorio_model->get_laboratorio_dolomina_by_id($id);

            $data['view'] = 'admin/laboratorio/laboratorio_edit_dolomina';
            $this->load->view('admin/layout', $data);
        }
    }

    

    public function add_barrenos($id=0)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha_extraccion', 'fecha_extraccion', 'trim|required');
            $this->form_validation->set_rules('maquina', 'maquina', 'trim|required');
            $this->form_validation->set_rules('barreno', 'barreno', 'trim|required');
            $this->form_validation->set_rules('metros', 'metros', 'trim|required');
            $this->form_validation->set_rules('fecha_analisis', 'fecha_analisis', 'trim|required');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim|required');
            $this->form_validation->set_rules('cao', 'cao', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
                $data['laboratorio_maquina'] = $this->laboratorio_model->get_maquina();
                $data['laboratorio_barrenos'] = $this->laboratorio_model->get_laboratorio_barrenos_by_id($id);
                
                $data['view'] = 'admin/laboratorio/laboratorio_edit_barrenacion_completa';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    //'fecha_extraccion' => $this->input->post('fecha_extraccion'),
                    //'id_maquina' => $this->input->post('maquina'),
                    //'id_barreno' => $this->input->post('barreno'),
                    //'id_metros' => $this->input->post('metros'),

                    //'id_extraccion' => $this->input->post('tamaño'),
                    'fecha_analisis' => $this->input->post('fecha_analisis'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'comentarios' => $this->input->post('comentario'),
                    'id_estatus' => $this->input->post('estatus')
                );
                $data = $this->security->xss_clean($data);

                $result = $this->laboratorio_model->edit_laboratorio_barrenos($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/laboratorio/bitacora_laboratorio_barrenos'));
                }
            }
        } else {
            $data['laboratorio_estatus'] = $this->laboratorio_model->get_estatus();
            $data['laboratorio_maquina'] = $this->laboratorio_model->get_maquina();
            $data['laboratorio_barrenos'] = $this->laboratorio_model->get_laboratorio_barrenos_by_id($id);
            

            $data['view'] = 'admin/laboratorio/laboratorio_edit_barrenacion_completa';
            $this->load->view('admin/layout', $data);
        }
    }
    //Editar Vista de Barrenos
    public function edit_barrenos($id = 0)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fecha_extraccion', 'fecha_extraccion', 'trim|required');
            $this->form_validation->set_rules('maquina', 'maquina', 'trim|required');
            $this->form_validation->set_rules('barreno', 'barreno', 'trim|required');
            $this->form_validation->set_rules('metros', 'metros', 'trim|required');
            $this->form_validation->set_rules('fecha_analisis', 'fecha_analisis', 'trim|required');
            $this->form_validation->set_rules('estatus', 'estatus', 'trim|required');
            $this->form_validation->set_rules('mgo', 'mgo', 'trim|required');
            $this->form_validation->set_rules('cao', 'cao', 'trim|required');
            $this->form_validation->set_rules('comentario', 'comentario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
                $data['laboratorio_maquina'] = $this->laboratorio_model->get_maquina();
                $data['barrenacion'] = $this->laboratorio_model->get_barrenacion_by_id($id);


                $data['view'] = 'admin/laboratorio/laboratorio_edit_barrenacion';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha_extraccion' => $this->input->post('fecha_extraccion'),
                    'id_maquina' => $this->input->post('maquina'),
                    'id_barreno' => $this->input->post('barreno'),
                    'id_metros' => $this->input->post('metros'),
                    'linea_barreno' => $this->input->post('linea_barreno'),
                    //'id_extraccion' => $this->input->post('tamaño'),
                    'fecha_analisis' => $this->input->post('fecha_analisis'),
                    'mgo' => $this->input->post('mgo'),
                    'cao' => $this->input->post('cao'),
                    'comentarios' => $this->input->post('comentario'),
                    'id_estatus' => $this->input->post('estatus')
                );
                $data = $this->security->xss_clean($data);

                $result = $this->laboratorio_model->edit_barreno($data, $id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/laboratorio/bitacora_laboratorio_barrenos'));
                }
            }
        } else {
            $data['laboratorio_estatus'] = $this->laboratorio_model->getestatus();
            $data['laboratorio_maquina'] = $this->laboratorio_model->get_maquina();
            $data['barrenacion'] = $this->laboratorio_model->get_barrenacion_by_id($id);

            $data['view'] = 'admin/laboratorio/laboratorio_edit_barrenacion';
            $this->load->view('admin/layout', $data);
        }
    }
    //-------------------------Bitacoras Inicio
    public function bitacora_calhornos()
    {
        $data['all_calhorno'] =  $this->laboratorio_model->get_all_calhorno();


        $data['view'] = 'admin/laboratorio/laboratorio_calhorno_list';

        $this->load->view('admin/layout', $data);
    }
    public function bitacora_dolohornos()
    {
        $data['all_dolohornos'] =  $this->laboratorio_model->get_all_dolohornos();

        $data['view'] = 'admin/laboratorio/laboratorio_dolohornos_list';
        $this->load->view('admin/layout', $data);
    }

    public function bitacora_dolomina()
    {
        $data['all_dolomina'] =  $this->laboratorio_model->get_all_dolomina();
        $data['view'] = 'admin/laboratorio/laboratorio_dolomina_list';
        $this->load->view('admin/layout', $data);
    }

    public function bitacora_barrenos()
    {
        $data['all_barrenacion'] = $this->laboratorio_model->get_all_barrenacion();
        $data['view'] = 'admin/laboratorio/laboratorio_barrenacion_list';
        $this->load->view('admin/layout', $data);
    }
    public function bitacora_laboratorio_barrenos()
    {
        $data['all_laboratorio_barrenacion'] = $this->laboratorio_model->get_all_laboratorio_barrenos();
        $data['view'] = 'admin/laboratorio/laboratorio_barrenacion_list_complet';
        $this->load->view('admin/layout', $data);
    }

}
