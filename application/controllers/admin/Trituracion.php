<?php

class Trituracion extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/trituracion_model', 'trituracion_model');
        $this->load->model('admin/material_model', 'material_model');
    }

    public function index(){
        $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
        $data['all_materiales'] = $this->material_model->get_all_materiales();
        $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
        $data['all_trituracion_bitacora'] = $this->trituracion_model->get_all_trituracion_bitacora();
        $data['all_trituracion_programacion'] = $this->trituracion_model->get_all_trituracion_programacion();
        $data['view'] = 'admin/trituracion/trituracion_bitacora_list';
        $this->load->view('admin/layout', $data);
    }

    public function programacion_list(){
        $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
        $data['all_materiales'] = $this->material_model->get_all_materiales();
        $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
        $data['all_trituracion_bitacora'] = $this->trituracion_model->get_all_trituracion_bitacora();
        $data['all_trituracion_programacion'] = $this->trituracion_model->get_all_trituracion_programacion();
        $data['view'] = 'admin/trituracion/trituracion_programacion_list';
        $this->load->view('admin/layout', $data);
    }


    public function programacion_add() {
        if($this->input->post('submit')){
            $this->form_validation->set_rules('fecha', 'Fecha de captura', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo 'Error en el envio de los datos';
                $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
                $data['view'] = 'admin/trituracion/trituracion_programacion_add';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'toneladas' => $this->input->post('toneladas'),
                    'id_concepto' => $this->input->post('id_concepto'),
                    'horas' => $this->input->post('horas'),
                    'observaciones' => $this->input->post('observaciones')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->trituracion_model->programacion_add($data);
                if($result){
                    $this->session->set_flashdata('msg', 'Guardado!');
                    redirect(base_url('admin/trituracion/programacion_list'));
                } 
            }

        } else {
            $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
            $data['view'] = 'admin/trituracion/trituracion_programacion_add';
            $this->load->view('admin/layout', $data);
        }
    }

    public function bitacora_add() {
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            if ($this->form_validation->run() == FALSE) 
                {
                    $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
                    $data['all_materiales'] = $this->material_model->get_all_materiales();
                    $data['view'] = 'admin/trituracion/trituracion_bitacora_add';
                    $this->load->view('admin/layout', $data);            
                }
                else //Validation true, insert data
                {
                    $data = array(
                    'fecha' => $this->input->post('fecha'),
                    //'turno' => $this->input->post('turno'),
                    'numero_viajes' => $this->input->post('numero_viajes'),
                    'toneladas_viajes' => $this->input->post('toneladas_viajes'),
                    'total_toneladas_producidas' => $this->input->post('total_toneladas_producidas'),
                    'paro' => $this->input->post('paro'),
                    'paro_id_razon' => $this->input->post('paro_id_razon'),
                    'id_material_bascula1' => $this->input->post('id_material_bascula1'),
                    'id_material_bascula2' => $this->input->post('id_material_bascula2'),
                    'id_material_bascula3' => $this->input->post('id_material_bascula3'),
                    'id_material_bascula4' => $this->input->post('id_material_bascula4'),
                    'id_material_bascula5' => $this->input->post('id_material_bascula5'),
                    'id_material_bascula6' => $this->input->post('id_material_bascula6'),
                    'id_material_bascula7' => $this->input->post('id_material_bascula7'),
                    'id_material_bascula8' => $this->input->post('id_material_bascula8'),
                    'toneladas_bascula1' => $this->input->post('toneladas_bascula1'),
                    'toneladas_bascula2' => $this->input->post('toneladas_bascula2'),
                    'toneladas_bascula3' => $this->input->post('toneladas_bascula3'),
                    'toneladas_bascula4' => $this->input->post('toneladas_bascula4'),
                    'toneladas_bascula5' => $this->input->post('toneladas_bascula5'),
                    'toneladas_bascula6' => $this->input->post('toneladas_bascula6'),
                    'toneladas_bascula7' => $this->input->post('toneladas_bascula7'),
                    'toneladas_bascula8' => $this->input->post('toneladas_bascula8'),
                    'created_at' => date('Y-m-d : h:m:s'),
                    'created_by' => $_SESSION["id_usuario"],
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->trituracion_model->bitacora_add($data);
                    if($result)
                    {
                        $this->session->set_flashdata('msg', 'Registro Agregado!');
                        redirect(base_url('admin/trituracion'));
                    }
                } // If validacion FORM
        }
        else //POST SUBMIT

        {
            //$data['basculaDos'] = $this->trituracion_model->getBasculaDos();
            //$data['basculaValues'] = $this->trituracion_model->getValuesBasculas($fecha);
            $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
            $data['all_materiales'] = $this->material_model->get_all_materiales();
            $data['view'] = 'admin/trituracion/trituracion_bitacora_add';
            $this->load->view('admin/layout', $data);        
        }
    }

    /**** EDITS ******************/
    public function bitacora_edit($id=0) {
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
            if ($this->form_validation->run() == FALSE) 
                {
                    $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
                    $data['all_materiales'] = $this->material_model->get_all_materiales();
                    $data['get_all_trituracion_bitacora_id'] = $this->trituracion_model->get_all_trituracion_bitacora_id($id);
                    $data['view'] = 'admin/trituracion/trituracion_bitacora_edit';
                    $this->load->view('admin/layout', $data);            
                }
                else //Validation true, edit data
                {
                    $data = array(
                    'fecha' => $this->input->post('fecha'),
                    //'turno' => $this->input->post('turno'),
                    'numero_viajes' => $this->input->post('numero_viajes'),
                    'toneladas_viajes' => $this->input->post('toneladas_viajes'),
                    'total_toneladas_producidas' => $this->input->post('total_toneladas_producidas'),
                    'paro' => $this->input->post('paro'),
                    'paro_id_razon' => $this->input->post('paro_id_razon'),
                    'id_material_bascula1' => $this->input->post('id_material_bascula1'),
                    'id_material_bascula2' => $this->input->post('id_material_bascula2'),
                    'id_material_bascula3' => $this->input->post('id_material_bascula3'),
                    'id_material_bascula4' => $this->input->post('id_material_bascula4'),
                    'id_material_bascula5' => $this->input->post('id_material_bascula5'),
                    'id_material_bascula6' => $this->input->post('id_material_bascula6'),
                    'id_material_bascula7' => $this->input->post('id_material_bascula7'),
                    'id_material_bascula8' => $this->input->post('id_material_bascula8'),
                    'toneladas_bascula1' => $this->input->post('toneladas_bascula1'),
                    'toneladas_bascula2' => $this->input->post('toneladas_bascula2'),
                    'toneladas_bascula3' => $this->input->post('toneladas_bascula3'),
                    'toneladas_bascula4' => $this->input->post('toneladas_bascula4'),
                    'toneladas_bascula5' => $this->input->post('toneladas_bascula5'),
                    'toneladas_bascula6' => $this->input->post('toneladas_bascula6'),
                    'toneladas_bascula7' => $this->input->post('toneladas_bascula7'),
                    'toneladas_bascula8' => $this->input->post('toneladas_bascula8'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                    'updated_by' => $_SESSION["id_usuario"],
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->trituracion_model->bitacora_edit($data, $id);
                    if($result)
                    {
                        $this->session->set_flashdata('msg', 'Registro Actualizado!');
                        redirect(base_url('admin/trituracion'));
                    }
                } // If validacion FORM
        }
        else //POST SUBMIT

        {
            $data['all_razones_paro'] = $this->trituracion_model->get_all_razones_paro();
            $data['all_materiales'] = $this->material_model->get_all_materiales();
            $data['get_all_trituracion_bitacora_id'] = $this->trituracion_model->get_all_trituracion_bitacora_id($id);
            $data['view'] = 'admin/trituracion/trituracion_bitacora_edit';
            $this->load->view('admin/layout', $data);        
        }
    }

    public function programacion_edit($id) {
        if($this->input->post('submit')){
            $this->form_validation->set_rules('fecha', 'Fecha de captura', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                echo 'Error en el envio de los datos';
                $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
                $data['get_all_trituracion_programacion_id'] = $this->trituracion_model->get_all_trituracion_programacion_id($id);
                $data['view'] = 'admin/trituracion/trituracion_programacion_edit';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'toneladas' => $this->input->post('toneladas'),
                    'id_concepto' => $this->input->post('id_concepto'),
                    'horas' => $this->input->post('horas'),
                    'observaciones' => $this->input->post('observaciones')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->trituracion_model->programacion_edit($data, $id);
                if($result){
                    $this->session->set_flashdata('msg', 'Guardado!');
                    redirect(base_url('admin/trituracion/programacion_list/'));
                } 
            }

        } else {
            $data['all_conceptos'] = $this->trituracion_model->get_all_conceptos();
            $data['get_all_trituracion_programacion_id'] = $this->trituracion_model->get_all_trituracion_programacion_id($id);
            $data['view'] = 'admin/trituracion/trituracion_programacion_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    /* CONCEPTOS */
public function conceptos_add(){
    if($this->input->post('submit')){
        $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data['view'] = 'admin/trituracion/trituracion_conceptos_add';
            $this->load->view('admin/layout', $data);
        } else {
            $data = array(
                'descripcion' => $this->input->post('descripcion')
            );

            $data = $this->security->xss_clean($data);
            $result = $this->trituracion_model->add_conceptos($data);
            if($result) {
                $this->session->set_flashdata('msg', 'Registro guardado');
                redirect(base_url('admin/trituracion/trituracion_conceptos_list'));
            }
        }
    } else{
        $data['view'] = 'admin/trituracion/trituracion_conceptos_add';
        $this->load->view('admin/layout', $data);
    }

}

public function conceptos_list(){
    $data['conceptos'] = $this->trituracion_model->get_conceptos();
    $data['view'] = 'admin/trituracion/trituracion_conceptos_list';
    $this->load->view('admin/layout', $data);

}

    /* CONCEPTOS */
    public function trituracion_paros_add(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
            $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');
    
            if($this->form_validation->run() == FALSE) {
                $data['view'] = 'admin/trituracion/trituracion_bitacora_paros_add';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion')
                );
    
                $data = $this->security->xss_clean($data);
                $result = $this->trituracion_model->add_bitacora_paros($data);
                if($result) {
                    $this->session->set_flashdata('msg', 'Registro guardado');
                    redirect(base_url('admin/trituracion/trituracion_paros_list'));
                }
            }
        } else{
            $data['view'] = 'admin/trituracion/trituracion_bitacora_paros_add';
            $this->load->view('admin/layout', $data);
        }
    
    }
    
    public function trituracion_paros_list(){
        $data['paros'] = $this->trituracion_model->get_bitacora_paros_list();
        $data['view'] = 'admin/trituracion/trituracion_bitacora_paros_list';
        $this->load->view('admin/layout', $data);
    
    }

    public function getBasculas($fecha)
    {
        //echo $fecha;
        $data = $this->trituracion_model->getValuesBasculas($fecha);
        echo json_encode($data);
        //exit();
    }
}



?>